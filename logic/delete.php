<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include '../includes/includes.php';


$obj = new Interact();
$Title = $_REQUEST['title'];
 if (isset($_POST['Submit']) && isset($_POST['title']) && in_array($Title,$obj->getAllTitles())) {

   
    
    $delete=$obj->getIdFromTitle($Title);
    $obj->deletePost(reset($delete));

    echo "Post with title ".$Title." was deleted";
 }
 else{
     echo"Something went wrong. Make sure the title of the post was inserted correctly.";
 }



 ?>