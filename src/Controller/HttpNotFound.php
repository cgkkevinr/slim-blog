<?php
declare(strict_types=1);

namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class HttpNotFound
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        $page = $args['route'];
        $response = $response->withStatus(404);
        return $response->getBody()->write("Route $page not found");
    }
}