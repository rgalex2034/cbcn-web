<?php
require_once("../../cbcn-core/autoloader.php");
require_once("../../cbcn-lib/limonade.php");

use PauSabe\CBCN\service as s;
use PauSabe\CBCN\utils as u;

dispatch("/", function(){
    return "Welcome to CBCN REST API!";
});

dispatch("/place", function(){
    $page = isset($_GET["page"]) ? (int)$_GET["page"] : null;
    $qnt  = isset($_GET["qnt"]) ? (int)$_GET["qnt"] : null;
    $places = s\PlaceService::getAll($page, $qnt);
    return u\JSON::encode($places);
});

dispatch("/place/:id", function(){
    $id = params("id");
    $place = s\PlaceService::get($id);
    return u\JSON::encode($place);
});

run();
