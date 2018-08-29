<?php

function get_action(){
    $request = $_GET + $_POST;
    return isset($request["action"]) ? $request["action"] : false;
}

function process_action($action){
    if(function_exists($action)){
        call_user_func($action);
    }else{
        response("Action does not exists", 404);
    }
}

function response($body, $status = 200){
    http_response_code($status);
    echo $body;
}
