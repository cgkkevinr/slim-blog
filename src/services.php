<?php
declare(strict_types=1);

$container = $app->getContainer();

// Monolog
$container['logger'] = function (\Psr\Container\ContainerInterface $container) {
    $settings = $container->get('settings')['logger'];

    $logger = new \Monolog\Logger($settings['name']);
    $logger->pushProcessor(new \Monolog\Processor\UidProcessor);

    $streamHandler = new \Monolog\Handler\StreamHandler($settings['path'], $settings['level']);
    $logger->pushHandler($streamHandler);

    return $logger;
};