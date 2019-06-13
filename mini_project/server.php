<?php
session_start();

// initializing variables
$host="localhost:8080";
$username="root";
$password="";
$db="eventdb";
$errors = array();
$evloc=0;
$date=0;
$evname=0;
$evdetails="evdetails";

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
  $evname=isset($_POST['Eventname'])?$_POST['Eventname']: '';
  $evloc=isset($_POST['Eventlocation'])?$_POST['Eventlocation']: '';
  $flyer=isset($_FILES['photo']['name']) ?$_FILES['photo']['name']:''; 
  $date=isset($_POST['Eventdate'])?$_POST['Eventdate']: '';
  $category=isset($_POST['category'])?$_POST['category']: '';
  $campus=isset($_POST['campus'])?$_POST['campus']: '';
  $c_info=isset($_POST['c_info'])?$_POST['c_info']: '';
    
    //creating a directory in the server for flyers
    $target = "flyers/";
    $target = $target . basename( $_FILES['photo']['name']);
   
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($evname)) { array_push($errors, "Event name is required"); }
  if (empty($evloc)) { array_push($errors, "Event location is required");}
  if (empty($date)) { array_push($errors, "Event date is required"); }
    

    
    //first check the database to make sure 
    // an event does not already exist with the same name and location
      $user_check_query = "SELECT * FROM evdetails WHERE Eventlocation='$evloc' AND
      Eventname='$evname'AND
      Eventdate='$date' 
      LIMIT 1";
      $result = mysqli_query($con, $user_check_query);
      if(mysqli_num_rows($result)>=1){
          echo"Oops! sorry, this event has already been uploaded";
      } else{

    //upload events if there are no errors
    if(count($errors)== 0){
        if (isset($_POST['evupload'])) {
        $query = "INSERT INTO evdetails(Username,Email,Eventname,Eventlocation,Flyer,Eventdate,Category,Campus, c_info)
        VALUES ('$username','$email','$evname','$evloc','$flyer','$date', '$category','$campus','$c_info')";
        
        $result2=mysqli_query($con,$query);
        if(move_uploaded_file($_FILES['photo']['tmp_name'],$target)) { 
        }else {
            echo "Sorry, there was a problem uploading your file."; 
        }
        if($result2){
            $_SESSION['success'] = "You have successfully uploaded your event";
            echo "You have successfully uploaded your event";
           // header('location: homepage.html');
        }else{
            $error = mysqli_error($con);
            echo $error;
        } 
      }
    }
  }
}


 
?>