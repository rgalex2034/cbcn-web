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

    public static function escapeField($field){
        return "`".str_replace("`", "\`", $field)."`";
    }

    public function getWhere($fields){
        if(!is_array($fields) || count($fields) == 0) return false;
        $where = "WHERE 1=1 AND";
        $valid_fields = $this->getFields();

        $ok = false;
        foreach($fields as $field){
            if(!in_array($field, $valid_fields)) continue;
            if(!$ok) $ok = true; //Once one field is valid, set it as okey.
            $where .= " $field = :$field";
        }

        return $ok ? $where : false;
    }

    public function setWhereFields(\PDOStatement $stmnt, $map){
        $valid_fields = $this->getFields();
        foreach($map as $field => $value){
            if(!in_array($field, $valid_fields)) continue;
            $stmnt->bindValue($field, $value);
        }
    }

    protected static function getLimit($page, $qnt){
        $limit = false;
        if(is_int($page) && is_int($page)){
            $offset = ($page - 1) * $qnt;
            $limit  = "LIMIT $qnt OFFSET $offset";
        }
        return $limit;
    }

    protected function getEscapedFields(){
        return array_map(function($field){
            return self::escapeField($field);
        }, $this->getFields());
    }

    protected function getUpdateFieldsStr(){
        $id_fields = $this->getIdFields();
        $fields = [];
        foreach($this->getFields() as $field){
            if(in_array($field, $id_fields)) continue;
            $fields[] = self::escapeField($field)." = :$field";
        }
        return implode(", ", $fields);
    }

    /**
     * Returns the default id fields.
     * Must be overrided if id field changes on an entity.
     */
    protected function getIdFields(){
        return ["id"];
    }

    protected abstract function getFields();

}
