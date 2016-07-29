<?php

namespace Rogierkn\PagesForWp\Pages;

class Container
{
    private $pages = [];

    public function register($page)
    {
        if(is_array($page)) {
            $this->pages += $page;
        } else {
            $this->pages[] = $page;
        }
    }

    public function getPages()
    {
        return $this->pages;
    }
}