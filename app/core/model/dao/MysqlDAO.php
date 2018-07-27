<?php

namespace PauSabe\CBCN\model\dao;

use PauSabe\CBCN\model\Connection;

abstract class MysqlDAO extends AbstractDAO{

    /**
    * @return PDO - Default PDO connection.
    */
    protected static function createConnection(){
        return Connection::getDefaultConnection();
    }

    public static function beginTransaction(){
        $conn = self::getConnection();
        if(!$conn->inTransaction())
            return $conn->beginTransaction();
        return false;
    }

    public static function commit(){
        $conn = self::getConnection();
        if($conn->inTransaction())
            return $conn->commit();
        return false;
    }

    public static function rollback(){
        $conn = self::getConnection();
        if($conn->inTransaction())
            return $conn->rollBack();
        return false;
    }

    protected static function getLimit($page, $qnt){
        $limit = false;
        if(is_int($page) && is_int($page)){
            $offset = ($page - 1) * $qnt;
            $limit  = "LIMIT $qnt OFFSET $offset";
        }
        return $limit;
    }

}
