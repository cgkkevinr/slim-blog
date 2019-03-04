<?php
declare(strict_types=1);

namespace App;

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

require __DIR__ . '/../vendor/autoload.php';

error_reporting(E_ALL);

$settings = include "settings.php";

$app = new App(['settings' => $settings]);

$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name!");

    return $response;
});

$app->get('/{page}', function (Request $request, Response $response, array $args) {
    $name = $args['page'];
    $response = $response->withStatus(404);
    $response->getBody()->write("Page $name - Not Found");

    return $response;
});

$app->run();