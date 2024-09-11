<?php

define('APP_ROOT', __DIR__ . '/../');

return [
    'slim' => [
        'displayErrorDetails' => $_ENV['APP_ENV'] !== 'production' ? true : false,
        'logErrors' => true,
        'logErrorDetails' => $_ENV['APP_ENV'] !== 'production' ? true : false
    ],
    'doctrine' => [
        'dev_mode' => $_ENV['APP_ENV'] !== 'production' ? true : false,
        'cache_dir' => APP_ROOT . '/var/doctrine',
        'metadata_dirs' => [APP_ROOT . '/src/Entity'],
        'connection' =>  require __DIR__ . '/database.php',
    ],
];
