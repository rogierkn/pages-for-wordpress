<?php
namespace Rogierkn\PagesForWp;

class DatabaseConnection
{
    private static $connection;

    public static function getInstance($host, $name, $username, $password, $charset = 'utf8', $collate = '')
    {
        if(self::$connection === NULL) {
            self::$connection = new \PDO("mysql:host={$host};dbname={$name};", $username, $password);
        }
        return self::$connection;
    }

}