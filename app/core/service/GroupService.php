<?php

namespace PauSabe\CBCN\service;

use PauSabe\CBCN\model\dao as d;
use PauSabe\CBCN\model\classes as c;

class GroupService{

    private static function newGroup($name, $place_id = null, $description = null,
                                $url_info = null, $url_image = null,
                                $responsible = null, $contact_email = null,
                                $contact_phone = null, $district = null){

        $group = new c\Group($name, null, $description, $url_info, $url_image,
            $responsible, $contact_email, $contact_phone, $district);

        if(!is_null($place_id)){
            $pl_dao = new d\PlaceDAO();
            $place = $pl_dao->read($place_id);
            $group->setPlace($place);
        }

        return $group;
    }

    public static function create($name, $place_id = null, $description = null,
                                $url_info = null, $url_image = null,
                                $responsible = null, $contact_email = null,
                                $contact_phone = null, $district = null){

        $group = self::newGroup($name, $place_id, $description, $url_info,
            $url_image, $responsible, $contact_email, $contact_phone,
            $district);

        $gr_dao = new d\GroupDAO();
        $gr_dao->create($group);

        return $group->getId();
    }

    public static function update($id, $name, $place_id = null, $description = null,
                                $url_info = null, $url_image = null,
                                $responsible = null, $contact_email = null,
                                $contact_phone = null, $district = null){

        $group = self::newGroup($name, $place_id, $description, $url_info,
            $url_image, $responsible, $contact_email, $contact_phone,
            $district);

        $gr_dao = new d\GroupDAO();
        return $gr_dao->update($group);
    }

    public static function get($id){
        $gr_dao = new d\GroupDAO();
        return $gr_dao->read($id);
    }

    public static function getAll($page = null, $qnt = null){
        $gr_dao = new d\GroupDAO();
        return $gr_dao->readAll($page, $qnt);
    }

}
