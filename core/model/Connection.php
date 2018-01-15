<?php

namespace PauSabe\CBCN\model;

use \PauSabe\CBCN\utils\Config;

class Connection{

    private static $conn;

    public static function getDefaultConnection(){
        $conf = Config::getConfig(CBCN_CORE_ROOT."/config.ini");
        $user = $conf->getValue("user", "Database");
        $pass = $conf->getValue("pass", "Database");
        $host = $conf->getValue("host", "Database");
        $port = $conf->getValue("port", "Database");
        $database = $conf->getValue("database", "Database");

        $conn = new \PDO("mysql:dbname=$database;host=$host", $user, $pass);
        return $conn;
    }

}
