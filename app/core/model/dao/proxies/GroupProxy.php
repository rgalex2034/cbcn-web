<?php

namespace PauSabe\CBCN\model\dao\proxies;

use PauSabe\CBCN\model\dao;
use PauSabe\CBCN\model\classes\Group;
use PauSabe\CBCN\model\classes\Place;

class GroupProxy extends Group{

    private $is_place_loaded = false;
    private $place_id;

    public function setPlaceId($id){
        if(isset($this->place_id) || $this->is_place_loaded){
            throw new \Exception("Unable to change a write once property.");
        }
        $this->place_id = $id;
        if(is_null($this->place_id)) $this->is_place_loaded = true;
    }

    public function setPlace(Place $place){
        $this->is_place_loaded = true;
        return parent::setPlace($place);
    }

    public function getPlace(){
        if(!$this->is_place_loaded){
            $place_dao = new dao\PlaceDAO();
            if($place = $place_dao->read($this->place_id)){
                $this->place = $place;
            }
            $this->is_place_loaded = true;
        }
        return parent::getPlace();
    }
}
