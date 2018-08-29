<?php

namespace PauSabe\CBCN\service;

use PauSabe\CBCN\model\dao as d;
use PauSabe\CBCN\model\classes as c;
use PauSabe\CBCN\utils as u;

class PlaceService{

    public static function create($address, $data = array()){
        $safe = new u\SafeArray($data);
        $place = new c\Place($address, $safe["short_address"], $safe["latitude"], $safe["longitude"]);

        $pl_dao = new d\PlaceDAO();
        $pl_dao->create($place);

        return $place->getId();
    }

    public static function update($id, $address, $data = array()){
        $safe = new u\SafeArray($data);
        $place = new c\Place($address, $safe["short_address"], $safe["latitude"], $safe["longitude"]);
        $place->setId($id);

        $pl_dao = new d\PlaceDAO();
        return $pl_dao->update($place);
    }

    public static function get($id){
        $pl_dao = new d\PlaceDAO();
        $place = $pl_dao->read($id);
        return $place;
    }

    public static function getAll($page = null, $qnt = null){
        $pl_dao = new d\PlaceDAO();
        $places = $pl_dao->readAll($page, $qnt);
        return $places;
    }

}
