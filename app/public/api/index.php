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
    $serializer = new u\JSON();
    return $serializer->encode($places);
});

dispatch("/place/:id", function(){
    $id = params("id");
    $place = s\PlaceService::get($id);
    $serializer = new u\JSON();
    return $serializer->encode($place);
});

dispatch("/event", function(){
    $page = isset($_GET["page"]) ? (int)$_GET["page"] : null;
    $qnt  = isset($_GET["qnt"]) ? (int)$_GET["qnt"] : null;
    $events = s\EventService::getAll($page, $qnt);
    $serializer = new u\JSON();
    $serializer->addFilter(new u\Filter\EventArray());
    return $serializer->encode($events);
});

dispatch("/event/:id", function(){
    $id = params("id");
    $event = s\EventService::get($id);
    $serializer = new u\JSON();
    $serializer->addFilter(new u\Filter\Event());
    return $serializer->encode($event);
});

dispatch("/group", function(){
    $page = isset($_GET["page"]) ? (int)$_GET["page"] : null;
    $qnt  = isset($_GET["qnt"]) ? (int)$_GET["qnt"] : null;
    $groups = s\GroupService::getAll($page, $qnt);
    $serializer = new u\JSON();
    return $serializer->encode($groups);
});

dispatch("/group/:id", function(){
    $id = params("id");
    $group = s\GroupService::get($id);
    $serializer = new u\JSON();
    return $serializer->encode($group);
});

run();
