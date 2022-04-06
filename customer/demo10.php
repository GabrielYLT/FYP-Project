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
if(isset($_POST["add_to_cart"]))
{

    if(isset($_SESSION["shopping_cart"]))
    {

        $item_array_id = array_column($_SESSION["shopping_cart"],"item_id");
        if(!in_array($_GET["id"],$item_array_id))
        {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
              'item_id' => $_GET["id"],
              'item_image'=>$_POST["hidden_image"],
              'item_name' => $_POST["hidden_name"],
              'item_price' => $_POST["hidden_price"],
              'item_quantity' =>$_POST["quantity"]
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        }
        else 
        {
          echo '<script>alert("Item already added")</script>';
          //echo '<script>window.location="cart.php"</script>';
        }

    }
    else 
    {
        $item_array = array(
          'item_id' => $_GET["id"],
          'item_image'=>$_POST["hidden_image"],
          'item_name' => $_POST["hidden_name"],
          'item_price' => $_POST["hidden_price"],
          'item_quantity' =>$_POST["quantity"]
        );
        $_SESSION["shopping_cart"][0] = $item_array;
      


    }



}

if(isset($_GET["action"]))
{
  if($_GET["action"] == "delete")
  {
      foreach($_SESSION["shopping_cart"] as $keys => $values)
      {
        if($values["item_id"]==$_GET["id"])
        {
            unset($_SESSION["shopping_cart"][$keys]);
            echo'<script>alert("item removed")</script>';
            echo'<script>window.location="product.php"</script>';
        }
      }
  }

}
?>
<script>
 var validate = function(e) {
          var t = e.value;
          e.value = (t.indexOf(".") >= 0) ? (t.substr(0, t.indexOf(".")) + t.substr(t.indexOf("."), 3)) : t;
  }
  </script>
  </script>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Cart Page</title>
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
              </div>
            </li>
              <li class="nav-item active dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $row["Username"] ?></a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="profile.php">Profile</a>
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
          	<p class="breadcrumbs"><span class="mr-2"><a href="main.php">Home</a></span> <span>Cart</span></p>
            <h1 class="mb-0 bread">My Cart</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
                              <th>&nbsp;</th>
						        <th>Product name</th>
                    <th>&nbsp;</th>
						        <th>Quantity</th>
						        <th>Price</th>
                    <th>Total</th>
						        <th>Action</th>
                    <th>&nbsp;</th>
						      </tr>
						    </thead>
						    <tbody>
                           
    <br/>
        </tr>
        <?php
            if(!empty($_SESSION["shopping_cart"]))
            {
              $total=0;
              foreach($_SESSION["shopping_cart"] as $keys =>$values)
              {
                ?>
              <tr>
              <td><img src="images/<?php echo $values["item_image"];?>" width="50" height="40"/></td>
                  <td><?php echo $values["item_name"];?></td>
                  <td>&nbsp;</td>
                  <td><?php echo $values["item_quantity"];?></td>
                  <td>RM<?php echo $values["item_price"];?></td>
                  <td>RM<?php echo number_format($values["item_quantity"] * $values["item_price"],2);?></td>
                  <td><a href ="hello1.php?action=delete&id=<?php echo $values["item_id"];?>"><span class="text-danger">Remove</span></a></td>

              </tr>
                <?php
                  $total = $total +($values["item_quantity"]*$values["item_price"]);
                  if($total<3)
                  {
                      $subtotal = $total+5;
                  }
                  else
                  {
                      $subtotal = $total-3+5;
                  }
              }
              ?>
              <tr>
                <td colspan="5" style="align:right;">Total</td>
                <td>RM <?php echo number_format($total,2); ?></td>
                <td></td>
            </tr>
            <?php
            }
            ?>


						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    		<div class="row justify-content-end">
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Coupon Code</h3>
    					<p>Enter your coupon code if you have one</p>
  						<form action="#" class="info">
	              <div class="form-group">
	              	<label for="">Coupon code</label>
	                <input type="text" class="form-control text-left px-3" placeholder="">
	              </div>
	            </form>
    				</div>
    				<p><a href="checkout.html" class="btn btn-primary py-3 px-4">Apply Coupon</a></p>
    			</div>
    		
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Cart Totals</h3>
    					<p class="d-flex">
    						<span>Subtotal</span>
                            <td>RM<?php echo number_format($total,2); ?></td>
                        </p>
    					<p class="d-flex">
    						<span>Delivery</span>
    						<span>RM5.00</span>
    					</p>
    					<p class="d-flex">
    						<span>Discount</span>
    						<span>RM3.00</span>
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
                            <td>RM<?php echo number_format($subtotal,2); ?></td>
    					</p>
    				</div>
    				<form action="demo8.php" method="POST">
    				<button type="submit" name="checkout" class="btn btn-primary py-3 px-4" color='white'>Proceed to Checkout</button></p>
          </form>
    			</div>
    		</div>
			</div>
		</section>

		<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
      <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
          <div class="col-md-6">
          	<h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
          	<span>Get e-mail updates about our latest shops and special offers</span>
          </div>
          <div class="col-md-6 d-flex align-items-center">
            <form action="#" class="subscribe-form">
              <div class="form-group d-flex">
                <input type="text" class="form-control" placeholder="Enter email address">
                <input type="submit" value="Subscribe" class="submit px-3">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    
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
  <script src="indexjs/jquery.animateNumber.min.js"></script>
  <script src="index/js/bootstrap-datepicker.js"></script>
  <script src="index/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="index/js/google-map.js"></script>
  <script src="index/js/main.js"></script>
  <script>
var iprice = document.getElementsByClassName('iprice');
var iquantity = document.getElementsByClassName('iquantity');
var itotal = document.getElementsByClassName('itotal');
var gtotal1 = document.getElementById('gtotal');
var gtotal = document.getElementById('grandtotal');
var ftotal = document.getElementById('igrandtotal');
var discount =3;
var delivery =5;
var amount;
function subTotal()
{
  gt=0;
  
    for(i=0;i<iprice.length;i++)
    {
        ft=0;
      itotal[i].innerText=((iprice[i].value)*(iquantity[i].value)).toFixed(2);
      
      gt = gt+(iprice[i].value)*(iquantity[i].value);
      
      
        if(gt>5)
        {
            ft=gt-discount+delivery;
        }
        else
        {
            ft=gt+delivery;
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