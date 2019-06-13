<?php include('server.php')?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1">
<link href="bootstrap1/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="bootstrap1/css/business-casual.min.css" rel="stylesheet">
</head>
<body>
    <h1 class="site-heading text-center text-white d-none d-lg-block">
    <span class="site-heading-upper text-primary mb-3"></span>
    <span class="site-heading-lower">Upcoming Events</span>
  </h1>

    <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
    <div class="container">
      <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Menu</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item active px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="homepage.html">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          
         
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="help.html" style="color: #e6a756">Help</a>
          </li>
            <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="Upcomingevents.php" style="color: #e6a756"> Upcoming Events</a>
            </li>
            <?php
             function displImage(){
                $flyer_src= "http://localhost:8080/mini_project/flyers/";
                $images= array();
                 $query="SELECT Flyer
                 FROM evdetails
                 WHERE Category= 'Academia'
                 ORDER BY Eventdate ASC 
                 LIMIT 0,5" 
               or die(mysql_error($con));   
                    $result = mysqli_query($con, $query);
                if(mysqli_num_rows($result)>0){
                    ?>
                <!--<div class="image">-->
                  <?php
                   $count= 0;
                   while( $row = mysqli_fetch_array($result)) {
                    $file_path=$row ['Flyer'];
                    $images[$count] = $flyer_src.$file_path;
                       echo "<img src=$images[$count]><br><br><br>"; 
                     }      
                    ?>  
            <script type="text/javascript"> 
                function jvfunction(clicked){
                    var x = "<?php displImage(); ?>"
                    alert(x);
                    return false;
                }
            </script>
                <li> <select class="dropdown">
              <option onclick="jvfunction" >Academia</option>
                  <option>Religious</option>
                  <option>SRC</option>
                  <option>Social</option>
                  <option>Sports</option>
                    
                <?php
                   }
                }
            ?> 
              </select>
                  
          </li>
          <li><div class="search-container">
                <form action="Upcomingevents.php">
                    <input type="text" placeholder="Search Event..." name="search">
                    <button type ="submit" value="search">Submit</button>
                </form>  
              </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
   <!-- <div class="intro-button mx-auto" style="position:relative;top:40%;left:20%">
            <a class="btn btn-primary btn-xl" href="Upcomingevents.php" style="font-size:28px">View All Events</a>
          </div>-->
<?php

// connect to the database
$con = mysqli_connect('localhost', 'root', '','eventdb' );
 // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    } 
   ?>
    <div id="gridview">
        <div class="heading">HOTTEST EVENTS</div>
  <?php    
        $flyer_src= "http://localhost:8080/mini_project/flyers/";
        $images= array();
         $query="SELECT Flyer
         FROM evdetails 
         ORDER BY Eventdate ASC 
         LIMIT 0,5" 
         or die(mysql_error($con));   
            $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result)>0){
            ?>
        <div class="image">
          <?php
           $count= 0;
           while( $row = mysqli_fetch_array($result)) {
            $file_path=$row ['Flyer'];
            $images[$count] = $flyer_src.$file_path;
               echo "<img src=$images[$count]><br><br><br>";
               $count+= 1;
            ?>
    </div>
    <?php
   }
 }   
?>
        </div>
    
    <footer class="footer text-faded text-center py-5">
    <div class="container">
      <p class="m-0 small">Copyright &copy; Jasbee Inc 2019</p>
    </div>
  </footer>

<script src="bootstrap1/vendor/jquery/jquery.min.js"></script>
  <script src="bootstrap1/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    </body>
</html>

