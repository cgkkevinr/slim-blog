<?php
declare(strict_types=1);

return [
    'settings' => [
        // Slim
        'displayErrorDetails' => true,
        'addContentLengthHeader' => false,

        // Monolog
        'logger' => [
            'name' => 'blog',
            'path' => __DIR__ . '/../var/log/app.log',
            'level' => \Monolog\Logger::DEBUG
        ],

        // Twig
        'twig' => [
            'loader' => [
                'paths' => [
                    __DIR__ . '/../templates/'
                ]
            ],
            'environment' => [
                'cache' => __DIR__ . '/../var/cache/twig/'
            ]
        ],

        'doctrine' => [
            'meta' => [
                'entity_paths' => [
                    __DIR__ . '/Entity'
                ],
                'dev_mode' => false,
                'proxy_dir' => null,
                'cache' => null,
                'simple_annotations' => false
            ],
            'connections' => [
                'host' => 'db',
                'driver' => 'pdo_pgsql',
                'user'   => 'postgres',
                'password' => 'example',
                'dbname' => 'blog'
            ]
        ]
    ]
];