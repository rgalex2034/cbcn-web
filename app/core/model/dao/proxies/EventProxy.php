<?php

namespace PauSabe\CBCN\model\dao\proxies;

use PauSabe\CBCN\model\dao;
use PauSabe\CBCN\model\classes\Event;
use PauSabe\CBCN\model\classes\Group;
use PauSabe\CBCN\model\classes\Place;

class EventProxy extends Event{

    private $is_group_loaded = false;
    private $group_id;
    private $is_place_loaded = false;
    private $place_id;

    public function setGroupId($id){
        if(isset($this->group_id) || $this->is_group_loaded){
            throw new \Exception("Unable to change a write once property.");
        }
        $this->group_id = $id;
        if(is_null($this->group_id)) $this->is_group_loaded = true;
    }

    public function setGroup(Group $group){
        $this->is_group_loaded = true;
        return parent::setGroup($group);
    }

    public function getGroup(){
        if(!$this->is_group_loaded){
            $group_dao = new dao\GroupDAO();
            if($group = $group_dao->read($this->group_id)){
                $this->group = $group;
            }
            $this->is_group_loaded = true;
        }
        return parent::getGroup();
    }

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
