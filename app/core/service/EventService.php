<?php

namespace PauSabe\CBCN\service;

use PauSabe\CBCN\model\dao as d;
use PauSabe\CBCN\model\classes as c;

class EventService{

    private static function newEvent($name, $date = null, $place_id = null,
                                $url = null, $image_full = null, $image_low = null,
                                $organizer = null, $contact_email = null,
                                $contact_phone = null, $group_id = null){

        $event = new c\Event($name, $date, null, $url, $image_full, $image_low,
            $organizer, $contact_email, $contact_phone);

        if(!is_null($place_id)){
            $pl_dao = new d\PlaceDAO();
            $place = $pl_dao->read($place_id);
            $event->setPlace($place);
        }

        if(!is_null($group_id)){
            $gr_dao = new d\GroupDAO();
            $group = $gr_dao->read($group_id);
            $event->setGroup($group);
        }

        return $event;
    }

    public static function create($name, $date = null, $place_id = null,
                                $url = null, $image_full = null, $image_low = null,
                                $organizer = null, $contact_email = null,
                                $contact_phone = null, $group_id = null){

        $event = self::newEvent($name, $date, $place_id, $url, $image_full,
            $image_low, $organizer, $contact_email, $contact_phone, $group_id);

        $ev_dao = new d\EventDAO();
        $ev_dao->create($event);

        return $event->getId();
    }

    public static function update($id, $name, $date = null, $place_id = null,
                                $url = null, $image_full = null, $image_low = null,
                                $organizer = null,$contact_email = null,
                                $contact_phone = null, $group_id = null){

        $event = self::newEvent($name, $date, $place_id, $url, $image_full,
            $image_low, $organizer, $contact_email, $contact_phone, $group_id);
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

}
