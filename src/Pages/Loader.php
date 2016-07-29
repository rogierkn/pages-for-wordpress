<?php
namespace Rogierkn\PagesForWp\Pages;


class Loader
{

    public function load($pagesContainer, $request, $databaseConnection, $twig)
    {
        foreach ($pagesContainer->getPages() as $pageClass) {
            /** @var Page $page */
            $page = new $pageClass($request, $twig, $databaseConnection);
            add_action($page->event(), $page->register());
        }

        return true;
    }
}