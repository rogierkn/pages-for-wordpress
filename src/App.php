<?php
namespace Rogierkn\PagesForWp;


use Rogierkn\PagesForWp\Pages\Container;
use Rogierkn\PagesForWp\Pages\Loader;
use Symfony\Component\HttpFoundation\Request;
use Twig_Environment;
use Twig_Loader_Filesystem;

class App
{

    /**
     * Twig instance
     *
     * @var Twig_Environment
     */
    private $twig;

    /**
     * Database connection to use instead of WPDB
     *
     * @var \PDO
     */
    private $databaseConnection;

    /**
     * Request object that is given to the pages
     *
     * @var Request
     */
    private $request;

    /**
     * The container for the pages to register
     * @var Container
     */
    public $pages;

    /**
     * Construct the App
     *
     * @param       $database
     * @param array $pages
     */
    public function __construct($database, $pages = [])
    {
        $this->databaseConnection = $database;
        $this->request            = Request::createFromGlobals();

        $this->pages = new Container();
    }

    /**
     * Load all pages
     */
    public function run()
    {
        $this->loadPages();
    }

    /**
     * Set the right views folder
     *
     * @param $folder
     * @return $this
     * @throws \Exception
     */
    public function setViewsFolder($folder)
    {
        if (!file_exists($folder)) {
            throw new \Exception("Views folder could not be found: " . $folder);
        }
        $this->initializeTwig($folder);

        return $this;
    }

    /**
     * Load Twig
     *
     * @param $folder
     */
    private function initializeTwig($folder)
    {
        $twigLoader = new Twig_Loader_Filesystem($folder);
        $this->twig = new Twig_Environment($twigLoader);
    }

    /**
     * Load all registered pages
     */
    private function loadPages()
    {
        $loader = new Loader();
        $loader->load($this->pages, $this->request, $this->databaseConnection, $this->twig);
    }

}