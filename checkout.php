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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $("#card").click(function(){
        $(".card-box").show();
        $(".cash-box").hide();
        $("#ccard").attr("required",true);
        $("#ccvv").attr("required",true);
        $("#cmonth").attr("required",true);
        $("#cyear").attr("required",true);
        $("#tnc").attr("required",true);

    });

    $("#cash").click(function(){
        $(".card-box").hide();
        $(".cash-box").show();
        $("#ccard").removeAttr("required");
        $("#ccvv").removeAttr("required");
        $("#cmonth").removeAttr("required");
        $("#cyear").removeAttr("required");
        $("#tnc").attr("required",true);
    });
});
</script>
<script>
function validate()
{
var name_check=0;
var name= document.billing.fname.value;
var address = document.billing.add.value;
var zip = document.billing.zip.value;
var phone = document.billing.phone.value;
var state =document.billing.state.value;
var email =document.billing.email.value;
var c_num = document.billing.cardnum.value;
var c_cvv = document.billing.cardcvv.value;

    if(name=="")
    {
        document.getElementById("errorname").innerHTML="Please Enter your name.";
    }
	else
	{
		document.getElementById("errorname").innerHTML="";
	}

    if(address=="")
    {
        document.getElementById("erroradd").innerHTML="Please provided the address.";
    }
	else
	{
		document.getElementById("erroradd").innerHTML="";
	}

	if(zip=="")
	{
		document.getElementById("errorzip").innerHTML="Please provided the Poscode";
	}
	else
	{
		document.getElementById("errorzip").innerHTML="";
	}
	if(phone=="")
	{
		document.getElementById("errorphone").innerHTML="Please provided the PhoneNumber";
	}
	else
	{
		document.getElementById("errorphone").innerHTML="";
	}
	
	if(email=="")
	{
		document.getElementById("erroremail").innerHTML="Please provided the Email";
	}
	else
	{
		document.getElementById("erroremail").innerHTML="";
	}
	if(c_num==""||isNaN(c_num)||c_num.length<16||c_num.length>16)
    {
        document.getElementById("errorcard").innerHTML="Invalid Card Number";
                
    }
    else 
    {
        document.getElementById("errorcard").innerHTML="";
    }
            
	if(c_cvv==""||isNaN(c_cvv)||c_cvv.length<3||c_cvv.length>3)
    {
        document.getElementById("errorcvv").innerHTML="Invalid CVV";
    }
    else
    {
        document.getElementById("errorcvv").innerHTML="";
    }
	
}
</script>
<script>
$('.tnc').on('input', function() {
  var input = $( this );
  var is_checked = $("input[name=tnc]:checked").prop("checked");
  if (is_checked){ 
    $('.tnc').removeClass("invalid").addClass("valid");
  } else {
    $('.tnc').removeClass("valid").addClass("invalid");
  }
});

</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Checkout Page</title>
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
    
    <link rel="stylesheet" href="index/css/flaticon.css">
    <link rel="stylesheet" href="index/css/icomoon.css">
    <link rel="stylesheet" href="index/css/style.css">

<style>
.card-box{
	padding-right:100px;
}
	</style>
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
              </div>
            </li>
              <li class="nav-item active dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $row["Username"] ?></a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="profile.php">Profile</a>
				  <a class="dropdown-item" href="ViewOrder.php">View Order</a>
				  <a class="dropdown-item" href="resetpassword.php">Change Password</a>
				  <a class="dropdown-item" href="cart.php">Cart</a>
              	<a class="dropdown-item" href="logout.php">Logout</a>
              </div>
            </li>
	          <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span></a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>
	  <?php
	
    		if(!empty($_SESSION["shopping_cart"]))
            {
              $total=0;
			  ?>
			  <?php
			  
              foreach($_SESSION["shopping_cart"] as $keys =>$values)
              {
				$item_id = $values["item_id"];
				$item_qty = $_POST["qty"];
				
				$item_price = $_POST["price"];
				
                ?>
              <tr>
				</tr>
                <?php
				$total = $total +($item_qty*$values["item_price"]);
                  if($total<5)
                  {
                      $subtotal = $total+5;
                  }
                  else
                  {
                      $subtotal = $total-3+5;
                  }
				  
              
			}
		}
			
              ?>
