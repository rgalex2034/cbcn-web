<?php

namespace PauSabe\CBCN\service;

use PauSabe\CBCN\model\dao as d;
use PauSabe\CBCN\model\classes as c;
use PauSabe\CBCN\utils as u;

class EventService{

    private static function newEvent($name, $data = array()){
        $safe = new u\SafeArray($data);

        $event = new c\Event($name, $safe["subtitle"], $safe["description"],
            $safe["date"], $safe["date_end"], null, $safe["price"], $safe["url"],
            $safe["image_full"], $safe["image_low"],
            $safe["organizer"], $safe["contact_email"], $safe["contact_phone"]);

        if(is_numeric($place_id = $safe["place_id"])){
            $pl_dao = new d\PlaceDAO();
            $place = $pl_dao->read($place_id);
            $event->setPlace($place);
        }

        if(is_numeric($group_id = $safe["group_id"])){
            $gr_dao = new d\GroupDAO();
            $group = $gr_dao->read($group_id);
            $event->setGroup($group);
        }

        return $event;
    }

    public static function create($name, $data = array()){

        $event = self::newEvent($name, $data);

        $ev_dao = new d\EventDAO();
        $ev_dao->create($event);

        return $event->getId();
    }

    public static function update($id, $name, $data = array()){

        $event = self::newEvent($name, $data);
        $event->setId($id);

        $ev_dao = new d\EventDAO();
        return $ev_dao->update($event);
    }

    public static function get($id){
        $ev_dao = new d\EventDAO();
        return $ev_dao->read($id);
    }

    public static function getAll($page = null, $qnt = null){
        $ev_dao = new d\EventDAO();
        return $ev_dao->readAll($page, $qnt);
    }

    public static function delete($id){
        $ev = new c\Event(null);
        $ev->setId($id);
        $dao = new d\EventDAO();
        return $dao->delete($ev);
    }

}
