<?php

namespace PauSabe\CBCN\model\dao;

use PauSabe\CBCN\model\classes\Group;
use PauSabe\CBCN\model\dao\proxies\GroupProxy;

class GroupDAO extends AbstractDAO{

    protected function onCreate($group, $conn){
        $sql = "INSERT INTO `group` (name, place, description, url_image, contact_email, district)
                VALUES (:name, :place, :description, :url_image, :contact_email, :district)";

        $stmnt = $conn->prepare($sql);
        $stmnt->bindValue(":name", $group->getName());
        $place = $group->getPlace();
        $stmnt->bindValue(":place", is_null($place) || !$place->getId() ? null : $place->getId());
        $stmnt->bindValue(":description", $group->getDescription());
        $stmnt->bindValue(":url_image", $group->getUrlImage());
        $stmnt->bindValue(":contact_email", $group->getContactEmail());
        $stmnt->bindValue(":district", $group->getDistrict());

        $result = $stmnt->execute();
        if($result) $group->setId($conn->lastInsertId());
        return $result;
    }

    protected function onRead($id, $conn){
        $sql = "SELECT id, name, place, description, url_image, contact_email, district
                FROM `group`
                WHERE id = :id";

        $stmnt = $conn->prepare($sql);
        $stmnt->bindValue(":id", $id);
        $stmnt->execute();

        $group = null;
        if($row = $stmnt->fetch(\PDO::FETCH_ASSOC)){
            $group = $this->createGroupFromData($row);
        }
        return $group;
    }

    protected function onReadAll($conn){
        $sql = "SELECT id, name, place, description, url_image, contact_email, district
                FROM `group`";

        $stmnt = $conn->prepare($sql);
        $stmnt->execute();

        $groups = array();
        while($row = $stmnt->fetch(\PDO::FETCH_ASSOC)){
            $groups[] = $this->createGroupFromData($row);
        }
        return $groups;
    }

    protected function onUpdate($object, $conn){
        $sql = "UPDATE `group`
                SET name = :name, place = :place, description = :description,
                    url_image = :url_image, contact_email = :contact_email,
                    district = :district
                WHERE id = :id";

        $stmnt = $conn->prepare($sql);
        $stmnt->bindValue(":name", $object->getName());
        $place = $object->getPlace();
        $stmnt->bindValue(":place", is_null($place) || !$place->getId() ? null : $place->getId());
        $stmnt->bindValue(":description", $object->getDescription());
        $stmnt->bindValue(":url_image", $object->getUrlImage());
        $stmnt->bindValue(":contact_email", $object->getContactEmail());
        $stmnt->bindValue(":district", $object->getDistrict());
        $stmnt->bindValue(":id", $object->getId());

        return $stmnt->execute();
    }

    protected function onDelete($object, $conn){
        $sql = "DELETE FROM group
                WHERE id = :id";

        $stmnt = $conn->prepare($sql);
        $stmnt->bindValue(":id", $object->getid());

        return $stmnt->execute();
    }

    private function createGroupFromData($data){
        $group = new GroupProxy($data["name"], null, $data["description"],
                                $data["url_image"], $data["contact_email"],
                                $data["district"]);
        $group->setId($data["id"]);
        $group->setPlaceId($data["place"]);
        return $group;
    }

}
