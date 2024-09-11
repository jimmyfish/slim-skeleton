<?php

define('APP_ROOT', __DIR__ . '/../');

return [
    'settings' => [
        'slim' => [
            'displayErrorDetails' => true,
            'logErrors' => true,
            'logErrorDetails' => true
        ],
        'doctrine' => [
            'dev_mode' => true,
            'cache_dir' => APP_ROOT . '/public/cache',
            'metadata_dirs' => [APP_ROOT . '/src/Domain'],
            'connection' =>  [
                'driver' => $_ENV['DB_DRIVER'],
                'host' => $_ENV['DB_HOST'],
                'dbname' => $_ENV['DB_DATABASE'],
                'user' => $_ENV['DB_USERNAME'],
                'password' => $_ENV['DB_PASSWORD'],
                'port' => $_ENV['DB_PORT'],
                'charset' => 'utf8mb4',
            ],
        ],
    ]
];
