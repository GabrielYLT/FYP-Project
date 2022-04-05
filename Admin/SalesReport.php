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
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sales Report | JJG Fruits &amp Vege </title>
    
	
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
	
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
		
	<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
	
	<link rel="stylesheet" href="css/Sales_Report.css">
	
<style>
body {
	  
  background-image: url('img/colorfulfruitsandvegetables-ddf6c1ae7ad74d72866f5f64fe3118aa.jpg');
}

</style>	
</head>

<body class="bg03">
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
		<br>
		<br>
			
		<div class="salesreport">	
		
		

		<div style="background-color:white; border-radius:30px; padding:50px; width:1425px;">
		<div style="margin:auto; ">
		<form method="get">
		<h3 style="margin-left:33%;">Sales Report of JJG Fruits &amp Vege</h3>
		<hr> 
		<h5 style="margin-left:39%;margin-top:auto;">Year :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Month :</h5>
		
		<h6 style="margin-left:43%;margin-top:-3%;"class="text-white text-capitalize ps-3"><input style="width:8%;height:30px;margin-left:10px;" type="text" name="searchname" placeholder="2022" ></h6>
		<h6 style="margin-left:55%;margin-top:-3%;"class="text-white text-capitalize ps-3"><select name="Month" style="width:9%;height:30px;margin:3px auto;" required>
																									<option value="1">Jan</option>
																									<option value="2">Feb</option>
																									<option value="3">Mar</option>
																									<option value="4">Apr</option>
																									<option value="5">May</option>
																									<option value="6">Jun</option>
																									<option value="7">July</option>
																									<option value="8">Aug</option>
																									<option value="9">Sept</option>
																									<option value="10">Oct</option>
																									<option value="11">Nov</option>
																									<option value="12">Feb</option>
																								  </select>	</h6>
		<input style="height:50px;width:20%;margin-left:39%;" class="btn btn-secondary" type="submit" value="Search" name="searchbtn">
		<?php
				
		if(isset($_GET["searchbtn"]))
			{
				  
			$getmMonth=$_GET["Month"];
					
			$inputyear=$_GET["searchname"];
				  
			$subtotal=0;
			
			$result=mysqli_query($connect,"SELECT customer_order.Order_ID,customer_order.customer_id,customer.Username,customer_order.product_id,product.Product_Name,
											customer_order.payment_id,customer_order.payment_price,customer_order.order_date FROM((customer_order INNER JOIN customer ON customer_order.customer_id = customer.ID)
											INNER JOIN product ON customer_order.product_id = product.Product_ID)WHERE MONTH(order_date)='$getmMonth' AND YEAR(order_date)='$inputyear'");
			while($row=mysqli_fetch_assoc($result))
			{
						
				$subtotal+= $row["payment_price"];
						
			}
			$_SESSION['subtotal']=$subtotal;	
			}		
		?>
		
		<hr>
		</form>

		<div class="table-responsive">
		<table class="table">
		<thead>
		<tr>
			<th  scope="col">Customer Name </th>
			<th  scope="col">Product Name </th>
			<th scope="col">Payment ID</th>
			<th  scope="col">Date Ordered </th>
			<th  scope="col">Price</th> 
		</tr>
		</thead>
		<tbody>
                                	<?php
									$conn = mysqli_connect("localhost", "root", "", "vege");

									if ($conn->connect_error) {
									die("Connection failed: " . $conn->connect_error);
									}
									$sql = "SELECT customer_order.Order_ID,customer_order.customer_id,customer.Username,customer_order.product_id,product.Product_Name,
											customer_order.payment_id,customer_order.payment_price,customer_order.order_date FROM((customer_order INNER JOIN customer ON customer_order.customer_id = customer.ID)
											INNER JOIN product ON customer_order.product_id = product.Product_ID)WHERE MONTH(order_date)='$getmMonth' AND YEAR(order_date)='$inputyear'";
									$result = $conn->query($sql);

									if ($result->num_rows > 0) {
									$monthName= date("F",mktime(0,0,0,$getmMonth,10));
									echo "<h5 style='font-weight:bold;'>" .$monthName  . "&nbsp;"	. $inputyear . " Sales Report</h5>";
									$subtotal=0;
									while($row = $result->fetch_assoc()) {
									$subtotal+= $row["payment_price"];
									echo "<td>" . $row["Username"] . "</td>" ;
									echo "<td>" . $row["Product_Name"]. "</td>" ; 
									echo "<td>" . $row["payment_id"].  "</td>" ; 
									echo "<td>" .  $row["order_date"]. "</td>" ;
									echo "<td> RM" .  $row["payment_price"]. "</td>" ;
									$_SESSION['subtotal']=$subtotal;
                                    ?>
                                    <?php
									echo "</tr>" ;
									} $subtotal = $_SESSION['subtotal'];
									} else {
										
										
										echo "Please Enter / Select a Proper Date"; 
										$sql = "SELECT customer_order.Order_ID,customer_order.customer_id,customer.Username,customer_order.product_id,product.Product_Name,
											customer_order.payment_id,customer_order.payment_price,customer_order.order_date FROM((customer_order INNER JOIN customer ON customer_order.customer_id = customer.ID)
											INNER JOIN product ON customer_order.product_id = product.Product_ID)";
										$result = $conn->query($sql);
									if ($result->num_rows > 0) {										
									$subtotal=0;
									while($row = $result->fetch_assoc()) {
									$subtotal+= $row["payment_price"];
									echo "<td>" . $row["Username"] . "</td>" ;
									echo "<td>" . $row["Product_Name"]. "</td>" ; 
									echo "<td>" . $row["payment_id"].  "</td>" ; 
									echo "<td>" .  $row["order_date"]. "</td>" ;
									echo "<td> RM " .  $row["payment_price"]. "</td>" ;
									$_SESSION['subtotal']=$subtotal;
									?>
									<?php
									echo "</tr>" ;
									}
									}
									}
									?>  
									
                                </tbody>
								</table>
								<?php 
									echo "<h5 style='margin-left:81%;margin-top:auto;color:gray;'> Total :&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RM   $subtotal </h5>" 
									?>
		</div>
		</div>
		<br>
		<br>
		<button id="print_btn" style="margin-left:80%;width:15%;"><a class="text-secondary text-capitalize ps-3" style="width:20%;"href="SalesReport.php">View All</button>
		<button id="print_btn" style="margin-left:2%;width:15%;"><a class="text-secondary text-capitalize ps-3" style="width:20%;"href="exportMonthlyReport.php?print&getmonth=<?php echo $getmMonth;?>&getyear=<?php echo $inputyear;?>&subtotal=<?php echo $subtotal;?>">Download Sales Report</button>
		
		</div>
		</div>
		
		<br>
		<br>



    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
</body>

</html>