<?php
declare(strict_types=1);

use Slim\Http\Request;
use Slim\Http\Response;

$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name!");

    return $response;
});

$app->get('/{page}', function (Request $request, Response $response, array $args) use ($app) {
    $logger = $app->getContainer()->get('logger');
    $logger->notice('Route Not Found', ['route' => $request->getUri()->getPath()]);
    $name = $args['page'];
    $response = $response->withStatus(404);
    $response->getBody()->write("Page $name - Not Found");

    return $response;
});