<div class="hero-wrap hero-bread" style="background-image: url('index/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="main.php">Home</a></span> <span>Checkout</span></p>
            <h1 class="mb-0 bread">Checkout Page</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
		  <form name="billing" class="billing-form" id="billing"  method="POST" action="payment_success.php">
									<h3 class="billing-heading mb-4"><b>Payment Method</b></h3>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">	
											   <input type="radio" name="pay" class="mr-2"  id="card" value="Debit Card and Credit Card">Debit and Credit
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <input type="radio" name="pay" class="mr-2"  id="cash" value="Cash On Delivery">Cash Payment
											</div>
										</div>
									</div>
				<h3 class="mb-4 billing-heading"><b>Delivery Details</b></h3>
				<div class="row align-items-end">
	          		<div class="col-md-12">
	                <div class="form-group">
					<label>Name: <label style="color:red">(Pls fill in the name same as your NRIC)</label></label>
	                  <input type="text" name="fname" id="username" class="form-control" pattern="[a-zA-Z]{1,}" title="Only insert the alphabetic letter" placeholder="Please enter you name" required>
                      <span id="errorname" style="color:red"></span>
	                </div>
	              </div>
                <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
		            		<label for="country">State</label>
		            		<div class="select-wrap">
		                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
		                  <select name="state" id="state" class="form-control" value="<?php echo $row['User_State']?>"required>
						  		<option value="<?php echo $row['User_State']?>"><?php echo $row['User_State']?></option>
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
						  <span id="errorstate" style="color:red"></span>
		                </div>
		            	</div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
	                	<label for="streetaddress">Address (Please State Clearly)</label>
	                  <input type="text" class="form-control" name ="add" value="<?php echo $row['User_Address']?>" required>
                      <span id="erroradd" style="color:red"></span>
	                </div>
		            </div>
		            <div class="col-md-12">
		            	<div class="form-group">
		            		<label for="postcodezip">Postcode / ZIP *</label>
	                  <input type="text" class="form-control" name="zip" pattern="[0-9]{5}" title="Error length" minlength="5" value="<?php echo $row['User_Poscode'] ?>" required>
					  <span id="errorzip" style="color:red"></span>
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
	                <div class="form-group">
	                	<label for="phone">Phone</label>
	                  <input type="tel" class="form-control" name="phone" value="<?php echo $row['PhoneNumber']?>" required>
					<span id="errorphone" style="color:red"></span>
					</div>
	              </div> 
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="emailaddress">Email Address</label>
	                  <input type="email" class="form-control" name="email" title="Email Must include @ AND .com" value="<?php echo $row['Email']?>" required>
					  <span id="erroremail" style="color:red"></span>
	                </div>
                </div>	
		<div class="card-box" id="card-box" style="display:none">
				<div class="col-md-30">
							<label for="cnumber">Card Number</label>
							<input type="text" class="form-control" name="cardnum" id="ccard" minlength="16" maxlength="16" placeholder="0000-0000-0000-0000" pattern="[1-99]{16}" title="Please Key in the correct 16 digit">
							<span id="errorcard" style="color:red"></span>
				</div>

				<div class="col-md-20">
							<label for="ccvv">CVV</label>
							<input type="text" class="form-control" name="cardcvv" id="ccvv" placeholder="000" pattern="[0-99]{3}" minlength="3" maxlength="3" title="Please Key in the correct 3 digit">
							<span id="errorcvv" style="color:red"></span>
				</div>
				<div class="col-md-20">
							<label for="cmonth">Expiry Date</label>
							<select class="col-md-12 form-control" name="card_month" id="cmonth" placeholder="" title="MANDATORY to choose a month">
								<option value="">Select Month</option>
								<option value="01">January</option>
								<option value="02">February</option>
								<option value="03">March</option>
								<option value="04">April</option>
								<option value="05">May</option>
								<option value="06">June</option>
								<option value="07">July</option>
								<option value="08">August</option>
								<option value="09">September</option>
								<option value="10">October</option>
								<option value="11">November</option>
								<option value="12">December</option>
							</select>
							
				</div>
				<div class="col-md-20">
	                		<label for="cyears">Years</label>
							<select class="col-md-12 form-control" name="card_years" id="cyear" placeholder=""required>
							<option value="">Select Year</option>
							<option value="2012">2012</option>
							<option value="2013">2013</option>
							<option value="2014">2014</option>
							<option value="2015">2015</option>
							<option value="2016">2016</option>
							<option value="2017">2017</option>
							<option value="2018">2018</option>
							<option value="2019">2019</option>
							<option value="2020">2020</option>
							<option value="2021">2021</option>
							<option value="2022">2022</option>
							<option value="2023">2023</option>
							<option value="2024">2024</option>
							<option value="2025">2025</option>
							<option value="2026">2026</option>                          
							<option value="2027">2027</option>
							<option value="2028">2028</option>
							<option value="2029">2029</option>
							<option value="2030">2030</option>
							<option value="2031">2031</option>
							<option value="2032">2032</option>
							<option value="2033">2033</option>
							<option value="2034">2034</option>
							<option value="2035">2035</option>
							<option value="2036">2036</option>
							</select>   
							
	</div>
	</div>
                <div class="w-100">
				<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <input type="radio" id="tnc" name="tnc" class="tnc" value="I have read and accept the terms and conditions" class="mr-2" required> I have read and accept the terms and conditions
											   <br><span class="error" style="color:red"><b> AGREE </b> Terms and Condition is required</span>
											   <br><span style="color:red"><b>NOTICE:</b></span>
											   <br><span style="color:red">PLEASE MAKE SURE YOUR DELIVERY DETAILS IS CORRECT</span>
											</div>
										</div>
									</div>
				</div>
                <div class="col-md-12">
                	<div class="form-group mt-4">
                    <input type="hidden" value="<?php echo $item_qty?>" name="hidden_qty">
                    <input type="hidden" value="<?php echo $subtotal?> " name="hidden_total">
					<div class="card-box" style="display:none">
					<button type="submit" href="menu.php" value="Place to Order"  id="cardbutton" name="cardbutton" class="btn btn-primary py-3 px-4"  onClick="validate()">Place to Order</button>
					</div>
					<div class="cash-box" style="display:none">
					<button type="submit" href="menu.php" value="Place to Order"  id="cashbutton"  name="cashbutton"  class="btn btn-primary py-3 px-4"  onClick="validate()">Place to Order</button>
					</div>
				</div>
                </div>
		</div>
		</form><!-- END -->
		</div>
			
			<div class="col-xl-5">
	          <div class="row mt-5 pt-3">
	          	<div class="col-md-12 d-flex mb-5">
	          		<div class="cart-detail cart-total p-3 p-md-4">
	          			<h3 class="billing-heading mb-4" style="font-weight:bold;">Cart Total</h3>
	          			<p class="d-flex" style="color:black; font-weight:bold;">
		    						<span>Subtotal</span>
									
		    						<td>RM<?php echo number_format($total,2); ?></td>
		    					</p>
		    					<p class="d-flex" style="color:black; font-weight:bold;">
		    						<span>Delivery</span>
		    						<span>RM5.00</span>
		    					</p>
		    					<p class="d-flex" style="color:red; font-weight:bold;">
		    						<span>Discount</span>
		    						<span>RM3.00</span>
		    					</p>
		    					<hr>
		    					<p class="d-flex total-price" style="color:black; font-weight:bold;">
		    						<span>Total</span>
									
									<td>RM<?php echo number_format($subtotal,2); ?></td>
		    					</p>
								</div>
	          	</div>
	          	</div>
	          </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->
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
<script src="index/js/jquery.animateNumber.min.js"></script>
<script src="index/js/bootstrap-datepicker.js"></script>
<script src="index/js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="index/js/google-map.js"></script>
<script src="index/js/main.js"></script>
  <script>
