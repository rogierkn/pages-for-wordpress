<?php


namespace Rogierkn\PagesForWp\Contracts;


interface Page
{
    /**
     * Gets the Wordpress event/hook that the page registers for
     *
     * @return string
     */
    public function event();

    /**
     * Actually registers the page/hook
     *
     * @return mixed
     */
    public function register();

    /**
     * Whenever this hook/page is called
     * Can be used to handle request
     *
     * @return mixed
     */
    public function handle();
}