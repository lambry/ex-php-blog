<?php

return [
    'name' => 'ex-php-blog',
    'database' => [
        'name' => '',
        'username' => '',
        'password' => '',
        'connection' => 'sqlite:storage/database.sqlite',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]
];
