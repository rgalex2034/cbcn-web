<?php

namespace PauSabe\CBCN\model\dao;

use PauSabe\CBCN\model\Connection;

abstract class AbstractDAO{

    private static $conn;

    /**
    * @return PDO - Default PDO connection.
    */
    private static function getConnection(){
        if(empty(self::$conn)) self::$conn = Connection::getDefaultConnection();
        return self::$conn;
    }

    public function beginTransaction(){
        $conn = self::getConnection();
        if(!$conn->inTransaction())
            return $conn->beginTransaction();
        return false;
    }

    public function commit(){
        $conn = self::getConnection();
        if($conn->inTransaction())
            return $conn->commit();
        return false;
    }

    public function rollback(){
        $conn = self::getConnection();
        if($conn->inTransaction())
            $conn->rollBack();
        return false;
    }

    public function create($object){
        $conn = self::getConnection();
        return $this->onCreate($object, $conn);
    }

    public function read($id){
        $conn = self::getConnection();
        return $this->onRead($id, $conn);
    }

    public function readAll(){
        $conn = self::getConnection();
        return $this->onReadAll($conn);
    }

    public function update($object){
        $conn = self::getConnection();
        return $this->onUpdate($object, $conn);
    }

    public function delete($object){
        $conn = self::getConnection();
        return $this->onDelete($object, $conn);
    }

    protected abstract function onCreate($object, $context);
    protected abstract function onRead($id, $context);
    protected abstract function onReadAll($context);
    protected abstract function onUpdate($object, $context);
    protected abstract function onDelete($object, $context);
}