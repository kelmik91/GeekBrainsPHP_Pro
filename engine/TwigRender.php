<?php


namespace app\engine;


use app\interfaces\IRenderer;

class TwigRender implements IRenderer
{
    private $twig;

    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader('../twigTemplates');

        $this->twig = new \Twig\Environment($loader, []);
    }

    public function renderTemplate($template, $params = [])
    {
        return $this->twig->render($template . '.twig', $params);
    }
}