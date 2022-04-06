
<?php
include("dataconnection.php");
session_start();
error_reporting(0);
if(!isset($_SESSION['id']))
{
?>
<?php
}
$customer_id=$_SESSION['id'];
$result=mysqli_query($connect,"SELECT *FROM customer WHERE ID='$customer_id'");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Product Page</title>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="index/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="index/css/jquery.timepicker.css">
    
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
						    <span class="text">
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
	      <a class="navbar-brand" href="main.php">JJG Fruit & Vege</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
          <?php
                if(!isset($_SESSION['id']))
                {
            ?>  
                <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
                <li class="nav-item"><a href="signup.php" class="nav-link">Register</a></li>
                <?php
                }
                else 
                {
					
                    echo"";
					
                }
                ?>
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
              <?php
                if(isset($_SESSION['id']))
                {
            	?>  
				<a class="dropdown-item" href="logout.php">Logout</a>
                <?php
                }
                else 
                {
					echo "";
                }
                ?>
               
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
          	<p class="breadcrumbs"><span class="mr-2"><a href="main.php">Home</a></span> <span class="mr-2"></span> <span><a href="product.php">Product Page</a></span></p>
            <h1 class="mb-0 bread">Product Page</h1>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
    <?php
    $query = "SELECT * FROM product ORDER BY Product_ID ASC";
    $result = mysqli_query($connect,$query);
    
    if(mysqli_num_rows($result)>0)
    {
      while($row = mysqli_fetch_assoc($result))
        {
    ?>
            <div class="col-md-3  mt-2">
                <div class="card" style="height:400px; margin-top:50px;">
                     <a href="singleproduct.php?buy&id=<?php echo $row['Product_ID']?>">
                        <img class="card-img-top" src="images/<?php echo $row["Product_Image"];?>" alt="<?php echo $row['Product_Name'] ?>" style="width:200px; height:150px; padding-left:30px;">
                    </a>
                    <div class="card-body" style="margin:20px;">
                        <h4 class="card-title">
                            <a href="single-product.php?id=<?php echo $row['id'] ?>">
                                <?php echo $row['Product_Name']; ?>
                            </a>
                        </h4>
                        <strong><h5>RM <?php echo $row['Product_Price']?></h5></strong>
 
                        <p class="card-t">
                            <?php echo substr($row['Product_Description'],0,50) ?>'...
                        </p>
                        <p class="card-text">
                            <a href="singleproduct.php?buy&id=<?php echo $row['Product_ID']?>" class="btn btn-primary btn-sm">
                                BUY NOW
                            </a>
                            <a href="singleproduct.php?id=<?php echo $row['Product_ID']?>" class="btn btn-primary btn-sm">
                                GET MORE INFO
                            </a>
                        </p>
                    </div>
                </div>
        </div>
        <?php 
        }
      }
        ?>
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
  <script src="index/jsjquery.animateNumber.min.js"></script>
  <script src="index/js/bootstrap-datepicker.js"></script>
  <script src="index/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="index/js/google-map.js"></script>
  <script src="index/js/main.js"></script>
 
  </body>
</html>

<form id="cardpayment" name="cardpayment" class="billing-form" style="display:none" method="POST">
		<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <input type="radio" name="pay" class="mr-2" onchange="myFunction(1)" value="Cash On Delivery">Cash Payment
											</div>
										</div>
									</div>					
				<h3 class="mb-4 billing-heading">Delivery Details</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-12">
	                <div class="form-group">
	                	<label for="firstname">Name</label>
	                  <input type="text" name="fname" class="form-control" value="<?php echo "".$row["Username"]?>" required>
                      <span id="errorname" style="color:red"></span>
	                </div>
	              </div>
	              
                <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
		            		<label for="country">State</label>
		            		<div class="select-wrap">
		                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
		                  <select name="state" id="state" class="form-control" value="<?php echo $row["User_State"]?>"required>
						  		<option value=""><?php echo $row["User_State"]?></option>
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
	                  <input type="text" class="form-control" name ="add" value="<?php echo $row["User_Address"];?>" required>
                      <span id="erroradd" style="color:red"></span>
	                </div>
		            </div>
		            <div class="col-md-12">
		            	<div class="form-group">
		            		<label for="postcodezip">Postcode / ZIP *</label>
	                  <input type="text" class="form-control" name="zip" value="<?php echo  $row["User_Poscode"];?>">
					  <span id="errorzip" style="color:red"></span>
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
	                <div class="form-group">
	                	<label for="phone">Phone</label>
	                  <input type="tel" class="form-control" name="phone" value="<?php echo $row["PhoneNumber"];?>" required>
					<span id="errorphone" style="color:red"></span>
					</div>
	              </div> 
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="emailaddress">Email Address</label>
	                  <input type="email" class="form-control" name="email" value="<?php echo $row["Email"];?>" required>
					  <span id="erroremail" style="color:red"></span>
	                </div>
                </div>
                <div class="w-100"></div>
                <div class="col-md-12">
                	<div class="form-group mt-4">
					<h2>Payment Details</h2>
						<h4>Accepted Cards</h4>
						<div class="col-md-12">
							<label for="cnumber">Card Number</label>
							<input type="text" class="form-control" name="card_num" id="card_num" placeholder="0000-0000-0000-0000" required>
							<span id="errorcard" style="color:red"></span>
						</div>
						<div class="col-md-12">
							<label for="ccvv">CVV</label>
							<input type="text" class="form-control" name="card_cvv" id="card_cvv" placeholder="000" required>
							<span id="errorcvv" style="color:red"></span>
						</div>
						<div class="col-md-6">
							<label for="cmonth">Expiry Date</label>
							<select class="col-md-12 form-control" name="card_month" id="month" required>
								<option selected>Select Month</option>
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
							<span id="errormonth" style="color:red"></span>
						</div>
						<div class="col-md-6">
	                		<div class="form-group">
	                		<label for="cyears">Years</label>
							<select class="col-md-12 form-control" name="card_years" id="years" required>
							<option selected>Select Year</option>
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
							<span id="erroryears" style="color:red"></span>
	                		</div>
                		</div>
						<input type="submit" value="Place to Order" style="display:none" id="cardbutton" name="cardbutton" class="btn btn-primary py-3 px-4" onchange="myFunction(0)"onclick="validate(),cardValidate(),validateT();">
					</div>
                </div>
	            </div>
		</form><!-- END -->