<?php
declare(strict_types=1);

$container = $app->getContainer();

// Doctrine
$container['doctrine'] = function (\Psr\Container\ContainerInterface $container) {
    $paths = [__DIR__ . "/Entity"];
    $isDevMode = false;

    $settings = [
        'host' => 'db',
        'driver' => 'pdo_pgsql',
        'user'   => 'postgres',
        'password' => 'example',
        'dbname' => 'blog'
    ];

    $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);
    return \Doctrine\ORM\EntityManager::create($settings, $config);
};

// Monolog
$container['logger'] = function (\Psr\Container\ContainerInterface $container) {
    $settings = $container->get('settings')['logger'];

    $logger = new \Monolog\Logger($settings['name']);
    $logger->pushProcessor(new \Monolog\Processor\UidProcessor);

    $streamHandler = new \Monolog\Handler\StreamHandler($settings['path'], $settings['level']);
    $logger->pushHandler($streamHandler);

    return $logger;
};

// Renderer
$container['twig'] = function (\Psr\Container\ContainerInterface $container) {
    $settings = $container->get('settings')['twig'];
    $loaderSettings = $settings['loader'];
    $environmentSettings = $settings['environment'];

    $loader = new \Twig\Loader\FilesystemLoader($loaderSettings['paths']);
    $environment = new \Twig\Environment($loader, $environmentSettings);

    return new \App\Template\TwigRenderer($environment);
};

$container[\App\Template\Renderer::class] = $container['twig'];

// Controllers
$container[\App\Controller\Hello::class] = function (\Psr\Container\ContainerInterface $container) {
    $renderer = $container->get(\App\Template\Renderer::class);
    return new \App\Controller\Hello($renderer);
};