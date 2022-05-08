<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include '../includes/includes.php';

if (isset($_POST['Submit']))
{
    $dir = "../media/*.{png,jpg,gif,jpeg}";
    $images = glob( $dir,GLOB_BRACE );
  //  str_replace("../media/", "",$images);

    $obj = new Interact();
    $currentIMG = $obj->getAllImg();
    //print_r($currentIMG);
    $numTable = count($currentIMG);
    $numFolder = count($images);
    //echo $numTable;
   // echo $numFolder;
    for($i=0;$i<$numFolder;$i++){
        $subject = str_replace("../media/", "",$images[$i]);
        //echo $subject." ";
        $flag = 0;
        for($j=0;$j<$numTable;$j++){
            //echo $j;
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