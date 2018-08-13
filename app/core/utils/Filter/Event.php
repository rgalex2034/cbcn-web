<?php
namespace PauSabe\CBCN\utils\Filter;

use PauSabe\CBCN\utils as u;
use PauSabe\CBCN\service as s;

class Event implements u\Filter{

    public function filter($data){
        $place = s\PlaceService::get($data["place"]);
        $time = strtotime($data["date"]);
        $end_time = $time + 3600*3;//Add 3 hours
        return array(
            "id" => $data["id"],
            "title" => $data["name"],
            "duration" => array(
                "start" => array(
                        "day" => date("d", $time),
                        "month" => date("m", $time),
                        "year" => date("Y", $time),
                        "hour" => date("H", $time),
                        "minute" => date("i", $time),
                ),
                //TODO: End date now is a place holder. It's 3h after start date
                "end" => array(
                        "day" => date("d", $end_time),
                        "month" => date("m", $end_time),
                        "year" => date("Y", $end_time),
                        "hour" => date("H", $end_time),
                        "minute" => date("i", $end_time),
                )
            ),
            "image" => array(
                "url_real" => $data["image_full"],
                "url_thumbnail" => $data["image_low"],
            ),
            //TODO: Price is a placeholder
            "price" => "10.5",
            "location" => array(
                "latitude" => $place->getLatitude(),
                "longitude" => $place->getLongitude(),
                "address" => array(
                    //TODO: Short address is a placeholder
                    "short" => $place->getAddress(),
                    "long" => $place->getAddress(),
                )
            ),
            "url_info" => $data["url"],
            "organizer" => array(
                "name" => "Alex el puto amo",
                "email" => "alex@puto.amo",
                "mobile" => "696969696"
            )
        );
    }
}
