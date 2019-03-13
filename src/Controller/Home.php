<?php
declare(strict_types=1);

namespace App\Controller;

use App\Repository\PostRepository;
use App\Template\Renderer;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Home
{
    /**
     * @var Renderer
     */
    private $renderer;
    /**
     * @var PostRepository
     */
    private $repository;

    public function __construct(Renderer $renderer, PostRepository $repository)
    {
        $this->renderer = $renderer;
        $this->repository = $repository;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        $posts = $this->repository->findAll();
        $count = \count($posts);

        $template = $this->renderer->render('index.html', ['posts' => $posts, 'count' => $count]);

        return $response->getBody()->write($template);
    }
}