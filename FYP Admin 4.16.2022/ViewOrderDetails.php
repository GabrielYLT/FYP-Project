<?php
include("Connection.php");
session_start();
error_reporting(0);
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

if(isset($_GET["details"]))
{
	$order_id=$_GET['id'];
	$result1=mysqli_query($connect,"SELECT customer_order.Order_ID,customer_order.customer_id,customer.Username,customer_order.product_id,product.Product_Name,product.Product_Image,customer_order.quantity,customer_order.order_date,customer_order.payment_id,
													payment.payment_name,payment.payment_state,payment.payment_address,payment.payment_postcode,payment.payment_phone,payment.payment_email,payment.payment_method,customer_order.payment_price,customer_order.Order_Status,customer_order.Payment_Status FROM(((customer_order INNER JOIN customer ON customer_order.customer_id = customer.ID)
													INNER JOIN product ON customer_order.product_id = product.Product_ID)INNER JOIN payment ON customer_order.payment_id = payment.payment_id)");	
										  $row1=mysqli_fetch_assoc($result1);
	$result=mysqli_query($connect,"SELECT * from customer_order WHERE Order_ID='$order_id'");									  
	$row=mysqli_fetch_assoc($result);
}
?>
<?php

if(isset($_POST["sbtn"]))
{	
	if($_POST["methd"]=='Cash On Delivery')
	{
		$status = $_POST["status"];
		if($_POST["status"]=='Delivered'|| $_POST["status"]=='Received')
		{
			mysqli_query($connect,"UPDATE customer_order SET Payment_Status ='Paid',
                                               Order_Status='$status'
                                               WHERE Order_ID= '$order_id'");
		?>
		<script type="text/javascript">
		alert("Updated Successfully!");
			
		</script>	
		
		<?php  
		header("refresh:0.1");
		}else
		{
		mysqli_query($connect,"UPDATE customer_order SET Payment_Status ='Unpaid',
                                               Order_Status='$status'
                                               WHERE Order_ID= '$order_id'");
		?>
		<script type="text/javascript">
		alert("Added Successfully!");
		
		</script>	
		
		<?php  
		header("refresh:0.1");
		}
	}else{
		$status = $_POST["status"];
		mysqli_query($connect,"UPDATE customer_order SET Payment_Status ='Paid',
                                               Order_Status='$status'
                                               WHERE Order_ID= '$order_id'");
		?>
		<script type="text/javascript">
		alert("Added Successfully!");
			
		</script>	
		
		<?php  
		header("refresh:0.1");
	}

}

?>


	
<!DOCTYPE html>
<html lang="en">
<style>
select.selectList { width: 150px; }
</style>
<script>
</script>
<head>
    <meta charset="UTF-8">	
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Order Page | JJG Fruits &amp Vege e</title>
   

	
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
                            <h1 class="tm-block-title">Order Details </h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <form name = "updatAdmin" method="post" class="tm-signup-form" enctype="multipart/form-data" >
                                <div class="form-group">
                                    <label for="name">Order ID</label>
                                    <input value="#<?php echo $row['Order_ID']?>"  type="text" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="email">Customer Name </label>
                                    <input value="<?php echo $row1['Username']?>"  type="text" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Product Name  &nbsp;	</label>
                                    <input value="<?php echo $row1['Product_Name']?>"  type="text" class="form-control" readonly>
                                </div>
								<div class="form-group">
									<label for="Image">Product Image</label>
									<div class="d-flex flex-column align-items-center text-center p-3 py-5">
									<img class="rounded-circle" width="270px" img src="images/<?php echo $row1['Product_Image'] ?>"/>
									</div>
								</div>
								<div class="form-group">
                                    <label for="phone">Quantity &nbsp;	</label>
                                    <input value="<?php echo $row['quantity']?>"  type="text" class="form-control" readonly>
                                </div>
								<div class="form-group">
								<div class="select">Order Confirmed On : </label>
								<input value="<?php echo $row['order_date']?>" type="date"  id="dateAdded" class="form-control validate" readonly>
								</div>
								</div>
								<div class="form-group">
                                    <label for="phone">Payment By： &nbsp;	</label>
                                    <input value="<?php echo $row1['payment_name']?>"  type="text" class="form-control" readonly>
                                </div>
								<div class="form-group">
                                    <label for="phone">State  &nbsp;	</label>
                                    <input value="<?php echo $row1['payment_state']?>"  type="text" class="form-control" readonly>
                                </div>
								<div class="form-group">
                                    <label for="phone">Address &nbsp;	</label>
                                    <input value="<?php echo $row1['payment_address']?>"  type="text" class="form-control" readonly>
                                </div>
								<div class="form-group">
                                    <label for="phone">Postcode &nbsp;	</label>
                                    <input value="<?php echo $row1['payment_postcode']?>"  type="text" class="form-control" readonly>
                                </div>
								<div class="form-group">Phone Number  &nbsp;	</label>
                                    <input value="<?php echo $row1['payment_phone']?>"  type="text" class="form-control" readonly>
                                </div>
								<div class="form-group">
                                    <label for="phone">Email  &nbsp;	</label>
                                    <input value="<?php echo $row1['payment_email']?>"  type="text" class="form-control" readonly>
                                </div>
								<div class="form-group">
                                    <label for="phone">Payment Method  &nbsp;	</label>
                                    <input value="<?php echo $row1['payment_method']?>" name="methd" id="methd" type="text" class="form-control" readonly>
                                </div>
								<div class="form-group">Total Price  &nbsp;	</label>
                                    <input value="RM<?php echo $row['payment_price']?>"  type="text" class="form-control" readonly>
                                </div>
								<div class="form-group">
                                    <label for="phone">Payment Status  &nbsp;	</label>
                                    <input value="<?php echo $row['Payment_Status']?>" id="methd" type="text" class="form-control" readonly>
                                </div>
								<hr>
								<div class="select">Delivery Status &nbsp; </label>
									<select class="form-control selectList" style="width:100%;Height:50%;" name="status" id="status" required>
									<option value="<?php echo $row['Order_Status']?>"><?php echo $row['Order_Status']?></option>
									<optgroup label="Status">
									<option value="Pending" class="text-secondary">Pending</option>
									<option value="Preparing" class="text-info">Preparing</option>
									<option value="Packing"  class="text-info">Packing</option>
									<option value="Ready to Deliver" class="text-primary">Ready to Deliver</option>
									<option value="Delivery in Progress" class="text-primary">Delivery in Progress</option>
									<option value="Delivered" class="text-success">Delivered</option>
									<option value="Received" class="text-success">Received</option>
									<option value="Not Delivered" class="text-danger">Not Delivered</option>
									</select>
                                </div>
								<hr>
								<div class="row">
                                    <div class="col-12 col-sm-6">
                                        <button type="submit" name="sbtn" class="btn btn-secondary" value="submit" onclick="">Update Product 
                                        </button>
										<a href="ViewOrder.php" class="btn btn-danger" style="height:50px;margin-left:165%;margin-top:-35%;">Return</a>
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


