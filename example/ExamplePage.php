<?php

use Rogierkn\PagesForWp\Pages\Page;

class ExamplePage extends Page
{
    /**
     * The wordpress event to bind to
     */
    public function event()
    {
        return 'admin_menu';
    }

    /**
     * Called when the above event occurs
     * This example binds to the options page
     */
    public function register()
    {
        // Any related wordpress function can be used for this
        return function () {
            add_options_page('Page Title', 'Menu Title', 'capability', "slug", $this->handle());
        };
    }

    /**
     * Handle your Page's actions in here
     */
    public function handle()
    {
        return $this->render('superView.html.twig', ["name" => "John Doe"]);
    }
}