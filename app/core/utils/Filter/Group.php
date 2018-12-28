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
        $protocol = isset($_SERVER["HTTPS"]) ? "https://" : "http://";
        return array(
            "id" => $data["id"],
            "name" => $data["name"],
            "description" => $data["description"],
            "url_info" => $data["url_info"],
            "url_image" => $protocol.$_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].u\ImageFile::getImageUrl($data["url_image"]),
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
