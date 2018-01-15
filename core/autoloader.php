<?php

/**
 * PSR-4 Compliant autoloader.
 * Include files from the namespace prefix PauSabe\CBCN
 */

//Grab app path from parent file path.
$root_app = dirname(__FILE__);

//Set include path to the app directory.
set_include_path(get_include_path().PATH_SEPARATOR.$root_app);

//Register autoload function that maps namespaces as directories.
spl_autoload_register(function($class) use($root_app){
    echo "$class\n";
    //Custom prefix for CBCN.
    $prefix = "PauSabe\CBCN";

    //If prefix is not found, return false.
    if(strpos($class, $prefix) !== 0) return false;

    //Delete prefix.
    $class = str_replace($prefix, $root_app, $class);
    echo "$class\n";

    //Include file
    $file = str_replace("\\", DIRECTORY_SEPARATOR, $class).".php";
    echo "$file\n";
    if(is_file($file)){
        include $file;
        return true;
    }
    return false;
});
