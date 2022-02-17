

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
    <title>Accounts Page</title>
   

	
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
	  
  background-image: url('img/dash-bg-03.jpg');
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
                                    <a class="nav-link" href="index.html">Dashboard
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Account
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="Member.html">Member's Account</a>
										<a class="dropdown-item" href="Staff.html">Staff's Account</a>
										<a class="dropdown-item" href="accounts.html">Update Staff's Account</a>
										<a class="dropdown-item" href="accounts.html">Update Member's Account</a>

                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Product/Category
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="Manage_Product.html">View Product</a>
                                        <a class="dropdown-item" href="Add_Product.html">Add Product</a>
										<a class="dropdown-item" href="Update_Product.html">Update Product</a>
										<a class="dropdown-item" href="Manage_Category.html">Category</a>
										

                                    </div>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="Manage_Order.html">Order</a>
                                </li>
								
								<li class="nav-item">
                                    <a class="nav-link" href="Sales_Report.html">Sales Report</a>
                                </li>
								
                            </ul>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link d-flex" href="login.html">
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
            <div class="tm-col tm-col-big">
                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12">
						<form name = "viewAdmin" method="post" action="insert.php" class="tm-list-group tm-list-group-alternate-color tm-list-group-pad-big" >
                        <h2 class="tm-block-title d-inline-block">Profile Picture</h2>
						<br>
						<img src="img/dash-bg-04.png" alt="Profile Image" class="img-fluid" width="600" >
                    			<div class="custom-file mt-3 mb-3">
								<input id="fileInput" type="file"  id="image" name= "image" style="display:none;" />
								<input type="button" class="btn btn-primary d-block mx-xl-auto" value="Upload Profile Photo." onclick="document.getElementById('fileInput').click();">
								</div>	
						</form>
                        </div>
                    </div>
					</form>
                </div>
            </div>
            <div class="tm-col tm-col-big">
                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title">Add Account</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <form name = "addadmin" method="post" action="insert.php" class="tm-signup-form">
								
                                <div class="form-group">
                                    <label for="name">Username *</label>
                                    <input placeholder="Enter Your Username Here" name="name" type="text" class="form-control validate" required >
									
									<span id="errorname"></span>
                                </div>
                                <div class="form-group">
                                    <label for="email">Account Email *</label>
                                    <input placeholder="Please Enter Your Email" id="email" name="email" type="email" class="form-control validate" required>
									<span id="erroremail"></span>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password *</label>
                                    <input placeholder="Enter You Password" id="password" name="password" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*?[0-9])(?=.*?[!@#$%^&*+`~=?\|<>/]).{8,}" title="Must contain at least 8 or more characters with at least one number,one uppercase letter,one lowercase letter and one special character!"  required onkeyup='check();' class="form-control validate" required/>
									
                                </div>
                                <div class="form-group">
                                    <label for="password2">Re-enter Password *</label>
                                    <input placeholder="Comfirm Your Password" id="password2" name="password2" type="password" required onkeyup='check();' class="form-control validate" required/>
									
									<br>
									<span id="message"></span>
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
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone *</label>
                                    <input placeholder="01X-XXXXXXX(X)" id="phone" name="phone" type="tel" class="form-control validate">
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <button type="submit" name="sbtn" class="btn btn-primary"> Add 
                                        </button>
                                    </div>
                                    
                                </div>

                            </form>
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