function myFunction(x)
{
    if(x==0)
    {
		document.getElementById("cardbutton").style.display='block';
		document.getElementById("cashbutton").style.display='none';
        document.getElementById("card-payment").style.display='block';

    }
    else if(x==1)
    {
       document.getElementById("cardbutton").style.display='none';
		document.getElementById("cashbutton").style.display='block';
        document.getElementById("card-payment").style.display='none';
    }

}
</script>







  <script>
var iprice = document.getElementsByClassName('iprice');
var iquantity = document.getElementsByClassName('iquantity');
var itotal = document.getElementsByClassName('itotal');
var gtotal1 = document.getElementById('gtotal');
var gtotal = document.getElementById('grandtotal');
var ftotal = document.getElementById('igrandtotal');
var discount =3;
var delivery=5;
var amount;
function subTotal()
{
  gt=0;
  
    for(i=0;i<iprice.length;i++)
    {
        ft=0;
      itotal[i].innerText=((iprice[i].value)*(iquantity[i].value)).toFixed(2);
      
      gt = gt+(iprice[i].value)*(iquantity[i].value);
      
      
        if(gt<5)
        {
            ft=gt+delivery;
        }
        else
        {
            ft=gt+delivery-discount;
        }
       
    }
    gtotal.innerText=gt.toFixed(2);
    gtotal1.innerText=gt.toFixed(2);
    ftotal.innerText=ft.toFixed(2);
}
subTotal();

  </script>
  </body>
</html>