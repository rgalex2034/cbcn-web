<?php

namespace PauSabe\CBCN\service;

use PauSabe\CBCN\model\dao as d;
use PauSabe\CBCN\model\classes as c;

class PlaceService{

    public static function create($address, $latitude = null, $longitude = null){
        $place = new c\Place($address, $latitude, $longitude);

        $pl_dao = new d\PlaceDAO();
        $pl_dao->create($place);

        return $place->getId();
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
