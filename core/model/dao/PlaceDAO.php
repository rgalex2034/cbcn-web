<?php

namespace PauSabe\CBCN\model\dao;

use PauSabe\CBCN\model\classes\Place;

class PlaceDAO extends AbstractDAO{

    protected function onCreate($object, $conn){
        $sql = "INSERT INTO place (address, latitude, longitude)
                VALUES (:address, :latitude, :longitude)";

        $stmnt = $conn->prepare($sql);
        $stmnt->bindValue(":address", $object->getAddress());
        $stmnt->bindValue(":latitude", $object->getLatitude());
        $stmnt->bindValue(":longitude", $object->getLongitude());
        return $stmnt->execute();
    }

    protected function onRead($id, $conn){
        $sql = "SELECT id, address, latitude, longitude
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

    protected function onReadAll($context){
        
    }

    protected function onUpdate($object, $context){
        
    }

    protected function onDelete($object, $context){
        
    }

    private function createPlaceFromData($data){
        $place = new Place($data["address"], $data["latitude"], $data["longitude"]);
        return $place;
    }

}