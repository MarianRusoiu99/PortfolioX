<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include '../includes/includes.php';




 if (isset($_POST['Submit']) && isset($_POST['title'])) {

    $Title = $_REQUEST['title'];
    $obj = new Interact();
    $delete=$obj->getIdFromTitle($Title);
    $obj->deletePost(reset($delete));

    echo "Post with title ".$Title."was deleted";
 }
 else{
     echo"Something went wrong. Make sure the title of the post was inserted correctly.";
 }



 ?>