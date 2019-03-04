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
        ]
    ]
];