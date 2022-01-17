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
            header("location:Index/main.html");
        }
        else
        {
            $error = "Email and password are invalid. Please try again.";
        }




    }
}
?>
<!DOCTYPE HTML>
<head>
<title>Login Page</title>
<link rel="icon" href="css/img_login/login.jpeg">
<link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="bgc"></div>

<div id="outsideform">
<fieldset>
<legend>
<img src="img_login/2.png" style="width:200px; height:200px; margin-top:50px;">
</legend>

<div style="width:400px; padding:0px; margin:auto; border:1px #DDD";>


	<div id="login-title">
		<h4>
		Login 
		</h4>
	</div>
<div id="loginform">

	<form name="loginfrm";>
	<p>
	<input type="email" name="useremail" placeholder="Email"></p>
	<p><input type="password" name="userpassword" placeholder="Password"></p>
	<p><input type="submit" name="loginbtn" value="Login">
    <span style="color:black";><?php echo $error;?></span>
	<p><a href="">Forgot Your Password?</a></p>
	<p><a href="signup.php">Register</a></p>
	</div>
</div>

</div>		


</fieldset>
</body>
</html>
