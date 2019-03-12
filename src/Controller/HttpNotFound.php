<?php
declare(strict_types=1);

namespace App\Controller;

use App\Template\Renderer;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class HttpNotFound
{
    /**
     * @var Renderer
     */
    private $renderer;

    public function __construct(Renderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        $page = $args['route'];
        $template = $this->renderer->render('404.html', ['route' => $page]);
        return $response->withStatus(404)->getBody()->write($template);
    }
}