<?php

require __DIR__ . '/vendor/autoload.php';

$config = require __DIR__ . '/config/database.php';

return [
    'paths' => [
        'migrations' => 'database/migrations',
        'seeds' => 'database/seeds',
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_database' => 'development',
        'development' => [
            'adapter' => 'mysql',
            'host' => $config['host'],
            'name' => $config['database'],
            'user' => $config['username'],
            'pass' => $config['password'],
            'port' => $config['post'],
            'charset' => $config['charset'],
        ],
    ],
    'version_order' => 'creation',
];
