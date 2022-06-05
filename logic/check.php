<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include '../includes/includes.php';

if(isset($_POST['checkUser'])){ // Username check
    
   $obj = new Interact();
   $pattern = "/^[a-zA-Z0-9]+$/"; 
   $User = $_REQUEST['checkUser'];
   if(in_array($User,$obj->getAllUsers())){   //Check if user is in database
        echo json_encode(['status' => 0,
        'html'   => "<p style='color:red;'>Username is not available.</p>"]);   
        }
        elseif(!preg_match($pattern,$User)){ // check for special characters
                echo json_encode(['status' => 0,
        'html'   => "<p style='color:red;' >Only numbers and letters allowed.</p>"]);
                
        } else{echo json_encode(['status' => 1, 'html'   => "<p style='color:green;'>Valid username</p>"]);  //Success message

           
    }
    //unset($obj);
   
}

if(isset($_POST['checkEmail'])){  //Email CHECK
        
        $Email = $_REQUEST['checkEmail'];
        $obj = new Interact();
        if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {    //FORMAT CHECK
                echo json_encode(['status' => 0,
                          'html'   => "<p style='color:red;' ><b>Invalid email format.</b></p>"]);
          }
        
        elseif (in_array($Email,$obj->getAllEmails())){ // check if email exists in database
                echo json_encode(['status' => 0,
                          'html'   => "<p style='color:red;' ><b>Email already in use.</b></p>"]);
                
        }else{  //success
                echo json_encode(['status' => 1,
                          'html'   => "<p style='color:green;'>Valid Email</p>"]);
                
        }
        
}
if(isset($_POST['checkPass'])){  //Password Check 
        $Pass = $_REQUEST['checkPass'];
        $pattern = "/^[a-zA-Z0-9]+$/";
        if(strlen($Pass)<6){ //check length of pass
                echo json_encode(['status' => 0,
                          'html'   => "<p style='color:red;' >Pasword must be at least 6 characters long.</p>"]);
        }
        
        elseif(!preg_match($pattern,$Pass)){ // check for special characters
                echo json_encode(['status' => 0,
                'html'   => "<p style='color:red;' >Only letters and numbers allowed.</p>"]);
        }
        else{
                echo json_encode(['status' => 1,
                'html'   => "<p style='color:green;' >Valid password.</p>"]);
        }
}
