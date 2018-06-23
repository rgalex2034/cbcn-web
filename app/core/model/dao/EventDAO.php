<?php

namespace PauSabe\CBCN\model\dao;

use PauSabe\CBCN\model\dao\AbstractDAO;
use PauSabe\CBCN\model\dao\proxies;

class EventDAO extends AbstractDAO{

    protected function onCreate($event, $conn){
        $sql = "INSERT INTO event(name, `date`, place, url, contact_email, `group`)
        VALUES(:name, :date, :place, :url, :contact_email, :group)";

        $stmnt = $conn->prepare($sql);
        $stmnt->bindValue(":name", $event->getName());
        $stmnt->bindValue(":date", $event->getDate());
        $place = $event->getPlace();
        $stmnt->bindValue(":place", is_null($place) || !$place->getId() ? null : $place->getId());
        $stmnt->bindValue(":url", $event->getUrl());
        $stmnt->bindValue(":contact_email", $event->getContactEmail());
        $group = $event->getGroup();
        $stmnt->bindValue(":group", is_null($group) || !$group->getId() ? null : $group->getId());

        $result = $stmnt->execute();
        if($result) $event->setId($conn->lastInsertId());
        return $result;
    }

    protected function onRead($id, $conn){
        $sql = "SELECT id, name, `date`, place, url, contact_email, `group`
                FROM event
                WHERE id = :id";
        
        $stmnt = $conn->prepare($sql);
        $stmnt->bindValue(":id", $id);
        $stmnt->execute();

        $event = null;
        if($row = $stmnt->fetch(\PDO::FETCH_ASSOC)){
            $event = $this->createEventFromData($row);
        }
        return $event;
    }

    protected function onReadAll($conn){
        $sql = "SELECT id, name, `date`, place, url, contact_email, `group`
                FROM event";

        $stmnt = $conn->prepare($sql);
        $stmnt->execute();

        $events = array();
        while($row = $stmnt->fetch(\PDO::FETCH_ASSOC)){
            $events[] = $this->createEventFromData($row);
        }
        return $events;
    }

    protected function onUpdate($object, $conn){
        $sql = "UPDATE event
                SET name = :name, `date` = :date, place = :place, url = :url,
                    contact_email = :contact_email, `group` = :group
                WHERE id = :id";

        $stmnt = $conn->prepare($sql);
        $stmnt->bindValue(":name", $object->getName());
        $stmnt->bindValue(":date", $object->getDate());
        $place = $object->getPlace();
        $stmnt->bindValue(":place", is_null($place) || !$place->getId() ? null : $place->getId());
        $stmnt->bindValue(":url", $object->getUrl());
        $stmnt->bindValue(":contact_email", $object->getContactEmail());
        $group = $object->getGroup();
        $stmnt->bindValue(":group", is_null($group) || !$group->getId() ? null : $group->getId());
        $stmnt->bindValue(":id", $object->getId());

        return $stmnt->execute();
    }

    protected function onDelete($object, $conn){
        
    }

    private function createEventFromData($data){
        $event = new proxies\EventProxy($data["name"], $data["date"], null, $data["url"], $data["contact_email"], null);
        $event->setId($data["id"]);
        $event->setGroupId($data["group"]);
        $event->setPlaceid($data["place"]);
        return $event;
    }

}
