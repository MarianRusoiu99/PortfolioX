<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include '../includes/includes.php';




 if (isset($_POST['Submit']) && isset($_POST['title'])) {

    $Title = $_REQUEST['title'];
    $nTitle = $_REQUEST['newtitle'];
    $Content = $_REQUEST['content'];
    
  //  echo $Title;
    
    $obj = new Interact();
    $delete=$obj->getIdFromTitle($Title);
    $obj->deletePost(reset($delete));

    echo "  post with title ".$Title." deleted";


 }
 else{
     echo"something went wrong";
 }



 ?>