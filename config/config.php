<?php
return [
    'database' => [
        'driver' => $ENV['DB_DRIVER'] ?? 'mysql',
        'host' => $ENV['DB_HOST'],
        'database' => $ENV['DB_NAME'],
        'username' => $ENV['DB_USER'],
        'password' => $ENV['DB_PASSWORD'],
    ],
    'app' => [
        'key' => $_ENV['APP_KEY']
    ]
];