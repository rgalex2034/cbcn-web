<?php

namespace PauSabe\CBCN\model\classes;

use PauSabe\CBCN\model\classes\Group;
use PauSabe\CBCN\model\classes\Place;
use PauSabe\CBCN\utils\JSON;

class Event implements JSON\JsonSerializable{

    private $id;
    private $name;
    private $date;
    protected $place;
    private $url;
    private $image_full;
    private $image_low;
    private $contact_email;
    protected $group;

    public function __construct($name, $date = null, Place $place = null,
                                $url = null, $image_full = null, $image_low = null,
                                $contact_email = null, Group $group = null){
        $this->id = null;
        $this->name = $name;
        $this->setDate($date);
        $this->place = $place;
        $this->url = strval($url);
        $this->image_full = strval($image_full);
        $this->image_low = strval($image_low);
        $this->contact_email = strval($contact_email);
        $this->group = $group;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = is_null($id) ? null : intval($id);
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

    public function getImageFull(){
        return $this->image_full;
    }

    public function setImageFull($image_full){
        $this->image_full = strval($image_full);
    }

    public function getImageLow(){
        return $this->image_low;
    }

    public function setImageLow($image_low){
        $this->image_low = strval($image_low);
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

    public function jsonSerialize(){
        return array(
            "id" => $this->getId(),
            "name" => $this->getName(),
            "date" => $this->getDate(),
            "place" => $this->getPlace()->getId(),
            "url" => $this->getUrl(),
            "image_full" => $this->getImageFull(),
            "image_low" => $this->getImageLow(),
            "contact_email" => $this->getContactEmail(),
            "group" => $this->getGroup()->getId()
        );
    }

}
