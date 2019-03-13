<?php
declare(strict_types=1);

$app->get('/', \App\Controller\Home::class);

$app->get('/hello[/{name}]', \App\Controller\Hello::class);

$app->get('/post/{id}', \App\Controller\ShowPost::class);

// Catch any undefined routes
$app->get('[/{route:.*}]', \App\Controller\HttpNotFound::class);