<?php
namespace PauSabe\CBCN\utils\Filter;

use PauSabe\CBCN\utils as u;
use PauSabe\CBCN\service as s;
use PauSabe\CBCN\model\classes as c;

class Event implements u\Filter{

    public function filter($data){
        if(!($data instanceof c\Event)) return $data;
        $place = $data->getPlace();
        $group = $data->getGroup();
        $data = $data->jsonSerialize();
        $time = strtotime($data["date"]);
        $end_time = strtotime($data["date_end"]);
        $protocol = isset($_SERVER["HTTPS"]) ? "https://" : "http://";
        return array(
            "id" => $data["id"],
            "title" => $data["name"],
            "subtitle" => $data["subtitle"],
            "description" => $data["description"],
            "highlighted" => $data["highlighted"],
            "duration" => array(
                "start" => array(
                        "day" => date("d", $time),
                        "month" => date("m", $time),
                        "year" => date("Y", $time),
                        "hour" => date("H", $time),
                        "minute" => date("i", $time),
                ),
                "end" => array(
                        "day" => date("d", $end_time),
                        "month" => date("m", $end_time),
                        "year" => date("Y", $end_time),
                        "hour" => date("H", $end_time),
                        "minute" => date("i", $end_time),
                )
            ),
            "image" => array(
                "url_real" => $protocol.$_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].u\ImageFile::getImageUrl($data["image_full"]),
                "url_thumbnail" => $protocol.$_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].u\ImageFile::getImageUrl($data["image_low"]),
            ),
            "price" => $data["price"],
            "location" => !$place ? null : array(
                "latitude" => $place->getLatitude(),
                "longitude" => $place->getLongitude(),
                "address" => array(
                    "short" => $place->getShortAddress(),
                    "long" => $place->getAddress(),
                )
            ),
            "url_info" => $data["url"],
            "organizer" => array(
                "name" => $data["organizer"],
                "email" => $data["contact_email"],
                "mobile" => $data["contact_phone"]
            ),
            "group" => !$group ? null : array(
                "id" => $group->getId(),
                "name" => $group->getName(),
                "email" => $group->getContactEmail(),
                "mobile" => $group->getContactPhone()
            )
        );
    }
}
