<?php
require_once __DIR__."/../core.php";

use PauSabe\CBCN\utils as u;

function get_image_url($image_name){
    return "/static/imgs/".$image_name;
}

function upload_image_input($tmp_name){
    $image_dir = CBCN_PUBLIC_ROOT."/static/imgs";
    $file_name = date("Ymdhi")."_".uniqid();
    $full_name = $file_name."_full";
    $low_name  = $file_name."_low";

    //Create directory in case does not exists
    if(!is_dir($image_dir)){
        $ok = mkdir($image_dir, 0755, true);
        if(!$ok){
            error_log(__FILE__.": Unable to create directory $image_dir");
            return false;
        }
    }

    $ok = move_uploaded_file($tmp_name, $original_file = $image_dir."/".$file_name);
    if(!$ok){
        error_log(__FILE__.": Unable to upload temporal file $tmp_name");
        return false;
    }

    $image_file = new u\ImageFile($original_file);
    if(!$image_file->generateFullImage($image_dir."/".$full_name)) return false;
    if(!$image_file->generateThumbail($image_dir."/".$low_name)) return false;

    return array(
        "image_original" => $original_file,
        "image_full" => $full_name,
        "image_low" => $low_name,
    );
}
