<?php
require_once("../../cbcn-core/autoloader.php");
require_once("../../cbcn-lib/limonade.php");

use PauSabe\CBCN\service as s;
use PauSabe\CBCN\utils as u;

dispatch("/", function(){
    return "Welcome to CBCN REST API!";
});

dispatch("/place", function(){
    return "Have some places!";
});

dispatch("/place/:id", function(){
    $id = params("id");
    $place = s\PlaceService::get($id);
    return u\JSON::encode($place);
});

run();
