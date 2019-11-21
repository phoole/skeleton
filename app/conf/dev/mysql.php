<?php

/**
 * database configurations
 */
return [
    'driver' => 'mysql',

    // db writer
    'writer' => [
        'username' => 'phoole',
        'password' => '${ENV.DB_PASSWORD}',
        'host' => 'localhost',
        'port' => 3306,
        'database' => 'phoole',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
    ],

    // db reader
    'reader' => [
        'username' => 'phoole',
        'password' => '${ENV.DB_PASSWORD}',
        'host' => 'localhost',
        'port' => 3306,
        'database' => 'phoole',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
    ],
];