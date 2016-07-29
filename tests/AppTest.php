<?php


use Rogierkn\PagesForWp\App;
use Rogierkn\PagesForWp\Pages\Container;

class AppTest extends PHPUnit_Framework_TestCase
{
    public function testPagesContainerExists()
    {
        $databaseConnection = $this->createMock(PDO::class);
        $app = new App($databaseConnection);
        $this->assertInstanceOf(Container::class, $app->pages);
    }
}
