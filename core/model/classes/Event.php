<?php

namespace PauSabe\CBCN\model\classes;

use PauSabe\CBCN\model\classes\Group;
use PauSabe\CBCN\model\classes\Place;

class Event{

    private $id;
    private $name;
    private $date;
    private $place;
    private $url;
    private $contact_email;
    private $group;

    public function __construct($name, $date = null, Place $place = null,
                                $url = null, $contact_email = null,
                                Group $group = null){
        $this->id = null;
        $this->name = $name;
        $this->setDate($date);
        $this->place = $place;
        $this->url = strval($url);
        $this->contact_email = strval($contact_email);
        $this->group = $group;
    }

    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = strval($name);
    }

    public function getDate(){
        return $this->date;
    }

    public function setDate($date){
        $date = is_null($date) ? null : date("Y-m-d H:i:s", strtotime($date));
        $this->date = $date === false ? null : $date;
    }

    public function getPlace(){
        return $this->place;
    }

    public function setPlace(Place $place){
        $this->place = $place;
    }

    public function getUrl(){
        return $this->url;
    }

    public function setUrl($url){
        $this->url = strval($url);
    }

    public function getContactEmail(){
        return $this->contact_email;
    }

    public function setContactEmail($contact_email){
        $this->contact_email = strval($contact_email);
    }

    public function getGroup(){
        return $this->group;
    }

    public function setGroup(Group $group){
        $this->group = $group;
    }
}
