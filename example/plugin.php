<?php
/**
 * @wordpress-plugin
 * Plugin Name:       Your shiny new plugin
 * Plugin URI:        http://dankwebsite.com
 * Description:       Makes your website great again!
 * Version:           1
 * Author:            You shiny beast
 * Text Domain:       plugin
 */

use Rogierkn\PagesForWp\App;
use Rogierkn\PagesForWp\DatabaseConnection;

$databaseConnection = DatabaseConnection::getInstance('localhost', 'wordpress', 'user', 'strongPassword');

$app = new App($databaseConnection);

$app->pages->register([
    ExamplePage::class
]);

$app->setViewsFolder(__DIR__ . '/views/');
$app->run();