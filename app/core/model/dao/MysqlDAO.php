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

    public function getWhere($filters){
        if(!is_array($filters) || count($filters) == 0) return false;
        $where = "WHERE 1=1 ";
        $valid_fields = $this->getFields();
        $ok = false;

        $n = 0;
        $filter_strings = [];
        foreach($filters as $filter){
            $col = $filter["col"];
            $type = $filter["type"];
            $values = $filter["value"];

            if(count($values) == 0) continue;
            if(!in_array($col, $valid_fields)) continue;
            if(!$ok) $ok = true;

            $filter_str = null;
            if($type == "range"){
                $filter_str = " $col BETWEEN :{$col}_$n AND :{$col}_".(++$n);
            }else{
                if(count($values) == 1){
                    $filter_str = " $col = :{$col}_$n";
                }else{
                    $filter_str = " $col IN(";
                    foreach($values as $value){
                        $filter_str .= ":{$col}_".($n++).",";
                    }
                    $filter_str = substr($where, 0, strlen($where)-1);
                    $filter_str .= ")";
                    $n--;
                }
            }
            if($filter_str) $filter_strings[$col][] = $filter_str;
            $n++;
        }

        foreach($filter_strings as $col => $values){
            if(empty($values)) continue;
            $where .= " AND ";
            $where .= "(".implode(" OR ", $values).")";
        }

        return $ok ? $where : false;
    }

    public function setWhereFields(\PDOStatement $stmnt, $filters){
        $valid_fields = $this->getFields();
        $n = 0;
        foreach($filters as $filter){
            $col = $filter["col"];
            $type = $filter["type"];
            $values = $filter["value"];
            if(!in_array($col, $valid_fields)) continue;
            $count = 0;
            foreach($values as $value){
                if($count == 2 && $type == "range") break;
                $stmnt->bindValue("{$col}_$n", $value);
                $n++;
                $count++;
            }
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
