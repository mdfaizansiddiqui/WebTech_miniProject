<?php

function clean($string){
    return htmlentities($string);
}

/*function redirect($path){
    return header("Location: {$path}")
}*/

?>



<?php

// Validating Form
    
function Validation(){
if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
    $first_name = clean($_POST['firstName']);
    $last_name = clean($_POST['lastName']);
    $username = clean($_POST['username']);
    $email = clean($_POST['email']);
    $password = clean($_POST['password']);
    $confirm_password = clean($_POST['confirmPassword']);
      $error = [];
    
    if(strlen($username) < 6){
        
$error[] = "<div class='alertError'>Please Make your username contains minimum 6 characters</div>";
        
        
    }
    
    if(strlen($password) < 6){
        $error[] = "<div class='alertError'>Password should be atleast 6 characters long</div>";
    }
    
    if($password !== $confirm_password){
        $error[] = "<div class='alertError'>Passwords Does Not Match. Please Verify Before Submitting</div>";
    }
    
    
    if(!empty($error)){
         $errors_count = count($error);
         echo "<h1 class='alertArray'>We Have found $errors_count Errors Please Fix it inorder to submit the form without errors</h1>";
        foreach($error as $errors){
            echo $errors. "<br>";
        }
    }else{
        
        
 registertodatabase($first_name,$last_name,$username,$email,$password);
        
    }
    
}
}


// Adding User 

function registertodatabase($first_name,$last_name,$username,$email,$password){
global $connection;
        
$first_name = escape($first_name);
   $last_name =  escape($last_name);
   $username = escape($username);
   $email = escape($email);
  $password = escape($password);
    //$messageWrap = [];
    
 if(emailExists($email)){
       echo "<div class='alertError'> Email Already Exists in our Database. Try Different Email</div>";
     return false;
    }
    else if(usernameExists($username)){
        echo "<div class='alertError'>This Username Already Exists in our Database Try Different Username</div>";
     return false;
    } else{
     
     $encryptedPassword = md5($password);
     $validation_code = md5($username . microtime() ) ;
     
     $token = 0;
        
        
$sql = "INSERT INTO users (firstName, lastName, email, username, password, validationCode, active)
VALUES ('$first_name', '$last_name', '$email', '$username', '$encryptedPassword', '$validation_code', 0)";        
        
            $result = mysqli_query($connection, $sql);
        
        if(!$result){
            echo "failed" . mysqli_error($connection);
            return false;
        }
    
        echo "<div class='alertSuccess'>Thank you for Registering. You Will Be Redirected to User Panel</div>";
        $_SESSION["Name"] = $first_name . " " . $last_name;
        header( "refresh:3;url=./user.php" );
     
 }   

}



function emailExists($email){
    
    $query = "SELECT `id` FROM `users` WHERE email = '$email'";
   $result = sendQuery($query);
    if(mysqli_num_rows($result) == 1){
        return true;
    }else{
        return false;
    }
    
}

function usernameExists($username){
    
    $query = "SELECT `id` FROM `users` WHERE username = '$username'";
   $result = sendQuery($query);
    if(mysqli_num_rows($result) == 1){
        return true;
    }else{
        return false;
    }
    
}


?>