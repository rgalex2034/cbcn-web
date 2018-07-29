<?php

namespace PauSabe\CBCN\model\classes;

use \PauSabe\CBCN\model\classes\Place;
use PauSabe\CBCN\utils\JSON;

class Group implements JSON\JsonSerializable{

    private $id;
    private $name;
    protected $place;
    private $description;
    private $url_image;
    private $contact_email;
    private $district;

    public function __construct($name, Place $place = null, $description = null,
                                $url_image = null, $contact_email = null,
                                $district = null){
        $this->id = null;
        $this->name = strval($name);
        $this->place = $place;
        $this->description = strval($description);
        $this->url_image = strval($url_image);
        $this->contact_email = strval($contact_email);
        $this->district = strval($district);
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

    public function getPlace(){
        return $this->place;
    }

    public function setPlace(Place $place){
        $this->place = $place;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setDescription($description){
        $this->description = strval($description);
    }

    public function getUrlImage(){
        return $this->url_image;
    }

    public function setUrlImage($url_image){
        $this->url_image = strval($url_image);
    }

    public function getContactEmail(){
        return $this->contact_email;
    }

    public function setContactEmail($contact_email){
        $this->contact_email = strval($contact_email);
    }

    public function getDistrict(){
        return $this->district;
    }

    public function setDistrict($district){
        $this->district = strval($district);
    }

    public function jsonSerialize(){
        return array(
            "id" => $this->getId(),
            "name" => $this->getName(),
            "place" => $this->getPlace()->getId(),
            "description" => $this->getDescription(),
            "url_image" => $this->getUrlImage(),
            "contact_email" => $this->getContactEmail(),
            "district" => $this->getDistrict()
        );
    }

}
