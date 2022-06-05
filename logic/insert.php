<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

 include '../includes/includes.php';




 if (isset($_POST['Submit'])) {
   

     $Title = $_REQUEST['title'];
     $Content = $_REQUEST['content'];
    

     $obj = new Interact();
     $obj->insertPost($Title,$Content); 

     $id = $obj->getIdFromTitle($Title); 
    
    $uploaddir = '../media/';
    
    $files = array_filter($_FILES['img']['name']);
    $total = count($_FILES['img']['name']);

    for ($i=0 ; $i < $total ; $i++) {
        $tmpFilePath = $_FILES['img']['tmp_name'][$i];
        if ($tmpFilePath != "") {
            //Setup our new file path
           
            $newFilePath = $uploaddir . $_FILES['img']['name'][$i];
     
            //Upload the file into the temp dir
            if (move_uploaded_file($tmpFilePath, $newFilePath)) {
     
                $obj->insertImg($_FILES['img']['name'][$i], $uploaddir, reset($id));
                echo "all good";
            }
            
        } 
     }



 }
