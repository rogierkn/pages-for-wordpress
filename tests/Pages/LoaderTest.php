<?php

namespace Rogierkn\PagesForWp\Pages;


use Rogierkn\PagesForWp\Pages\Page;
use Symfony\Component\HttpFoundation\Request;

function add_action($event, $action)
{
    return true;
}


class LoaderTest extends \PHPUnit_Framework_TestCase
{
    public function testLoader()
    {
        $page = $this->createMock(Page::class);
        $page->expects($this->any())->method('event')->will($this->returnValue('an event'));
        $page->expects($this->any())->method('register')->will($this->returnValue('a string'));

        $pagesContainer = $this->createMock(Container::class);
        $pagesContainer->expects($this->once())->method('getPages')->will($this->returnValue([get_class($page)]));

        $request = $this->createMock(Request::class);
        $twig = $this->createMock(\Twig_Environment::class);
        $pdo = $this->createMock(\PDO::class);

        $loader = new Loader();
        $loaded = $loader->load($pagesContainer, $request, $pdo, $twig);
        $this->assertTrue($loaded);
    }
}
