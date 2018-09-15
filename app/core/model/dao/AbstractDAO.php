<?php

namespace PauSabe\CBCN\model\dao;

use PauSabe\CBCN\model\Connection;

abstract class AbstractDAO{

    private static $conn;

    protected abstract static function createConnection();

    public abstract static function beginTransaction();

    public abstract static function commit();

    public abstract static function rollback();

    private static function getConnection(){
        if(!self::$conn) self::$conn = static::createConnection();
        return self::$conn;
    }

    public function create($object){
        $conn = self::getConnection();
        return $this->onCreate($object, $conn);
    }

    public function read($id){
        $conn = self::getConnection();
        return $this->onRead($id, $conn);
    }

    public function readAll($page = null, $qnt = null, $filter = null){
        $conn = self::getConnection();
        return $this->onReadAll($conn, $page, $qnt, $filter);
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
    protected abstract function onReadAll($context, $page, $qnt, $filter);
    protected abstract function onUpdate($object, $context);
    protected abstract function onDelete($object, $context);
}
