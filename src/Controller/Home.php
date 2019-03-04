<?php
declare(strict_types=1);

namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Home
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        return $response->getBody()->write('Welcome!');
    }
}