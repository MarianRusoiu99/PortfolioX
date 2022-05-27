<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
 include '../includes/includes.php';

if(isset($_POST['submit'])){
    $User = $_REQUEST['username'];
    $Email = $_REQUEST['email'];
    $Pass = $_REQUEST['password'];

   
    $obj = new Interact();
    if(in_array($User,$obj->getAllUsers())){
        echo"username already in use. <a href = '../control/register.html'>please try a new one.</a>";    
        if(in_array($Email,$obj->getAllEmails())){
            echo"email already in use. <a href = '../control/register.html'>please try a new one.</a>";  
    }
    }else{
         
            $obj->insertUser($User,$Pass,$Email);
            echo"user inserted succesfully";
        
    }
   
    
  
}

?>