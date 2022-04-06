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
<style>
body {
	  
  background-image: url('img/colorfulfruitsandvegetables-ddf6c1ae7ad74d72866f5f64fe3118aa.jpg');
}
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard | JJG Fruits &amp Vege </title>


	
	
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/fullcalendar.min.css">
    <!-- https://fullcalendar.io/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
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
            <div class="row tm-content-row tm-mt-big">
                <div class="col-xl-4 col-md-6 mb-4">
                            <div class=" card bg-success card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                                Nunber of Products</div>
                                            <div class="h5 mb-0 font-weight-bold text-white-50">
											<?php
											$conn = mysqli_connect("localhost", "root", "", "vege");
											$sql = "SELECT * FROM product";
											if ($result=mysqli_query($conn,$sql)) {
											$rowcount=mysqli_num_rows($result);
											echo $rowcount . "  Products"; 
											}
											?>
											</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-carrot fa-3x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <div class="col-xl-4 col-md-6 mb-4">
                            <div class=" card bg-primary card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                                Number of Order</div>
                                            <div class="h5 mb-0 font-weight-bold text-white-50">
											<?php
											$conn = mysqli_connect("localhost", "root", "", "vege");
											$sql = "SELECT * FROM customer_order";
											if ($result=mysqli_query($conn,$sql)) {
											$rowcount=mysqli_num_rows($result);
											echo $rowcount . "  Orders"; 
											}
											?>
											</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-receipt fa-3x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Earnings </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
											<?php
											$conn = mysqli_connect("localhost", "root", "", "vege");
											$subtotal=0;
											$sql = "SELECT * FROM customer_order";
											if ($result=mysqli_query($conn,$sql)) {
											$rowcount=mysqli_num_rows($result);
											while($row=mysqli_fetch_assoc($result))
											{
												$subtotal+= $row["payment_price"];
											}
											echo "RM " . $subtotal 	; 
											}
											?>
											</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-money-check-alt fa-3x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                <div class="tm-col tm-col-big">
                    <div class="bg-white tm-block h-100">
                        <div class="row">
                            <div class="col-8">
                                <h2 class="tm-block-title d-inline-block">Available Products</h2>

                            </div>
                            <div class="col-4 text-right">
                                <a href="ViewProduct.php" class="tm-link-black">View All</a>
                            </div>
                        </div>
						<div style="width: 425px; height: 500px; overflow-y: scroll;">
									<?php
									$conn = mysqli_connect("localhost", "root", "", "vege");

									if ($conn->connect_error) {
									die("Connection failed: " . $conn->connect_error);
									}
									$sql = "SELECT Product_Name,Product_Stock FROM product WHERE product_isDelete=0 AND Product_Status='Available' AND Product_Stock > 0 ";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {

									while($row = $result->fetch_assoc()) {
									echo "<ul class='list-group'> <li class='list-group-item'><h5>";
									echo $row["Product_Name"] ."</h5><span class='badge badge-info' style='margin-left:95%;margin-top:auto;'>";
									echo $row["Product_Stock"]."</span>" ;" </li>" ;
									echo "</ul>" ;
									}
									} else { echo "0 results"; }
									?>									
						</div>
                    </div>
                </div>
                <div class="tm-col tm-col-big">
                    <div class="bg-white tm-block h-100">
                        <h2 class="tm-block-title">Calendar</h2>
                        <div id="calendar"></div>
                        <div class="row mt-4">
                            <div class="col-12 text-right">
                                <a href="#" class="tm-link-black"></a>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="tm-col tm-col-small" style="display:none;">
                    <div class="bg-white tm-block h-100">
                        <h2 class="tm-block-title">Performance</h2>
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
                <div class="tm-col tm-col-small"  style="display:none;">
                    <div class="bg-white tm-block h-100">
                        <canvas id="pieChart" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
                <div class="tm-col tm-col-small">	
                    <div class="bg-white tm-block h-100">
                        <h2 class="tm-block-title">Staff's Name</h2>
						<div class="col-8 text-right" style="margin-left:50%;">
                                <a href="Staff.php" class="tm-link-black">View All</a>
                            </div>
							<hr>
                        <div style="width: 200px; height: 500px; overflow-y: scroll;">
									<?php
									$conn = mysqli_connect("localhost", "root", "", "vege");

									if ($conn->connect_error) {
									die("Connection failed: " . $conn->connect_error);
									}
									$sql = "SELECT Admin_Name FROM addadmin WHERE admin_isDelete=0";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {

									while($row = $result->fetch_assoc()) {
									echo "<ul class='list-group'> <li class='list-group-item'><h6>";
									echo $row["Admin_Name"] ."</h6></li>";
									echo "</ul>" ;
									}
									} else { echo "0 results"; }
									?>									
						</div>
                    </div>
                </div>
            </div>
            <footer class="row tm-mt-small">
                
            </footer>
        </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/moment.min.js"></script>
    <!-- https://momentjs.com/ -->
    <script src="js/utils.js"></script>
    <script src="js/Chart.min.js"></script>
    <!-- http://www.chartjs.org/docs/latest/ -->
    <script src="js/fullcalendar.min.js"></script>
    <!-- https://fullcalendar.io/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<!--Get your own code at fontawesome.com-->
    <script src="js/tooplate-scripts.js"></script>
    <script>
        let ctxLine,
            ctxBar,
            ctxPie,
            optionsLine,
            optionsBar,
            optionsPie,
            configLine,
            configBar,
            configPie,
            lineChart;
        barChart, pieChart;
        // DOM is ready
        $(function () {
            updateChartOptions();
            drawLineChart(); // Line Chart
            drawBarChart(); // Bar Chart
            drawPieChart(); // Pie Chart
            drawCalendar(); // Calendar

            $(window).resize(function () {
                updateChartOptions();
                updateLineChart();
                updateBarChart();
                reloadPage();
            });
        })
    </script>
</body>
</html>