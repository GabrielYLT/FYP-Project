<?php
session_start();
include("Connection.php");
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
		"SELECT * FROM addadmin WHERE Admin_Email='$name' AND Admin_CPassword='$pass' AND admin_isDelete=0");
		
		$count=mysqli_num_rows($result);
		
		if($count==1)
		{
			$row=mysqli_fetch_assoc($result);
			$_SESSION["id"]=$row["Admin_ID"];
			
			header("location:Dashboard.php");
			
		}
		else	
		{
			$error="<br>Username or password is invalid";
		}
		
	}
	
}
?>
<!DOCTYPE html>
<html> 
<head>

<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">



<title>Admin Login Page | JJG Fruits &amp Vege</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
	font-family: 'Lato', sans-serif;
  background-image: url('img/colorfulfruitsandvegetables-ddf6c1ae7ad74d72866f5f64fe3118aa.jpg');
}
form {border: 2px solid green;
      width:60%;	
	  height:90%;
	  margin:auto;
	  text-align:center;
	  display:flex;
	  display:grid;
	  border-radius:30px;
	  background-color:#D0F0C0;}
	  

label {
    display:inline-block;
    zoom:auto;              /* for IE7*/
    padding-top: 5px;
    text-align: center-left;
    width: 200px;
}

input[type=text], input[type=password] {
  width: 35%;
  padding: 15px;
  margin: 15px ;
  display: inline-block;
  border: 2px solid black;
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
<div class="row tm-content-row tm-mt-big" style="font-family: 'Lato', sans-serif;">
            <div class="tm-col tm-col-big" style="margin: auto; width: 1500px;">
                <div class="bg-white tm-block">
<form name="adminLogin" method="get">
	<h2>Login Page<h2>

	<img src="img/login.png" alt="Profile Image" class="img-fluid" width="200" >
	<br>
	<label> Admin Email  :</label><br>
	<input type ="text" name= "adminName" placeholder="Please Enter Your Username or Email" required>
	<br>	
	<label> Password :</label><br>
	<input type ="password" id="password"  name= "adminPass" placeholder="Please Enter Your Password" required>
	<span style="color: red;"> <?php echo $error; ?> </span>
	<div class="form-check">
										<label class="form-check-label">
										<input type="checkbox" class="form-check-input" onclick="myFunction()" style="width:12px;height:12px;" >&nbsp; Show Password
										<script type="text/javascript">
										function myFunction() {
										var x = document.getElementById("password");
										if (x.type === "password") {
											x.type = "text";
										} else {
											x.type = "password";
										}
										}</script>
										</label>
									</div>
		<br>
	<input type="submit" name="sendbtn" value="Login"></input>

</form>	
</div>
</div>
</div>
</body>
</html>

