<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include '../includes/includes.php';

if (isset($_POST['Submit']))
{
    $dir = "../media/*.{png,jpg,gif,jpeg}";
    $images = glob( $dir,GLOB_BRACE );

    $obj = new Interact();
    $currentIMG = $obj->getAllImg();
   
    $numTable = count($currentIMG);
    $numFolder = count($images);
  
    for($i=0;$i<$numFolder;$i++){ //searches for images in the media folder that are not in the database and deletes them
        $subject = str_replace("../media/", "",$images[$i]);
        
        $flag = 0;
        for($j=0;$j<$numTable;$j++){
            
            if($subject == $currentIMG[$j]['fname']){
                $flag = 1;   
            }
        }
        if($flag==0){
            unlink("../media/".$subject);
        }
        
    }

}
?>