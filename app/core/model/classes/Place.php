<?php

namespace PauSabe\CBCN\model\classes;

use PauSabe\CBCN\utils\JSON;

class Place implements JSON\JsonSerializable{
    
    private $id;
    private $address;
    private $short_address;
    private $latitude;
    private $longitude;

    public function __construct($address, $short_address, $latitude = null, $longitude = null){
        $this->id = null;
        $this->address = strval($address);
        $this->short_address = strval($short_address);
        $this->latitude = floatval($latitude);
        $this->longitude = floatval($longitude);
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = is_null($id) ? null : intval($id);
    }

    public function getAddress(){
        return $this->address;
    }

    public function setAdrress($address){
        $this->address = strval($address);
    }

    public function getShortAddress(){
        return $this->short_address;
    }

    public function setShortAdrress($short_address){
        $this->short_address = strval($short_address);
    }

    public function getCoordinates(){
        return array($latitude, $longitude);
    }

    public function getLatitude(){
        return $this->latitude;
    }

    public function setLatitude($latitude){
        $this->latitude = floatval($latitude);
    }

    public function getLongitude(){
        return $this->longitude;
    }

    public function setLongitude($longitude){
        $this->longitude = floatval($longitude);
    }

    public function jsonSerialize(){
        return array(
            "id" => $this->getId(),
            "address" => $this->getAddress(),
            "latitude" => $this->getLatitude(),
            "longitude" => $this->getLongitude()
        );
    }
}
