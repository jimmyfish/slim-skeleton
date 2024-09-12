<?php

return [
    'migrations_paths' => [
        'DoctrineMigrations' => __DIR__ . '/../db/migrations',
    ],
    'transactional' => true,
    'connection' => require __DIR__ . '/database.php',
];
