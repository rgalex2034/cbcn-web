<?php
namespace PauSabe\CBCN\utils\Filter;

use PauSabe\CBCN\model\classes as c;
use PauSabe\CBCN\utils as u;
use PauSabe\CBCN\service as s;

class Group implements u\Filter{

    public function filter($data){
        if(!($data instanceof c\Group)) return $data;
        $place = $data->getPlace();
        $data = $data->jsonSerialize();
        return array(
            "id" => $data["id"],
            "name" => $data["name"],
            "description" => $data["description"],
            "url_info" => $data["url_info"],
            "url_image" => $data["url_image"],
            "location" => !$place ? null : array(
                "latitude" => $place->getLatitude(),
                "longitude" => $place->getLongitude(),
                "adress" => array(
                    "short" => $place->getShortAddress(),
                    "long" => $place->getAddress()
                )
            ),
            "responsible" => [
                "name" => $data["responsible"],
                "email" => $data["contact_email"],
                "mobile" => $data["contact_phone"]
            ]
        );
    }

}
