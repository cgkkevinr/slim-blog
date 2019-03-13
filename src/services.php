<?php
declare(strict_types=1);

$container = $app->getContainer();

// Doctrine
$container['doctrine'] = function (\Psr\Container\ContainerInterface $container) {
    $settings = $container->get('settings')['doctrine'];

    $meta = $settings['meta'];
    $isDevMode = $meta['dev_mode'];
    $paths = $meta['entity_paths'];
    $proxyDir = $meta['proxy_dir'];
    $cache = $meta['cache'];
    $useSimpleAnnotations = $meta['simple_annotations'];

    $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, $proxyDir, $cache, $useSimpleAnnotations);
    return \Doctrine\ORM\EntityManager::create($settings['connections'], $config);
};

// Repositories
$container[\App\Repository\DoctrinePostRepository::class] = function (\Psr\Container\ContainerInterface $container) {
    $entityManager = $container->get('doctrine');
    return new \App\Repository\DoctrinePostRepository($entityManager);
};

$container[\App\Repository\PostRepository::class] = $container[\App\Repository\DoctrinePostRepository::class];

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
    $environment->addExtension(new \Twig\Extension\DebugExtension());

    return new \App\Template\TwigRenderer($environment);
};

$container[\App\Template\Renderer::class] = $container['twig'];

// Controllers
$container[\App\Controller\Hello::class] = function (\Psr\Container\ContainerInterface $container) {
    $renderer = $container->get(\App\Template\Renderer::class);
    return new \App\Controller\Hello($renderer);
};

$container[\App\Controller\HttpNotFound::class] = function (\Psr\Container\ContainerInterface $container) {
    $renderer = $container->get(\App\Template\Renderer::class);
    return new \App\Controller\HttpNotFound($renderer);
};

$container[\App\Controller\Home::class] = function (\Psr\Container\ContainerInterface $container) {
    $renderer = $container->get(\App\Template\Renderer::class);
    $repository = $container->get(\App\Repository\PostRepository::class);
    return new \App\Controller\Home($renderer, $repository);
};

$container[\App\Controller\ShowPost::class] = function (\Psr\Container\ContainerInterface $container) {
    $renderer = $container->get(\App\Template\Renderer::class);
    $repository = $container->get(\App\Repository\PostRepository::class);
    return new \App\Controller\ShowPost($repository, $renderer);
};