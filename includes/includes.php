<?php
spl_autoload_register('myAutoLoader');

function myAutoLoader($classname){
    $path = '../logic/';
    $extention = ".class.php";
    $fullPath = $path . $classname . $extention;

    if(!file_exists($fullPath)){
        return false;
    }

    include_once $fullPath;
}


?>  