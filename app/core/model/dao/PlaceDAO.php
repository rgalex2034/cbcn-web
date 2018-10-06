<?php

namespace PauSabe\CBCN\model\dao;

use PauSabe\CBCN\model\classes\Place;

class PlaceDAO extends MysqlDAO{

    protected function onCreate($object, $conn){
        $sql = "INSERT INTO place (address, short_address, latitude, longitude)
                VALUES (:address, :short_address, :latitude, :longitude)";

        $stmnt = $conn->prepare($sql);
        $stmnt->bindValue(":address", $object->getAddress());
        $stmnt->bindValue(":short_address", $object->getShortAddress());
        $stmnt->bindValue(":latitude", $object->getLatitude());
        $stmnt->bindValue(":longitude", $object->getLongitude());
        $result = $stmnt->execute();
        if($result) $object->setId($conn->lastInsertId());
        return $result;
    }

    protected function onRead($id, $conn){
        $sql = "SELECT ".implode(", ", $this->getEscapedFields())."
                FROM place
                WHERE id = :id";

        $stmnt = $conn->prepare($sql);
        $stmnt->bindValue(":id", $id);
        $stmnt->execute();

        $place = null;
        if($row = $stmnt->fetch(\PDO::FETCH_ASSOC)){
            $place = $this->createPlaceFromData($row);
        }
        return $place;
    }

    protected function onReadAll($conn, $page, $qnt, $filter){
        $sql = "SELECT ".implode(", ", $this->getEscapedFields())."
                FROM place";

        $limit = MysqlDAO::getLimit($page, $qnt);
        if($limit) $sql .= " $limit";

        $stmnt = $conn->prepare($sql);
        $stmnt->execute();

        $places = array();
        while($row = $stmnt->fetch(\PDO::FETCH_ASSOC)){
            $places[] = $this->createPlaceFromData($row);
        }
        return $places;
    }

    protected function onUpdate($object, $conn){
        $sql = "UPDATE place
                SET ".$this->getUpdateFieldsStr()."
                WHERE id = :id";

        $stmnt = $conn->prepare($sql);
        $stmnt->bindValue(":address", $object->getAddress());
        $stmnt->bindValue(":short_address", $object->getShortAddress());
        $stmnt->bindValue(":latitude", $object->getLatitude());
        $stmnt->bindValue(":longitude", $object->getLongitude());
        $stmnt->bindValue(":id", $object->getId());

        return $stmnt->execute();
    }

    protected function onDelete($object, $conn){
        $sql = "DELETE FROM place
                WHERE id = :id";

        $stmnt = $conn->prepare($sql);
        $stmnt->bindValue(":id", $object->getid());

        return $stmnt->execute();
    }

    private function createPlaceFromData($data){
        $place = new Place($data["address"], $data["short_address"], $data["latitude"], $data["longitude"]);
        $place->setId($data["id"]);
        return $place;
    }

    protected function getFields(){
        return array("id", "address", "short_address", "latitude", "longitude");
    }

}
