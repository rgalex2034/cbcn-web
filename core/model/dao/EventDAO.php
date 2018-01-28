<?php

namespace PauSabe\CBCN\model\dao;

use PauSabe\CBCN\model\dao\AbstractDAO;

class EventDAO extends AbstractDAO{

    protected function onCreate($event, $conn){
        $sql = "INSERT INTO event(name, `date`, place, url, contact_email, `group`)
        VALUES(:name, :date, :place, :url, :contact_email, :group)";

        $stmnt = $conn->prepare($sql);
        $stmnt->bindValue(":name", $event->getName());
        $stmnt->bindValue(":date", $event->getDate());
        $place = $event->getPlace();
        $stmnt->bindValue(":place", is_null($place) || empty($place->getId()) ? null : $place->getId());
        $stmnt->bindValue(":url", $event->getUrl());
        $stmnt->bindValue(":contact_email", $event->getContactEmail());
        $group = $event->getGroup();
        $stmnt->bindValue(":group", is_null($group) || empty($group->getId()) ? null : $group->getId());

        $stmnt->execute();
    }

    protected function onRead($id, $conn){
        
    }

    protected function onReadAll($conn){
        
    }

    protected function onUpdate($object, $conn){
        
    }

    protected function onDelete($object, $conn){
        
    }

}