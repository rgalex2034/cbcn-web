<?php

//Grab app path from parent file path.
$file_dir = dirname(__FILE__);
$root_app = dirname($file_dir);

//Set include path to the app directory.
set_include_path(get_include_path().PATH_SEPARATOR.$root_app);

//Register autoload function that maps namespaces as directories.
spl_autoload_register(function($clase){
    $clase = str_replace("\\", DIRECTORY_SEPARATOR, $clase).".php";
    if(is_file($clase)){
        include $clase;
        return true;
    }
    return false;
});
