<?php

define('APP_ROOT', __DIR__ . '/../');

return [
    'slim' => [
        'displayErrorDetails' => true,
        'logErrors' => true,
        'logErrorDetails' => true
    ],
    'doctrine' => [
        'dev_mode' => true,
        'cache_dir' => APP_ROOT . '/var/doctrine',
        'metadata_dirs' => [APP_ROOT . '/src/Entity'],
        'connection' =>  require __DIR__ . '/database.php',
    ],
];
