<?php
include("Connection.php");
session_start();
error_reporting(0);
$error = "" ;
?>
<?php
if(!isset($_SESSION['id']))
{
?>
    <script>
    alert("Please login. Thank you!!!");
    </script>
    <?php
    header("refresh:0.001;url=login.php");
    //exit();
}
$Admin_id=$_SESSION['id'];
$result=mysqli_query($connect,"SELECT *FROM addadmin WHERE Admin_ID='$Admin_id'");
$row = mysqli_fetch_assoc($result);

if(isset($_GET["edit"]))
{
	if(($_SESSION['id'])=='86' || ($_SESSION['id'])==$_GET['id']){
	$ad_id=$_GET['id'];
	$result=mysqli_query($connect,"SELECT * from addadmin WHERE Admin_ID='$ad_id'");
	$row=mysqli_fetch_assoc($result);
}else{
	?>
	<script>
    alert("You are not the Super Admin !!!");
    </script>
    <?php
	 header("refresh:0.001;url=Staff.php");
}
}
?>
<?php

$msg ="";	
$css_class = "";
if(isset($_POST["upload"]))
{
	echo "<pre>", print_r($_FILES['profileImage']['name']), "</pre>";	
    $admin_image = time() . '_' . $_FILES['profileImage']['name'];
	
	mysqli_query($connect,"UPDATE addadmin SET Admin_Image = '$admin_image'
                                               WHERE Admin_ID = '$ad_id'");	
	
	$target = 'images/' . $admin_image;
        if(move_uploaded_file($_FILES['profileImage']['tmp_name'],$target))
        {
          $msg = "upload successfully";
		  $css_class = "alert-sucess";
        }
        else{
          $msg = "problem occur.";
		  $css_class = "alert-danger";
        }

        header("refresh:0.1");
}

?>
<?php
if(isset($_POST["sbtn"]))
{
	$admin_name = $_POST["name"];
    $admin_email = $_POST["email"];
    $admin_phone = $_POST["phone"];
    $admin_gender = $_POST["gender"];
	
	mysqli_query($connect,"UPDATE addadmin SET Admin_Name ='$admin_name',
                                               Admin_Email='$admin_email',
                                               Admin_PhoneNo = '$admin_phone',
                                               Admin_Gender = '$admin_gender'	
                                               WHERE Admin_ID = '$ad_id'");
		 ?>
		<script type="text/javascript">
		alert("Update Successfully!");
		
		</script>
		
		<?php 
	header("refresh:0.1");

}
mysqli_close($connect);
?>
	
<!DOCTYPE html>
<html lang="en">
<style>
select.selectList { width: 150px; }
</style>
<script type="text/javascript">
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
	v_email= document.signup.email.value;
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
</script>
<head>
    <meta charset="UTF-8">	
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Admin Accounts Page | JJG Fruits &amp Vege	</title>
   

	
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
	
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
	
	<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    
	
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
	
<style>
body {
	  
  background-image: url('img/colorfulfruitsandvegetables-ddf6c1ae7ad74d72866f5f64fe3118aa.jpg');
}



</style>	
	
	
</head>

<body class="bg01">
     <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-xl navbar-light bg-light">
                    <a class="navbar-brand" href="index.html">
                        <i class="fas fa-3x fa-tachometer-alt tm-site-icon"></i>
                         <h1 class="tm-site-title mb-0">JJG Fruits &amp Vege<br> Admin Dashboard</h1>
                    </a>
                    <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                     <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="Dashboard.php">Dashboard
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Account
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="ViewCustomer.php">Member's Account</a>
										<a class="dropdown-item" href="Staff.php">Staff's Account</a>
										<a class="dropdown-item" href="accounts.php">Add Staff's Account</a>
										<a class="dropdown-item" href="EditProfile.php?edit&id=<?php echo $_SESSION['id']?>">Edit Profile</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Product/Category
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="ViewProduct.php">View Product</a>
                                        <a class="dropdown-item" href="AddProduct.php">Add Product</a>
										
                                    </div>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="ViewOrder.php">Order</a>
                                </li>
								
								<li class="nav-item">
                                    <a class="nav-link" href="SalesReport.php">Sales Report</a>
                                </li>
								
                            </ul>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link d-flex" href="logout.php">
                                        <i class="far fa-user mr-2 tm-logout-icon"></i>
                                        <span>Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
		</div>
        <!-- row -->
        <div class="row tm-content-row tm-mt-big" style="font-family: 'Lato', sans-serif;" >
            <div class="tm-col tm-col-big" style="margin: auto; width: 600px;">
                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12" >
                            <h1 class="tm-block-title">Update Admin Account </h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <form name = "updatAdmin" method="post" class="tm-signup-form" enctype="multipart/form-data" >
								<div class="form-group">
									<label for="Image">Profile Picture</label>
									<div class="d-flex flex-column align-items-center text-center p-3 py-5">
									<img class="rounded-circle" width="400px" img src="images/<?php echo $row['Admin_Image'] ?>"/>
									</div>
									<div class="custom-file">
									<input type="file" name="profileImage" id="fileInput" style="display:none" id="profileImage" >
									<input class="btn btn-default d-block mx-xl-auto" type="button" name="profileImage" value="Upload Image" onclick="document.getElementById('fileInput').click();" />
									<button class="btn btn-info d-block mx-xl-auto" type="submit" name="upload" style="margin-top:10px">Save Profile Image</button>
									<br>
									<span style='color: red;margin-left:33%;'> <?php echo $error; ?> </span><hr>
									<br>
									</div>
								</div>
                                <div class="form-group">
                                    <label for="name">Username </label>
                                    <input value="<?php echo $row['Admin_Name']?>" placeholder="Enter Your Username Here" name="name" type="text" class="form-control" required >
									 
									<span id="errorname"></span>
                                </div>
                                <div class="form-group">
                                    <label for="email">Account Email </label>
                                    <input value="<?php echo $row['Admin_Email']?>" placeholder="Please Enter Your Email" id="email" name="email" type="email" class="form-control validate" readonly>
									<span id="erroremail"></span>	
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone </label>
                                    <input value="<?php echo $row['Admin_PhoneNo']?>" placeholder="01X-XXXXXXX(X)" id="phone" name="phone" type="tel" class="form-control validate" required pattern="[0-9]{3}-[0-9]{7,8}" >
                                </div>
								<div class="select">
                                    <br>
									<label for="gender">Gender &nbsp; </label>
									<select  class="form-control selectList" style="width:100%;Height:50%;" name="gender" id="gender" required>
									<option value="<?php echo $row['Admin_Gender']?>"><?php echo $row['Admin_Gender']?></option>
									<optgroup label="Gender">
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									<option value="Others">Others</option>
									</select>
                                </div>
								<hr>
                                <div class="form-group">
                                    <div class="col-12 col-sm-6">
									
                                        <button type="submit" name="sbtn" class="btn btn-secondary" onclick="Profile Updated">Update 
                                        </button>
										<a href="ChangePass.php?cPass&id=<?php echo $row['Admin_ID'];?>" class="btn btn-info" style="height:50px;margin-left:65%;margin-top:-40%;">Change Password</a>
										
										<a href="Staff.php" class="btn btn-danger" style="height:50px;margin-left:165%;margin-top:-65%;">Return</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
			</div>
        <footer class="row tm-mt-small">
            <div class="col-12 font-weight-light">
                <p class="d-inline-block tm-bg-black text-white py-2 px-4">
                    Profile Page
                </p>
            </div>
        </footer>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
</body>
</html>


