<?php
include("Connection.php");
session_start();
$error ="";
$error1="";
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
$result=mysqli_query($connect,"SELECT *FROM addadmin WHERE admin_isDelete = 0");
$row = mysqli_fetch_assoc($result);


$msg = "";
$css_class = "";
if(isset($_POST["sbtn"]))
{
 //echo "<pre>", print_r($_FILES['profileImage']['name']), "</pre>";
 if(($_SESSION['id'])=='86'){
 $Admin_Image = time() . '_' . $_FILES['profileImage']['name'];
 $Admin_Name = $_POST["name"];
 $Admin_Email = $_POST["email"];
 $Admin_Password = $_POST["password"];
 $Admin_CPassword = $_POST["password2"];
 $Admin_PhoneNo = $_POST["phone"];
 $Admin_Gender = $_POST["gender"];
 
 $target = 'images/' . $Admin_Image;
 
 if(move_uploaded_file($_FILES['profileImage']['tmp_name'],$target))
 {
	 $msg = "Upload Sucessfully";
	 $css_class = "alert-sucess";
	 
 } else{
	 $msg = "Failed to upload";
	 $css_class = "alert-danger";
 }
if($_POST['password'] === $_POST["password2"]){
$select = mysqli_query($connect, "SELECT * FROM addadmin WHERE Admin_Email = '".$_POST['email']."'");
if(mysqli_num_rows($select)) {
    $error="This email address is already registered";
}else{
	 
	mysqli_query($connect,"INSERT INTO addadmin(Admin_Name,Admin_Email,Admin_Password,Admin_CPassword,Admin_PhoneNo,Admin_Gender,Admin_Image)VALUES('$Admin_Name','$Admin_Email','$Admin_Password','$Admin_CPassword','$Admin_PhoneNo','$Admin_Gender','$Admin_Image')");
 
	?>
		<script type="text/javascript">
		alert("Added Successfully!");
		
		</script>
		
	<?php 
 }
 }else{
	 $error1="Password Entered Does not Match";
 }
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

<!DOCTYPE html>
<html lang="en">
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
    <title>Add Account Page | JJG Fruits &amp Vege</title>
   

	
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
.form-div
{
	margin-top: 100px;
	border: 1px solid #e0e0e0;
	padding-top: 15px;
}

#displayImage
{
	display:block;
	width: 60%;
	margin: 10px auto;
	border-radius: 50%;
}



</style>	
	
</head>
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
        <div class="row tm-content-row tm-mt-big" style="font-family: 'Lato', sans-serif;">
            <div class="tm-col tm-col-big" style="margin: auto; width: 600px;">
                <div class="bg-white tm-block">
					<div class="row">
                        <div class="col-12">
				      <h1 class="tm-block-title">Add Account</h1>
					  </div>
					  </div>
                    <div class="row">	
                        <div class="col-12 ">
							<div class="form-center">
                            <form action="accounts.php" name= "addadmin" method="post" class="tm-signup-form" enctype="multipart/form-data">
							
								
								<div class="form-group">
									<label for="Image">Profile Picture</label>
									<img class="rounded-circle mt-5" width="475px" src="images/Placeholder.png" name="displayImage" id="dislayImage" />
									<div class="custom-file mt-3 mb-3">
									<input type="file" name="profileImage" id="fileInput" style="display:none" id="profileImage" >
									<input class="btn btn-primary d-block mx-xl-auto" type="button" name="profileImage" value="Upload Profile Image" onclick="document.getElementById('fileInput').click();" required />
									</div>
								</div>
                                <div class="form-group">
                                    <label for="name">Username </label>
                                    <input placeholder="Enter Your Username Here" name="name" type="text" class="form-control validate" required >
									
									<span id="errorname"></span>
                                </div>
                                <div class="form-group">
                                    <label for="email">Account Email </label>
									<input placeholder="Please Enter Your Email" id="email" name="email" type="email" class="form-control validate" required>
									<span style='color: red;'> <?php echo $error; ?> </span>
								</div>
                                <div class="form-group">
                                    <label for="password">Password </label>
                                    <input placeholder="Enter You Password" id="password" name="password" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*?[0-9])(?=.*?[!@#$%^&*+`~=?\|<>/]).{8,}" title="Must contain at least 8 or more characters with at least one number,one uppercase letter,one lowercase letter and one special character!"  required onkeyup='check();' class="form-control validate" required/>
                                </div>

                                <div class="form-group">
                                    <label for="password2">Re-enter Password </label>
                                    <input placeholder="Comfirm Your Password" id="password2" name="password2" type="password" required onkeyup='check();' class="form-control validate" required/>
									<div class="form-check">
										<label class="form-check-label">
										<input type="checkbox" class="form-check-input" onclick="myFunction()" style="width:12px;height:12px;" >&nbsp; Show Password
										<script type="text/javascript">
										function myFunction() {
										var x = document.getElementById("password");
										var y = document.getElementById("password2");
										if (x.type === "password") {
											x.type = "text";
											y.type = "text";
											
										} else {
											x.type = "password";
											y.type = "password";
										}
										}</script>
										</label>
									</div>
									<script>
									var check = function() {
									if (document.getElementById('password').value ==
									document.getElementById('password2').value) {
									document.getElementById('message').style.color = 'green';
									document.getElementById('message').innerHTML = 'Password Match';
									} else {
									document.getElementById('message').style.color = 'red';
									document.getElementById('message').innerHTML = 'Password Does Not Match';
										}	
									}
									</script>
									<span id="message"></span><span style='color: red;'><br> <?php echo $error1; ?> </span>	
									</div>
									<hr>
								<div class="form-group">
									<label for="gender">Gender &nbsp;	 </label>
									<select class="form-control selectList" style="width:100%;Height:4%;" name="gender" id="gender" required>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									<option value="Others">Others</option>
									</select>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone </label>
                                    <input placeholder="01X-XXXXXXX(X)" id="phone" name="phone" type="tel" class="form-control validate"  pattern="[0-9]{3}-[0-9]{7,8}" required>
                                </div>
								<hr>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <button type="submit" name="sbtn" class="btn btn-secondary" value="submit" onclick="">Create 
                                        </button>
										<a href="Staff.php" class="btn btn-danger" style="height:50px;margin-left:165%;margin-top:-40%;">Return</a>
                                    </div>
                                </div>
							
                            </form>
							</div>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
        <footer class="row tm-mt-small">
            <div class="col-12 font-weight-light">
                <p class="d-inline-block tm-bg-black text-white py-2 px-4">
                    Account Page
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
