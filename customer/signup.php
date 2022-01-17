<!DOCTYPE HTML>
<html>
<head>
<title>Sign up</title>


<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap"rel="stylesheet">
<link rel="stylesheet" href="css/signup.css" type="text/css">
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
	<div class="container">
		<div class="signup-box">
				<div class="title">
					Sign-Up
				</div>
				<form name="signup" method="post" action="insert.php">
				
					
						<div class="textbox">
						<input type="text"  name="name" placeholder="First Name" required>
						<span id="errorname"></span>
						</div>
					
				<div class="textbox">
				<input type="email"  name="useremail" placeholder="Email" required>
				<span id="erroremail"></span>
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
				<input type="submit" value="Sign Up" name="sbtn" onclick=" return validate(),validate_email(),validatePassword();">
				</div> 
				</form>
		</div>
	</div>
</html>
</body>
</html>
