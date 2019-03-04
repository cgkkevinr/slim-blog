<?php
declare(strict_types=1);

namespace App\Template;

use Twig\Environment;

class TwigRenderer implements Renderer
{
    /**
     * @var Environment
     */
    private $renderer;

    public function __construct(Environment $renderer)
    {
        $this->renderer = $renderer;
    }

    public function render(string $template, array $data): string
    {
        $template .= '.twig';
        return $this->renderer->render($template, $data);
    }
}