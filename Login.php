<?php
session_start();
include("dataconnection.php");
$error="";

if(isset($_GET["loginbtn"]))
{

    if(empty($_GET["useremail"])||empty($_GET["userpassword"]))
    {
        $error="Username or password is invalid. Please Fill in";
    }
    else
    {
        $useremail = $_GET["useremail"];
        $upassword = $_GET["userpassword"];

        $useremail = mysqli_real_escape_string($connect,$useremail);
        $upassword = mysqli_real_escape_string($connect,$upassword);

        $result = mysqli_query($connect, "SELECT * From customer WHERE Email='$useremail' AND confirm_password='$upassword'");

        $count=mysqli_num_rows($result);

        if($count==1)
        {
            $row=mysqli_fetch_assoc($result);
            $_SESSION["id"]=$row["ID"];
            header("location:main.php");
        }
        else
        {
            $error = "Email and password are invalid. Please try again.";
        }




    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="index/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="index/css/animate.css">
    
    <link rel="stylesheet" href="index/css/owl.carousel.min.css">
    <link rel="stylesheet" href="index/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="index/css/magnific-popup.css">

    <link rel="stylesheet" href="index/css/aos.css">

    <link rel="stylesheet" href="index/css/ionicons.min.css">

    <link rel="stylesheet" href="index/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="index/css/jquery.timepicker.css">
    <link rel="icon" href="css/img_login/login.jpeg">
    <link rel="stylesheet" href="css/login.css">  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="index/css/flaticon.css">
    <link rel="stylesheet" href="index/css/icomoon.css">
    <link rel="stylesheet" href="index/css/style.css">
  </head>
 <body>
 <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="login.php">JJG Fruit & Vege</a>
          <a class="navbar-brand">Login</a>
	    </div>
	  </nav>
                <div class="bgc"></div>

            <div id="outsideform">
            <fieldset style="margin-top:100px;">
            <legend>
            <img src="css/img_login/2.png" style="width:200px; height:200px; margin-top:50px;">
            </legend>

            <div style="width:400px; padding:0px; margin:auto; border:1px #DDD";>


              <div id="login-title">
                <h4>
                LOGIN
                </h4>
              </div>
            <div id="loginform">

              <form name="loginfrm";>
              <p>
              <input type="email" name="useremail" placeholder="Email"></p>
              <p><input type="password" name="userpassword" placeholder="Password"></p>
              <p><input type="submit" name="loginbtn" value="Login"></p>
                <span style="color:red";><?php echo $error;?></span>
              <p style="color:black;"><a href="">Forgot Your Password?</a></p>
              <p style="color:black;"><a href="signup.php">Register</a></p>
              </div>
            </div>

            </div>		


            </fieldset>

        <footer class="ftco-footer ftco-section">
      <div class="container">
      	<div class="row">
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>. Downloaded from <a href="https://themeslab.org/" target="_blank">Themeslab</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="index/js/jquery.min.js"></script>
  <script src="index/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="index/js/popper.min.js"></script>
  <script src="index/js/bootstrap.min.js"></script>
  <script src="index/js/jquery.easing.1.3.js"></script>
  <script src="index/js/jquery.waypoints.min.js"></script>
  <script src="index/js/jquery.stellar.min.js"></script>
  <script src="index/js/owl.carousel.min.js"></script>
  <script src="index/js/jquery.magnific-popup.min.js"></script>
  <script src="index/js/aos.js"></script>
  <script src="index/js/jquery.animateNumber.min.js"></script>
  <script src="index/js/bootstrap-datepicker.js"></script>
  <script src="index/js/scrollax.min.js"></script>
 
  
  <script src="index/js/main.js"></script>
    
  </body>
</html>
