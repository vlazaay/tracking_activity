<?php

use App\Repository\UserRepository;
use Psr\Container\ContainerInterface;
use Slim\App;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;

return [
    'settings' => function () {
        return require __DIR__ . '/settings.php';
    },

    App::class => function (ContainerInterface $container) {
        AppFactory::setContainer($container);

        $container->set('view', function () {
            return Twig::create(__DIR__ . '/../src/templates', ['cache' => __DIR__ . '/../cache/twig']);
        });

        $container->set(PDO::class, function () {
            $config = require __DIR__ . '/database.php';
            $db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['database'] . ';charset=' . $config['charset'], $config['username'], $config['password']);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        });

        $container->set(UserRepository::class, function (ContainerInterface $container) {
            $db = $container->get(PDO::class);
            return new UserRepository($db);
        });

        return AppFactory::create();
    },
];