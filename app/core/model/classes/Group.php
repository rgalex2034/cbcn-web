<?php

namespace PauSabe\CBCN\model\classes;

use \PauSabe\CBCN\model\classes\Place;
use PauSabe\CBCN\utils\JSON;

class Group implements JSON\JsonSerializable{

    private $id;
    private $name;
    protected $place;
    private $description;
    private $url_info;
    private $url_image;
    private $responsible;
    private $contact_email;
    private $contact_phone;
    private $district;

    public function __construct($name, Place $place = null, $description = null,
                                $url_info = null, $url_image = null,
                                $responsible = null, $contact_email = null,
                                $contact_phone = null, $district = null){
        $this->id = null;
        $this->name = strval($name);
        $this->place = $place;
        $this->description = strval($description);
        $this->url_info = strval($url_info);
        $this->url_image = strval($url_image);
        $this->responsible = strval($responsible);
        $this->contact_email = strval($contact_email);
        $this->contact_phone = $contact_phone;
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

    public function getUrlInfo(){
        return $this->url_info;
    }

    public function setUrlInfo($url_info){
        $this->url_info = strval($url_info);
    }

    public function getUrlImage(){
        return $this->url_image;
    }

    public function setUrlImage($url_image){
        $this->url_image = strval($url_image);
    }

    public function getResponsible(){
        return $this->responsible;
    }

    public function setResponsible($responsible){
        $this->responsible = strval($responsible);
    }

    public function getContactEmail(){
        return $this->contact_email;
    }

    public function setContactEmail($contact_email){
        $this->contact_email = strval($contact_email);
    }

    public function getContactPhone(){
        return $this->contact_phone;
    }

    public function setContactPhone($contact_phone){
        $this->contact_phone = $contact_phone;
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
            "url_info" => $this->getUrlInfo(),
            "url_image" => $this->getUrlImage(),
            "responsible" => $this->getResponsible(),
            "contact_email" => $this->getContactEmail(),
            "contact_phone" => $this->getContactPhone(),
            "district" => $this->getDistrict()
        );
    }

}
