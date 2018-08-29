<?php
require_once "core.php";
require_once "helpers/ajax.php";

use PauSabe\CBCN\service as s;
use PauSabe\CBCN\utils as u;

$action = get_action();
process_action($action);

function delete(){
    if(!isset($_POST["id"])) return response("ID missing", 400/*Bad request*/);
    s\GroupService::delete($_POST["id"]) ? response("ok") : response("Unable to delete", 404);
}

function save(){
    $safe_post = new u\SafeArray($_POST);
    $place_data = $safe_post["place"] ?: array();

    isset($place_data["id"]) && is_numeric($id = $place_data["id"]) ?
        s\PlaceService::update($id, $place_data["address"], $place_data) :
        s\PlaceService::create($place_data["address"], $place_data);

    isset($safe_post["id"]) && is_numeric($id = $safe_post["id"]) ?
        s\GroupService::update($id, $safe_post["name"], $safe_post->getOriginal()) :
        s\GroupService::create($safe_pust["name"], $safe_post->getOriginal());

    response("Done!");
}
