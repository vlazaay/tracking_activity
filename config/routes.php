<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;
use Slim\Routing\RouteCollectorProxy;

return function (App $app) {

    $app->group('/auth', function (RouteCollectorProxy $group) {

        // Registration
        $group->get('/register', function ($request, $response, $args) {
            return $this->get('view')->render($response, 'register.twig');
        });

        $group->post('/register', \App\Action\Auth\RegisterAction::class);

        // Login
        $group->get('/login', function ($request, $response, $args) {
            return $this->get('view')->render($response, 'login.twig');
        });

        $group->post('/login', \App\Action\Auth\LoginAction::class);

        // Logout
        $group->get('/logout', \App\Action\Auth\LogOutAction::class);
    });

    $app->get('/', function (ServerRequestInterface $request, ResponseInterface $response) {
        $response->getBody()->write('Hello, World!');

        return $response;
    });

    //test
    $app->get('/users', \App\Action\ListUsersAction::class);
};