<!DOCTYPE HTML>
<html>
<head>
<title>Sign up</title>
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
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/signup.css" type="text/css">
    <script type="text/javascript"></script>
    
    <link rel="stylesheet" href="index/css/flaticon.css">
    <link rel="stylesheet" href="index/css/icomoon.css">
    <link rel="stylesheet" href="index/css/style.css">


<script type="text/javascript">
function validate()
{
	 var name;
	 var name_check=0;
	 name=document.signup.name.value;
	 if(name=="")
	 {
		 document.getElementById("errorname").innerHTML="Please enter your name.";
	 }
	 else
	 {
		document.getElementById("errorname").innerHTML="";
		name_check=1;
	 }
}
function validate_email()
{
   var v_email;
   var email_check = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
   ///^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(signup.useremail.value);
	v_email= document.signup.useremail.value;

	if(v_email==""||!v_email.match(email_check))
	{
		document.getElementById("erroremail").innerHTML="Please enter the proper email address";
	}
	else
	{
		document.getElementById("erroremail").innerHTML="";
		email_check=1;
	}
}
var password = document.getElementById("password");
var confirm_password = document.getElementById("confirm_password");

function validatePassword()
{
var password = document.getElementById("password");
var confirm_password = document.getElementById("confirm_password");
//var password_check=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z0-9])(?!.*\s).{8,15}$/;
if(password.value != confirm_password.value)
  {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } 
else 
 {
    confirm_password.setCustomValidity('');
  }
}
password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

</script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="home.html">JJG Fruit & Vege</a>
          <a class="navbar-brand">SIGNUP</a>
	    </div>
	  </nav>
      <div class="container1">
		<div class="signup-box">
				<div style ="font-weight:bold; text-align:center; font-size:20pt;">
					Sign-Up
				</div>
				<form name="signup" method="post" action="insert.php">
				
					
						<div class="textbox">
						<input type="text"  name="name" placeholder="Username" required>
						<span id="errorname" style="color:red;"></span>
						</div>
					
				<div class="textbox">
				<input type="email"  name="useremail" placeholder="Email" required>
				<span id="erroremail" style="color:red;"></span>
				</div>
				<div class="textbox">
				<input type="password" name="userpassword"  id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Password" required>
				
				<span id="error_pwd"></span>
				</div>
				<div class="textbox">
				<input type="password"  name="userrpassword" id="confirm_password"  placeholder="Re-type password" required>
				<span id="errorrpwd"></span>
				</div>
				<div class="button">
				<input type="submit" value="Sign Up" name="sbtn" onclick="validate(),validate_email(),validatePassword();">
				</div> 
				</form>
				<div style="text-align:center;">
					<p>Have an account?   <a href="login.php">Log in</a></p>
				</div>
		</div>
	</div>

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
    
</html>
</body>
</html>
