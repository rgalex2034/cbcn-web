<?php

namespace PauSabe\CBCN\model\dao\proxies;

use PauSabe\CBCN\model\classes\Event;
use PauSabe\CBCN\model\classes\Group;
use PauSabe\CBCN\model\classes\Place;

class EventProxy{

    private $is_group_loaded = false;
    private $is_place_loaded = false;

    public function setGroup(Group $group){
        $this->is_group_loaded = true;
        return parent::setGroup($group);
    }

    public function getGroup(){
        if(!$this->is_group_loaded){
            //TODO: Needs GroupDAO to load the Group
            throw new Exception("Not implemented. We need GroupDAO!");
        }
        return parent::getGroup();
    }

    public function setPlace(Place $place){
        $this->is_place_loaded = true;
        return parent::setPlace($place);
    }

    public function getPlace(){
        if(!$this->is_place_loaded){
            //TODO: Needs PlaceDAO to load the Group
            throw new Exception("Not implemented. We need PlaceDAO!");
        }
        return parent::getPlace();
    }
}