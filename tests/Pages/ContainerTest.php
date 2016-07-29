<?php


namespace Rogierkn\PagesForWp\Pages;


class ContainerTest extends \PHPUnit_Framework_TestCase
{
    public function testContainerHasPages()
    {
        $page = $this->createMock(Page::class);

        $container = new Container();
        $container->register($page);

        $this->assertInstanceOf(get_class($page), $container->getPages()[0]);
    }
}
