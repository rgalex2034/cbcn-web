<?php

namespace PauSabe\CBCN\model;

use \PauSabe\CBCN\utils\Config;

class Connection{

    private static $conn = null;

    public static function getDefaultConnection(){

        if(!is_null(self::$conn)) return self::$conn;

        $conf = Config::getDefaultConfig();
        $user = $conf->getValue("user", "Database");
        $pass = $conf->getValue("pass", "Database");
        $host = $conf->getValue("host", "Database");
        $port = $conf->getValue("port", "Database");
        $database = $conf->getValue("database", "Database");

        $conn = new \PDO("mysql:dbname=$database;host=$host", $user, $pass);
        $conn->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        self::$conn = $conn;
        return $conn;
    }

}
