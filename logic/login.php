<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
 include '../includes/includes.php';

if(isset($_POST['submit'])){
    $User = $_REQUEST['username'];
    $Pass = $_REQUEST['password'];


    $obj = new Interact();
    $arr = $obj->getUser($User);
    if(!$obj->getUser($User)){
        echo "username incorect";
    }else{
        if(md5($Pass.$User)==$arr['pass']){
            header("Location: ../control/dashboard.php");
           
        }
        else{
            echo "password incorect";
        }
    }

    
}

?>