<?php
require_once "core.php";
require_once "helpers/ajax.php";

use PauSabe\CBCN\service as s;
use PauSabe\CBCN\utils as u;

$action = get_action();
process_action($action);

function delete(){
    if(!isset($_POST["id"])) return response("ID missing", 400/*Bad request*/);
    s\EventService::delete($_POST["id"]) ? response("ok") : response("Unable to delete", 404);
}
