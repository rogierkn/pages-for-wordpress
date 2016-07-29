<?php
namespace Rogierkn\PagesForWp\Pages;

use Rogierkn\PagesForWp\Contracts\Page as PageContract;
use Symfony\Component\HttpFoundation\Request;

abstract class Page implements PageContract
{
    protected $twig;
    protected $db;
    protected $request;

    public function __construct(Request $request, \Twig_Environment $twig, \PDO $db)
    {
        $this->request = $request;
        $this->twig = $twig;
        $this->db = $db;
    }

    protected function render($view, array $parameters = []) {
        return function() use($view, $parameters) {
            echo $this->twig->render($view, $parameters);
        };
    }

}