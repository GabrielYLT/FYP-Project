<?php
session_start();
include("Connection.php");
$error="";

if(isset($_GET["loginbtn"]))
{

    if(empty($_GET["Admin_Name"])||empty($_GET["Admin_CPassword"]))
    {
        $error="Username or password is invalid. Please Fill in";
    }
    else
    {
        $Admin_Name = $_GET["Admin_Name"];
        $Admin_CPassword = $_GET["Admin_CPassword"];

        $Admin_Name = mysqli_real_escape_string($connect,$Admin_Name);
        $Admin_CPassword = mysqli_real_escape_string($connect,$Admin_CPassword);

        $result = mysqli_query($connect, "SELECT * From admin WHERE Admin_Name='$Admin_Name' AND Admin_CPassword='$Admin_CPassword'");

        $count=mysqli_num_rows($result);

        if($count==1)
        {
            $row=mysqli_fetch_assoc($result);
            $_SESSION["id"]=$row["Admin_ID"];
            header("location:main.php");
        }
        else
        {
            $error = "Username or password are invalid. Please try again.";
        }




    }
}
?>
<!DOCTYPE html>
<html> 
<head>

<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">



<title>Admin Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
	font-family: 'Lato', sans-serif;
  background-image: url('img/dash-bg-03.jpg');
}
form {border: 3px solid green;
      width:70%;
	  height:90%;
	  margin:auto;
	  text-align:center;
	  display:flex;
	  display:grid;
	  background-color:white;}

input[type=text], input[type=password] {
  width: 30%;
  padding: 12px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid black;
  box-sizing: border-box;
  
}

button 
{
  background-color: #009900;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 15%;
  float: center-left;
}

button:hover 
{
  opacity: 0.9;
}

.cancelbtn 
{
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
  float:left;
}

.imgcontainer
{
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar 
{
  width: 15%;
  border-radius: 25%;
}

.container 
{
  padding: 16px;
}


span.psw 
{
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw 
  {
     display: block;
     float: center;
  }
  .cancelbtn 
  {
     width: 100%;
  }
}
</style>
</head>
<body>
<br>
<br>
<br>
<br>
<br>
<form action="index.html" method="post" class="tm-login-form">
	<h2>Rapid Grocery Store Admin Login</h2>
  <div class="container">
    <label for="uname"><b>Username :</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>
<br>
    <label for="psw"><b>Password :</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
<br>
	<p><input type="submit" name="loginbtn" value="Login" style="width:200px;height:30px"></p>
	<br>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color: white">
    <span class="psw"><a href="#">Forgot password?</a></span>
  </div>
</form>

</body>
</html>