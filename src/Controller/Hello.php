<?php
declare(strict_types=1);

namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Hello
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        $name = $args['name'] ?? 'stranger';
        return $response->getBody()->write("Hello $name!");
    }
}