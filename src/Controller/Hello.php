<?php
declare(strict_types=1);

namespace App\Controller;

use App\Template\Renderer;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Hello
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
        $name = $args['name'] ?? 'stranger';
        $template = $this->renderer->render('welcome.html', ['name' => $name]);
        return $response->getBody()->write($template);
    }
}