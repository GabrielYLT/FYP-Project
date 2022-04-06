<?php
session_start();
include("dataconnection.php");
$error="";

if(isset($_GET["sendbtn"]))
{
	if(empty($_GET["adminName"])|| empty($_GET["adminPass"]))
	{
		$error="<br>username or userpassword is empty";
	}
	else
	{
		$name=$_GET["adminName"];
		$pass=$_GET["adminPass"];
		
		$name=mysqli_real_escape_string($connect,$name);
		$pass=mysqli_real_escape_string($connect,$pass);
		
		$result=mysqli_query($connect,
		"SELECT * FROM admin WHERE Admin_Name='$name' AND Admin_CPassword='$pass'");
		
		$count=mysqli_num_rows($result);
		
		if($count==1)
		{
			$row=mysqli_fetch_assoc($result);
			$_SESSION["id"]=$row["Admin_ID"];
			header("location:main.php");
		}
		else
		{
			$error="<br>Username and password is invalid";
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

input[type=submit] 
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
<form name="adminLogin" method="GET">
	<h2>Login <h2>
	<label> Username </label>
	<input type ="text" name= "adminName" placeholder="Please Enter Your Username or Email" required>
	<br>	
	<label> Password </label>
	<input type ="password" name= "adminPass" placeholder="Please Enter Your Password" required>
	<br>
	<input type="submit" name="sendbtn" value="Login"></input>
	<span> <?php echo $error; ?> </span>
</form>	

</body>
</html>

