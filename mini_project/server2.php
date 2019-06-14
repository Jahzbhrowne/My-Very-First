<?php
session_start();

// initializing variables
$host="localhost:8080";
$username="root";
$password="";
$db="eventdb";
$errors = array();
$username=0;
$email=0;
$password=0;
$user_td="user_tb";


error_reporting(E_ALL |E_STRICT);
// connect to the database
$con = mysqli_connect('localhost', 'root', '','eventdb' );
 // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
if ($_SERVER['REQUEST_METHOD']==='POST') {
    error_reporting(E_ALL);
  $username=isset($_POST['username']) ?$_POST['username']: '';   
  $email=isset($_POST['email']) ?$_POST['email']: '';
  $password=isset($_POST['password'])?$_POST['password']: '';
  $campus=isset($_POST['campus'])?$_POST['campus']: '';
  
    
    
   
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  if (empty($campus)) { array_push($errors, "Campus is required");}
  
    

    
    //first check the database to make sure 
    // an event does not already exist with the same name and location
      $user_check_query = "SELECT * FROM user_tb WHERE username='$username' AND
      email='$email' 
      LIMIT 1";
      $result = mysqli_query($con, $user_check_query);
      if(mysqli_num_rows($result)>=1){
          ?>
         <div class="heading">
    <?php
          echo"Oops! sorry, this user already has an account";
          ?>
           </div> 
        <?php
      } else{

    //log user in, if there are no errors
    if(count($errors)== 0){
        if (isset($_POST['signin'])) {
        $query = "INSERT INTO user_tb(username,email,password,Campus)
        VALUES ('$username','$email','$password','$campus')";
        
        $result2=mysqli_query($con,$query);
        
        if($result2){
            $_SESSION['success'] = "You have successfully signed in";
    ?>
            <div class="heading">
        <?php
            echo "You have successfully signed in";
           // header('location: homepage.html'); ?>
           </div> 
        <?php
        }else{
            $error = mysqli_error($con);
            echo $error;
        } 
      }
    }
  }
}


 
?>