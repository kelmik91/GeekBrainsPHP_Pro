<?php


namespace app\engine;


use app\interfaces\IRenderer;

class TwigRender implements IRenderer
{
    public function renderTemplate($template, $params = []) {
        $templatePath = TEMPLATES_DIR_TWIG . $template . ".twig";

        $loader = new \Twig\Loader\FilesystemLoader('../twigTemplates');

        $twig = new \Twig\Environment($loader, []);

        return $twig->render($templatePath, $params);
    }
}