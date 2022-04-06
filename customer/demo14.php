<?php
include("dataconnection.php");
session_start();

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
$customer_id=$_SESSION['id'];
$result=mysqli_query($connect,"SELECT *FROM customer WHERE ID='$customer_id'");
$row = mysqli_fetch_assoc($result);
?>
<?php
if(isset($_POST["savebtn"]))
{
    $currentpassword = $_POST['currentpassword'];
    $upassword = $_POST['upassword'];
    $ucpassword = $_POST['ucpassword'];
    if($currentpassword!="" && $upassword!="" && $ucpassword!=""):
    
        //$customer_id = $_SESSION['id'];
        $oldpassword = mysqli_real_escape_string($connect,$currentpassword);
        $pwd = mysqli_real_escape_string($connect,$upassword);
        $c_pwd = mysqli_real_escape_string($connect,$ucpassword);

        if($pwd == $c_pwd):
        if($pwd!=$oldpassword):
            $sql = "SELECT * FROM customer WHERE ID='$customer_id' AND User_Password = '$oldpassword'";
            $db_check = mysqli_query($connect,$sql);
            $count = mysqli_num_rows($db_check);
        
        if($count==1):
        
            $sql1 =mysqli_query($connect,"UPDATE customer SET User_Password='$pwd',
                                                              confirm_password='$c_pwd'
                                                              WHERE ID ='$customer_id'");
            $currentpassword=''; $upassword='';$ucpassword='';
            $msg_success="Your New Password has update Successfully.";
        else:
            $error="The old password you gave is incorrect.";
        endif;
        else:
            $error="Old password new password same Please TRY AGAIN.";
        endif;
        else:
            $error="New password and confirm password do not matched";
        endif;
        else:
            $error="Please Fill all the fields";
        endif;
        
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!DOCTYPE html>
<html lang="en">
  <head>
  
    <title>Edit Password</title>
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
						    <span class="text">+ 1235 2355 98</span>
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
              	<a class="dropdown-item" href="shop.html">Shop</a>
              	<a class="dropdown-item" href="wishlist.html">Wishlist</a>
                <a class="dropdown-item" href="product-single.html">Single Product</a>
                <a class="dropdown-item" href="cart.html">Cart</a>
                <a class="dropdown-item" href="checkout.html">Checkout</a>
              </div>
            </li>
	          <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
	          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
	          <li class="nav-item cta cta-colored"><a href="cart.html" class="nav-link"><span class="icon-shopping_cart"></span>[0]</a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('index/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index/main.php">Home</a></span> <span class="mr-2"><a href=""></a></span> <span>Edit Password Page</span></p>
            <h1 class="mb-0 bread">Reset Password Page</h1>
          </div>
        </div>
      </div>
    </div>
    <body>

    <div class="row">
        <div class=col-md-3 border-right>
        <div id="msg" class="alert-danger alert" style="display:none">
                *Password Should not be less than 8
                <br>
                Old Password Does not match"
        </div>
            <form name="f1" id="f1" method="POST">
                <input type="hidden" name="todo" value="change-data">
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 p-5">
                <div class="d-flex justify-content-between  align-items-center mb-3">
                    <h4 class="text-right">Reset Password</h4>
                </div>
                <div class="row-mt-3">
                <div class="col-md-12"><label class="labels">Current Password</label><input type="password" name="currentpassword" id="newpassword" class="form-control" placeholder="Enter Current Password" value="" required></div>
                    <div class="col-md-12"><label class="labels">New Password</label><input type="password" name="upassword" id="t1" class="form-control" placeholder="Enter New Password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" value="" required></div>
                    <div class="col-md-12"><label class="labels">Confirm New Password</label><input type="password" name="ucpassword" class="form-control" placeholder="Comfirm Password" value="" required></div>

                </div>
                <span id="errorrpwd"></span>
                <div class="<?=(@$msg_success=="")? 'error':'green';?>">
                <?php echo @$error;?><?php echo @$msg_success;?>
                </div>    
                <div>
                <div class="mt-5 text-center"><button class="button-58" type="submit" id="b1"  name="savebtn">Save Password</button></div>
                <div class="mt-5 text-center"><a class="button-58" href="Main.php">Back</a></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <ul id="d1" class="list-group" style="display:none;">
                    <li class="list-group-item list-group-item-success">Password Condition</li>
                    <li class="list-group-item" id="d12" style="color:rgb(255,0,0);">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                        One Upper Case Letter
                    </li>
                    <li class="list-group-item" id="d13" style="color:rgb(255,0,0);">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                        One Lower Case Letter
                    </li>
                    <li class="list-group-item" id="d14" style="color:rgb(255,0,0);">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        One Special Char
                    </li>
                    <li class="list-group-item" id="d15" style="color:rgb(255,0,0);">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        One Number
                    </li>
                    <li class="list-group-item" id="d16" style="color:rgb(255,0,0);">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        Length 8 Char
                    </li>
                </ul>
              </div>
        </div>
        </form>
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
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
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
                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
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
	                <li><a href="#" class="py-2 d-block">Contact</a></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
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
$(document).ready(function()
{
    $(".savebtn").click(function(event){
        var data_str=$('#f1').serialize();
        $.post("demo14.php",$("#f1").serialize(),function(return_data){
            if(return_data.status_form=='OK')
            {
                $("#f1")[0].reset();
                $("#msg").removeClass('alert alert-danger').addClass('alert alert-info');
            }
            else
            {
                $("#msg").removeClass('alert alert-info').addClass('alert alert-danger');
            }
            $("#msg").html(return_data.msg);
            $("#msg").show();
            setTimeout(function()
            {
                $('#msg').fadeOut('slow');},6000);
        },"json");
    });
    $('#t1').keyup(function(){
        var str=$('#t1').val();
        var upper_text = new RegExp('[A-Z]');
        var lower_text = new RegExp('[a-z]');
        var number_check = new RegExp('[0-9]');
        var special_char = new RegExp('[!@#$%^&*()~`/.,?><":";{}|[]');
        var flag='T';

        if(str.match(upper_text))
        {
            $('#d12').html("<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>One Upper Case Letter");
            $('#d12').css("color","green");
        }
        else
        {
            $('#d12').css("color","red");
            $('#d12').html("<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>One Upper Case Letter ");
            flag='F';
        }

        if(str.match(lower_text))
        {
            $('#d13').html("<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>One Lower Case Letter");
            $('#d13').css("color","green");
            
        }
        else
        {
            $('#d13').css("color","red");
            $('#d13').html("<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>One Lower Case Letter");   
            flag='F';
        }
        if(str.match(special_char))
        {
            $('#d14').html("<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>One Special Case Letter");
            $('#d14').css("color","green");
        }
        else
        {
            $('#d14').css("color","red");
            $('#d14').html("<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>One Special Case Letter");   
            flag='F';
        }
        if(str.match(number_check))
        {
            $('#d15').html("<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>One Number Case Letter");
            $('#d15').css("color","green");
        }
        else
        {
            $('#d15').css("color","red");
            $('#d15').html("<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>One Number Case Letter")
            flag='F';
        }
        if(str.length>7)
        {
            $('#d16').html("<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>Length MORE than 8");
            $('#d16').css("color","green");
        }
        else
        {
            $('#d16').css("color","red");
            $('#d16').html("<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>Length NOT MORE than 8")
            flag='F';
        }

        if(flag=='T')
        {
            $("#d1").fadeOut();
            $('#display_box').css("color","green");
            $('#display_box').html("<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>"+str);
        }
        else
        {
            $("#d1").show();
            $('#display_box').css("color","red");
            $('#display_box').html("<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>"+str);
        }
        });

        $("#t1").blur(function(){
            $("#d1").fadeOut();
        });

        $("#t1").focus(function()
        {
            $("#d1").show();
        });



});	
</script>
    
  </body>
</html>
