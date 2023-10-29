<?php
    require_once '../config/config.php';
    $dotenv = \Dotenv\Dotenv::createImmutable(ROOT_FOLDER);
    $dotenv->load();
    return [
        'propel' => [
            'database' => [
                'connections' => [
                    'default' => [
                        'adapter'    => 'mysql',
                        'classname'  => 'Propel\Runtime\Connection\ConnectionWrapper',
                        'dsn'        => 'mysql:host='.$_ENV['DB_HOST'].';dbname='.$_ENV['DB_DATABASE'],
                        'user'       => $_ENV['DB_USERNAME'],
                        'password'   => $_ENV['DB_PASSWORD'],
                        'attributes' => []
                    ]
                ]
            ],
            'runtime' => [
                'defaultConnection' => 'default',
                'connections' => ['default']
            ],
            'generator' => [
                'defaultConnection' => 'default',
                'connections' => ['default']
            ]
        ]
    ];