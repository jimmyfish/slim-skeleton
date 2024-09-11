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
            'connection' => require APP_ROOT . 'config/database.php',
        ],
    ]
];
