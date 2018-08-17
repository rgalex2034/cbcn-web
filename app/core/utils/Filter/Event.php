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
            //TODO: This is a subtitle place holder.
            "subtitle" => "This is a placeholder",
            //TODO: This is a place holder description
            "description" => "Illo earum et omnis adipisci ut sit est. Modi fuga illo sit cum. Amet cumque aliquam nostrum quam. Repudiandae ex hic est iusto. Et non autem aut. Molestias ratione in explicabo.

Occaecati iusto et voluptatem voluptatum. Qui porro ducimus placeat aliquid eligendi sit quidem nam. Et optio pariatur excepturi in aut pariatur.

Itaque sint atque doloribus rem necessitatibus dicta quod sit. Quam saepe doloremque aliquam qui. Voluptatum debitis sit nam temporibus. Illo sit sed amet.

Animi quia velit quos qui ratione. Reprehenderit consequatur ab totam sit harum. Et dicta et et repellat. In quae possimus tenetur atque itaque fugiat doloremque ipsam.",
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
