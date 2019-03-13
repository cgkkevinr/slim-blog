<?php
declare(strict_types=1);

namespace App\Controller;

use App\Repository\PostRepository;
use App\Template\Renderer;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Exception\NotFoundException;

class ShowPost
{
    /**
     * @var PostRepository
     */
    private $repository;
    /**
     * @var Renderer
     */
    private $renderer;

    public function __construct(PostRepository $repository, Renderer $renderer)
    {
        $this->repository = $repository;
        $this->renderer = $renderer;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        $id = $args['id'] ?? null;
        if ($id === null) {
            throw new NotFoundException($request, $response);
        }

        $post = $this->repository->find((int) $id);
        if ($post === null) {
            throw new NotFoundException($request, $response);
        }

        $template = $this->renderer->render('post/show.html', [
            'title' => $post->getTitle(),
            'post' => $post
        ]);

        return $response->getBody()->write($template);
    }
}