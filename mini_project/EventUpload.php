<?php include('server.php')?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Event Upload</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="bootstrap1/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="bootstrap1/css/business-casual.min.css" rel="stylesheet">
	</head>

	<body>
        <h1 class="site-heading text-center text-white d-none d-lg-block">
    <span class="site-heading-upper text-primary mb-3">Hey there, </span>
    <span class="site-heading-lower">Upload Your Event Here</span>
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
             <a class="nav-link text-uppercase text-expanded" href="Upcomingevents.php" style="color: #e6a756"> Upcoming Events</a> </li>
             <li> <select class="dropdown">
                  <option>Academia</option>
                  <option>Religious</option>
                  <option>SRC</option>
                  <option>Social</option>
                  <option>Sports</option>
              </select>
          </li>
          <li><div class="search-container">
                <form action="Upcomingevents.php">
                    <input type="text" placeholder="Search Event..." name="search">
                    <button type ="submit">Submit</button>
                </form>  
              </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
      <section class="page-section cta" style="background:none">
      <div class="container"  >
        <div class="row">
            <div class="col-xl-9 mx-auto">
            <div class="cta-inner text-center rounded" style="border-style: double; border-color: #e6a756;border-width: thick" >
              <h2 class="section-heading mb-5">
                <span class="section-heading-upper"></span>
                <span class="section-heading-lower">Event Upload Form</span>
              </h2>
        <div>     
        <form enctype="multipart/form-data" name="Myform" action="EventUpload.php" method="post" class="cta">
        <?php include('errors.php'); ?>
            
        <p style="font-size:25px" >Username:</p>
        <input type="text" name="username" maxlength="50" style="border-radius: 1.5em; width:310px;padding:.5em">
        <p style="font-size:25px" >Email:</p>
        <input type="text" name="email" maxlength="50" style="border-radius: 1.5em; width:300px;padding:.5em">
        <p style="font-size:25px"> Event Name:</p>
        <input type="text" name="Eventname" maxlength="50" style="border-radius: 1.5em;width:280px;padding:.5em">
        <p style="font-size:25px"> Event Location:</p>
        <input type="text" name="Eventlocation" maxlength="50" style="border-radius: 1.5em;width:265px;padding:.5em">
        <p style="font-size:25px"> Event Flyer:</p>
        <input type="file" name="photo" accept="image/*">
        <p style="font-size:25px">Event Date:</p>
        <input type="date" name="Eventdate" style="border-radius: 1.5em;width:250px;padding:.5em">
         <p style="font-size:25px">Category:</p>
        
         <input type="radio" name="category" value="academia" >Academia<br>
         <input type="radio" name="category" value="src">SRC<br>
         <input type="radio" name="category" value="social">Social<br>
         <input type="radio" name="category" value="religious">Religious<br>
         <input type="radio" name="category" value="sports">Sports<br>
        
        <p style="font-size:25px">Campus:</p>
        
         <input type="radio" name="campus" value="KNUST" >KNUST<br>
         <input type="radio" name="campus" value="LEGON">LEGON<br>
         <input type="radio" name="campus" value="UCC">UCC<br>
         <input type="radio" name="campus" value="UDS">UDS<br>
        
        <p style="font-size:25px">Tell us about your company</p>
        <textarea style="border-radius: .85em;padding:0.5em" name="c_info"></textarea><br> <br>
        <p><input type="submit" placeholder="Submit" style="background-color:chocolate; border-radius: .85em;font-size:1.4em;border-style: double;border-color: brown" name="evupload" value="Upload Event"></p>
        </form>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>

        
        
    <footer class="footer text-faded text-center py-5">
    <div class="container">
      <p class="m-0 small">Copyright &copy; Jasbee Inc 2019</p>
    </div>
  </footer>

<script src="bootstrap1/vendor/jquery/jquery.min.js"></script>
  <script src="bootstrap1/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	</body>
</html>