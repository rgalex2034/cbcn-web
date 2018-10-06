<?php

namespace PauSabe\CBCN\model\dao;

use PauSabe\CBCN\model\dao\proxies;

class EventDAO extends MysqlDAO{

    protected function onCreate($event, $conn){
        $sql = "INSERT INTO event(name, subtitle, description, `date`, date_end,
            place, price, url, rec_age, image_full, image_low, organizer,
            contact_email, contact_phone, `group`)
            VALUES(:name, :subtitle, :description, :date, :date_end,
            :place, :price, :url, :rec_age, :image_full, :image_low, :organizer,
            :contact_email, :contact_phone, :group)";

        $stmnt = $conn->prepare($sql);
        $stmnt->bindValue(":name", $event->getName());
        $stmnt->bindValue(":subtitle", $event->getSubtitle());
        $stmnt->bindValue(":description", $event->getDescription());
        $stmnt->bindValue(":date", $event->getDate());
        $stmnt->bindValue(":date_end", $event->getDateEnd());
        $place = $event->getPlace();
        $stmnt->bindValue(":place", is_null($place) || !$place->getId() ? null : $place->getId());
        $stmnt->bindValue(":price", $event->getPrice());
        $stmnt->bindValue(":url", $event->getUrl());
        $stmnt->bindValue(":rec_age", $event->getRecommendedAge());
        $stmnt->bindValue(":image_full", $event->getImageFUll());
        $stmnt->bindValue(":image_low", $event->getImageLow());
        $stmnt->bindValue(":organizer", $event->getOrganizer());
        $stmnt->bindValue(":contact_email", $event->getContactEmail());
        $stmnt->bindValue(":contact_phone", $event->getContactPhone());
        $group = $event->getGroup();
        $stmnt->bindValue(":group", is_null($group) || !$group->getId() ? null : $group->getId());

        $result = $stmnt->execute();
        if($result) $event->setId($conn->lastInsertId());
        return $result;
    }

    protected function onRead($id, $conn){
        $sql = "SELECT ".implode(", ", $this->getEscapedFields())."
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

    protected function onReadAll($conn, $page, $qnt, $filter){
        if(!is_array($filter)) $filter = [];
        $sql = "SELECT ".implode(", ", $this->getEscapedFields())."
                FROM event";

        $where = MysqlDAO::getWhere(array_keys($filter));
        if($where) $sql .= " $where";

        $sql .= " ORDER BY `date` DESC";

        $limit = MysqlDAO::getLimit($page, $qnt);
        if($limit) $sql .= " $limit";

        $stmnt = $conn->prepare($sql);
        if($where) MysqlDAO::setWhereFields($stmnt, $filter);
        $stmnt->execute();

        $events = array();
        while($row = $stmnt->fetch(\PDO::FETCH_ASSOC)){
            $events[] = $this->createEventFromData($row);
        }
        return $events;
    }

    protected function onUpdate($object, $conn){
        $sql = "UPDATE event
                SET ".$this->getUpdateFieldsStr()."
                WHERE id = :id";

        $stmnt = $conn->prepare($sql);
        $stmnt->bindValue(":name", $object->getName());
        $stmnt->bindValue(":subtitle", $object->getSubtitle());
        $stmnt->bindValue(":description", $object->getDescription());
        $stmnt->bindValue(":date", $object->getDate());
        $stmnt->bindValue(":date_end", $object->getDateEnd());
        $place = $object->getPlace();
        $stmnt->bindValue(":place", is_null($place) || !$place->getId() ? null : $place->getId());
        $stmnt->bindValue(":price", $object->getPrice());
        $stmnt->bindValue(":url", $object->getUrl());
        $stmnt->bindValue(":rec_age", $object->getRecommendedAge());
        $stmnt->bindValue(":image_full", $object->getImageFull());
        $stmnt->bindValue(":image_low", $object->getImageLow());
        $stmnt->bindValue(":organizer", $object->getOrganizer());
        $stmnt->bindValue(":contact_email", $object->getContactEmail());
        $stmnt->bindValue(":contact_phone", $object->getContactPhone());
        $group = $object->getGroup();
        $stmnt->bindValue(":group", is_null($group) || !$group->getId() ? null : $group->getId());
        $stmnt->bindValue(":id", $object->getId());

        return $stmnt->execute();
    }

    protected function onDelete($object, $conn){
        $sql = "DELETE FROM event
                WHERE id = :id";

        $stmnt = $conn->prepare($sql);
        $stmnt->bindValue(":id", $object->getid());

        return $stmnt->execute();
    }

    private function createEventFromData($data){
        $event = new proxies\EventProxy($data["name"], $data["subtitle"],
            $data["description"], $data["date"], $data["date_end"], null,
            $data["price"], $data["url"], $data["image_full"],
            $data["image_low"], $data["organizer"], $data["contact_email"],
            $data["contact_phone"], null);
        $event->setRecommendedAge($data["rec_age"]);
        $event->setId($data["id"]);
        $event->setGroupId($data["group"]);
        $event->setPlaceid($data["place"]);
        return $event;
    }

    protected function getFields(){
        return array("id", "name", "subtitle", "description", "date", "date_end", "place",
            "price", "url", "rec_age", "organizer", "contact_email", "contact_phone", "image_full",
            "image_low", "group");
    }

}
