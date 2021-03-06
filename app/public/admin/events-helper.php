<?php
require_once "core.php";
require_once "helpers/ajax.php";
require_once "helpers/file.php";

use PauSabe\CBCN\service as s;
use PauSabe\CBCN\utils as u;

$action = get_action();
process_action($action);

function delete(){
    if(!isset($_POST["id"])) return response("ID missing", 400/*Bad request*/);
    s\EventService::delete($_POST["id"]) ? response("ok") : response("Unable to delete", 404);
}

function save(){
    $safe_post = new u\SafeArray($_POST);
    $place_data = $safe_post["place"] ?: array();

    isset($place_data["id"]) && is_numeric($id = $place_data["id"]) ?
        s\PlaceService::update($id, $place_data["address"], $place_data) :
        $place_data["id"] = s\PlaceService::create($place_data["address"], $place_data);

    $safe_post["place_id"] = $place_data["id"];

    if(isset($_FILES["image"]) && $_FILES["image"]["tmp_name"]){
        $res = upload_image_input($_FILES["image"]["tmp_name"]);
        if($res){
            $safe_post["image_full"] = $res["image_full"];
            $safe_post["image_low"] = $res["image_low"];
        } else if(!is_numeric($safe_post["id"])){
            return response("No se pueden subir las imágenes. Prueba con un menor tamaño.", 500);
        }
    }

    isset($safe_post["id"]) && is_numeric($id = $safe_post["id"]) ?
        s\EventService::update($id, $safe_post["name"], $safe_post->getOriginal()) :
        ($id = s\EventService::create($safe_post["name"], $safe_post->getOriginal()) );

    response($id);
}
