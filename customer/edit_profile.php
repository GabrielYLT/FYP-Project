<?php
include("dataconnection.php");
session_start();
if(isset($_SESSION["id"]))
{
	$cus_id=$_GET['id'];
	$result=mysqli_query($connect,"SELECT * from customer WHERE ID='$cus_id'");

	$row=mysqli_fetch_assoc($result);
}
?>
<?php
    $msg ="";
    if(isset($_POST['upload']))
    {
        $image = $_FILES['image']['name'];
  
        mysqli_query($connect,"UPDATE customer SET ProfileIMG='$image'
                                                    WHERE ID = '$cus_id'");

        $target ="Admin/images/".basename($_FILES['image']['name']);
        if(move_uploaded_file($_FILES['image']['tmp_name'],$target))
        {
          $msg = "upload successfully";
        }
        else{
          $msg = "problem occur.";
        }

        header("refresh:0.1");
    }
?>
<?php
if(isset($_POST["savebtn"]))
{
	$uname = $_POST["username"];
    $uemail = $_POST["useremail"];
    $uaddress = $_POST["useraddress"];
    $uposcode = $_POST["userposcode"];
    $ustate = $_POST["userstate"];
    $utel = $_POST["usertel"];
    $ubirth = $_POST["userbirthday"];
    
    
    mysqli_query($connect,"UPDATE customer SET Username ='$uname',
                                               Email='$uemail',
                                               PhoneNumber = '$utel',
                                               Birthday = '$ubirth',
                                               User_Address = '$uaddress',
                                               User_State = '$ustate',
                                               User_Poscode = '$uposcode'
                                               WHERE ID = '$cus_id'");
     
    header("location:profile.php");

}
mysqli_close($connect);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
</script>
<script>
$(function(){
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();

    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;    
    $('#txtDate').attr('max', maxDate);
});
  </script>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Edit Profile</title>
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
<link rel="stylesheet" href="css/profile1.css">
    <link rel="stylesheet" href="index/css/flaticon.css">
    <link rel="stylesheet" href="index/css/icomoon.css">
    <link rel="stylesheet" href="index/css/style.css">
  </head>
  
  <body class="goto-here">
		<div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+60 03-5454 6464</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text" name="email">
                <?php
                if(isset($_SESSION['id']))
                {
                    echo $row["Email"];
                }
                else 
                {
                    echo "";
                }
                ?>
                </span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						    <span class="text">3-5 Business days delivery &amp; Free Returns</span>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="main.php">JJG Fruits & Vege</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span>Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="main.php" class="nav-link">Home</a></li>
	          <li class="nav-item active dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	
                <a class="dropdown-item" href="product.php">Product</a>
                <a class="dropdown-item" href="cart.php">Cart</a>
                
              </div>
            </li>
              <li class="nav-item active dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $row["Username"] ?></a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="profile.php">Profile</a>
                <a class="dropdown-item" href="ViewOrder.php">View Order</a>
              	<a class="dropdown-item" href="logout.php">Logout</a>
               
                <a class="dropdown-item" href="cart.php">Cart</a>
                
              </div>
            </li>
	          <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span></a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('index/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="main.php">Home</a></span> <span class="mr-2"><a href="profile.php"><span>Profile Page</span></span></a></p>
            <h1 class="mb-0 bread">Edit Profile Page</h1>
          </div>
        </div>
      </div>
    </div>
    <body>
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class=col-md-3 border-right>
            <form name="profile" method="POST" enctype="multipart/form-data">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px"><?php echo "<img src='Admin/images/" .$row['ProfileIMG']."'width=300>"?>
                
            <h5>Profile Picture</h5>   
            <div style="width:150px";><input type="file" name="image" id="image"> </div>
            <button class="button-58" type="submit" name="upload" style="margin-top:50px">Save Profile Image</button>
            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 p-5">
                <div class="d-flex justify-content-between  align-items-center mb-3">
                    <h4 class="text-right">My Profile</h4>
                </div>
                <div class="row mt-2" style="padding-left:15px;">
                    <div class="col-md-12">
                        <label class="labels">Name:</label>
                        <input type="text" name="username" class="form-control" placeholder="Enter your name" value="<?php echo "".$row['Username'];?>">
                    </div>
                </div>
                <div class="row-mt-3" style="width:360px;"> 
                    <div class="col-md-12"><label class="labels">Email</label><input type="email" name="useremail" class="form-control" placeholder="example@gmail.com" value="<?php echo $row['Email'];?>"readonly></div>
                    <div class="col-md-12"><label class="labels">Address Line 1</label><input type="text" name="useraddress" class="form-control" placeholder="Enter Address 1" value="<?php echo $row["User_Address"];?>"></div>
                    <div class="col-md-12"><label class="labels">Postcode</label><input type="text" name="userposcode" class="form-control" placeholder="Postcode" value="<?php echo $row["User_Poscode"];?>"></div>
                    <div class="col-md-12"><label class="labels">State</label>
                    <select class="col-md-12 form-control" name="userstate" onchange="getOption()">
                      <option value="Kuala Lumpur">Kuala Lumpur</option>
                      <option value="Selangor">Selangor</option>
                      <option value="Melaka">Melaka</option>
                      <option value="Negeri Sembilan">Negeri Sembilan</option>
                      <option value="Pahang">Pahang</option>
                      <option value="Kelantan">Kelatan</option>
                      <option value="Terrenganu">Terrenganu</option>
                      <option value="Penang">Penang</option>
                      <option value="Perlis">Perlis</option>
                      <option value="Kedah">Kedah</option>
                      <option value="Johor">Johor</option>
                      <option value="Perak">Perak</option>
                      <option value="Sabah">Sabah</option>
                      <option value="Sarawak">Sarawak</option>
                    </select>
                    </div>    
                    <div class="col-md-12"><label class="labels">Phone Number</label><input type="number" name="usertel" class="form-control" pattern="[0-9]{3}-[0-9]{7,8}" placeholder="Enter your Phone Number" value="<?php echo $row["PhoneNumber"];?>"></div>
                    <div class="col-md-12"><label class="labels">Birthday</label><input type="date" name="userbirthday" id="txtDate" class="form-control" placeholder="Birthday" value="<?php echo $row["Birthday"];?>"></div> 
                </div>
                    
                <div>
                <div class="mt-5 text-center"><button class="button-58" type="submit" name="savebtn">Save Changes</button></div>
                <div class="mt-5 text-center"><a class="button-58" href="profile.php">Back</a></div>
                </div>

            </div>
        </div>
        <div class="col-md-4">  
        </div>
        </form>
    </div>
    
</div>


    
</div>
    <footer class="ftco-footer ftco-section">
      <div class="container">
      	<div class="row">
      		<div class="mouse">
						<a href="#" class="mouse-icon">
							<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
						</a>
					</div>
      	</div>
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Vegefoods</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
              <li class="ftco-animate"><a href="https://twitter.com/?lang=en"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="https://www.facebook.com/"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="https://www.instagram.com/"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Shop</a></li>
                <li><a href="#" class="py-2 d-block">About</a></li>
                <li><a href="#" class="py-2 d-block">Journal</a></li>
                <li><a href="contact_us.php" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Help</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
	                <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
	                <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
	                <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
	              </ul>
	              <ul class="list-unstyled">
	                <li><a href="#" class="py-2 d-block">FAQs</a></li>
	                <li><a href="contact_us.php" class="py-2 d-block">Contact</a></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Jalan Ayer Keroh Lama, 75450 Bukit Beruang, Melaka</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+60 03-5454 6464</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">jjgfruit@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
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
  <script src="indexjs/jquery.animateNumber.min.js"></script>
  <script src="index/js/bootstrap-datepicker.js"></script>
  <script src="index/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="index/js/google-map.js"></script>
  <script src="index/js/main.js"></script>
  

  <script>
		$(document).ready(function() {
    // On refresh check if there are values selected
    if (localStorage.selectVal) {
            // Select the value stored
        $('select').val( localStorage.selectVal );
    }
});

// On change store the value
$('select').on('change', function(){
    var currentVal = $(this).val();
    localStorage.setItem('selectVal', currentVal );
});
</script>
  </body>
</html>