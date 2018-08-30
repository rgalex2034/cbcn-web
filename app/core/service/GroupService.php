<?php

namespace PauSabe\CBCN\service;

use PauSabe\CBCN\model\dao as d;
use PauSabe\CBCN\model\classes as c;
use PauSabe\CBCN\utils as u;

class GroupService{

    private static function newGroup($name, $data = array()){
        $safe = new u\SafeArray($data);
        $group = new c\Group($name, null, $safe["description"], $safe["url_info"], $safe["url_image"],
            $safe["responsible"], $safe["contact_email"], $safe["contact_phone"], $safe["district"]);

        if(is_numeric($place_id = $safe["place_id"])){
            $pl_dao = new d\PlaceDAO();
            $place = $pl_dao->read($place_id);
            $group->setPlace($place);
        }

        return $group;
    }

    public static function create($name, $data = array()){

        $group = self::newGroup($name, $data);

        $gr_dao = new d\GroupDAO();
        $gr_dao->create($group);

        return $group->getId();
    }

    public static function update($id, $name, $data = array()){

        $group = self::newGroup($name, $data);
        $group->setId($id);

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

    public static function delete($id){
        $gr_dao = new d\GroupDAO();
        $group = self::newGroup(null);
        $group->setId($id);
        return $gr_dao->delete($group);
    }

}
