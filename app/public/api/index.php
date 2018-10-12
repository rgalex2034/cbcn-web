<?php
require_once("../core.php");
require_once(CBCN_LIB_ROOT."/limonade.php");

use PauSabe\CBCN\service as s;
use PauSabe\CBCN\utils as u;

function getCommonParams(){
    $page = isset($_GET["page"]) ? (int)$_GET["page"] : null;
    $qnt  = isset($_GET["qnt"]) ? (int)$_GET["qnt"] : null;
    $filter = isset($_GET["filter"]) ? $_GET["filter"] : null;
    return [$page, $qnt, $filter];
}

dispatch("/", function(){
    return "Welcome to CBCN REST API!";
});

dispatch("/place", function(){
    list($page, $qnt) = getCommonParams();
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
    list($page, $qnt, $filter) = getCommonParams();
    $events = s\EventService::getAll($page, $qnt, $filter);
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
    list($page, $qnt) = getCommonParams();
    $groups = s\GroupService::getAll($page, $qnt);
    $serializer = new u\JSON();
    $serializer->addFilter(new u\Filter\GroupArray());
    return $serializer->encode($groups);
});

dispatch("/group/:id", function(){
    $id = params("id");
    $group = s\GroupService::get($id);
    $serializer = new u\JSON();
    $serializer->addFilter(new u\Filter\Group());
    return $serializer->encode($group);
});

run();
