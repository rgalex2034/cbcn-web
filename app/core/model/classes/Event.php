<?php

namespace PauSabe\CBCN\model\classes;

use PauSabe\CBCN\model\classes\Group;
use PauSabe\CBCN\model\classes\Place;
use PauSabe\CBCN\utils\JSON;

class Event implements JSON\JsonSerializable{

    private $id;
    private $name;
    private $subtitle;
    private $description;
    private $date;
    private $date_end;
    protected $place;
    private $price;
    private $url;
    private $rec_age;
    private $image_full;
    private $image_low;
    private $organizer;
    private $contact_email;
    private $contact_phone;
    protected $group;

    public function __construct($name, $subtitle = null, $description = null,
                                $date = null, $date_end = null, Place $place = null,
                                $price = null, $url = null, $image_full = null,
                                $image_low = null, $organizer = null,
                                $contact_email = null, $contact_phone = null,
                                Group $group = null){
        $this->id = null;
        $this->name = $name;
        $this->setSubtitle($subtitle);
        $this->setDescription($description);
        $this->setDate($date);
        $this->setDateEnd($date_end);
        $this->place = $place;
        $this->price = $price;
        $this->setUrl($url);
        $this->setImageFull($image_full);
        $this->setImageLow($image_low);
        $this->setOrganizer($organizer);
        $this->setContactEmail($contact_email);
        $this->setContactPhone($contact_phone);
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

    public function getSubtitle(){
        return $this->subtitle;
    }

    public function setSubtitle($subtitle){
        $this->subtitle = strval($subtitle);
    }

    public function getDescription(){
        return $this->description;
    }

    public function setDescription($description){
        $this->description = strval($description);
    }

    public function getDate(){
        return $this->date;
    }

    public function setDate($date){
        $date = is_null($date) ? null : date("Y-m-d H:i:s", strtotime($date));
        $this->date = $date === false ? null : $date;
    }

    public function getDateEnd(){
        return $this->date_end;
    }

    public function setDateEnd($date_end){
        $date_end = is_null($date_end) ? null : date("Y-m-d H:i:s", strtotime($date_end));
        $this->date_end = $date_end === false ? null : $date_end;
    }

    public function getPlace(){
        return $this->place;
    }

    public function setPlace(Place $place){
        $this->place = $place;
    }

    public function getPrice(){
        return $this->price;
    }

    public function setPrice($price){
        $this->price = $price;
    }

    public function getUrl(){
        return $this->url;
    }

    public function setUrl($url){
        $this->url = strval($url);
    }

    public function getRecommendedAge(){
        return $this->rec_age;
    }

    public function setRecommendedAge($rec_age){
        $this->rec_age = intval($rec_age);
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

    public function getOrganizer(){
        return $this->organizer;
    }

    public function setOrganizer($organizer){
        $this->organizer = strval($organizer);
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

    public function getGroup(){
        return $this->group;
    }

    public function setGroup(Group $group){
        $this->group = $group;
    }

    public function jsonSerialize(){
        $group = $this->getGroup();
        $place = $this->getPlace();
        return array(
            "id" => $this->getId(),
            "name" => $this->getName(),
            "subtitle" => $this->getSubtitle(),
            "description" => $this->getDescription(),
            "date" => $this->getDate(),
            "date_end" => $this->getDateEnd(),
            "place" => $place ? $place->getId() : null,
            "price" => $this->getPrice(),
            "url" => $this->getUrl(),
            "image_full" => $this->getImageFull(),
            "image_low" => $this->getImageLow(),
            "organizer" => $this->getOrganizer(),
            "contact_email" => $this->getContactEmail(),
            "contact_phone" => $this->getContactPhone(),
            "group" => $group ? $group->getId() : null
        );
    }

}
