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

<?php
if (isset($_GET["del"])) 
{
	if(($_SESSION['id'])==='86'){
	$pID=$_GET['id'];
	mysqli_query($connect,"UPDATE product SET product_isDelete=1 WHERE Product_ID='$pID'");
	header("location:ViewProduct.php");
	}else{
	?>
	<script>
    alert("You are not the Super Admin !!!");
    </script>
    <?php
	 header("refresh:0.001;url=ViewProduct.php");
}
}

mysqli_close($connect);

?>
<script type="text/javascript">

//create a javascript function named confirmation()
function confirmation()
{
	var option;
	option=confirm("Do you want to delete this product?");
	
	return option;
}
</script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Product |JJG Fruits &amp Vege </title>
    
	
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
	
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
	
	<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
	

    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
	
	<link rel="stylesheet" href="css/Product.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<script>
function del()
{
	alert("Successfully delete !");
}
</script>

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
<div class="product">	
	<br>
	<br>
<form>	
<div style="background-color:white; border-radius:30px; padding:50px; width:1425px;">
<div style="margin:auto; ">
<div style="width: 1325px; height: 700px;overflow-x:scroll;overflow-y:scroll;">
<table class="table" style="width:150%">	
<h3>View Product List </h3> 

<div class="col-md-4 col-sm-12 text-right" style="margin-left:65%;margin-top:-2%;">
                                <a href="AddProduct.php" class="btn btn-small btn-primary">Add New Product</a>
                            </div>
							<hr>

<h6 style="margin-left:auto%;margin-top:auto%;"class="text-white text-capitalize ps-3"><input style="width:15%;height:35px;margin-left:auto%;" id="myInput" type="text" name="searchname" placeholder="Search Product Name" ></h6>
<hr>
<br>
<thead>
<tr class="tm-bg-gray">
	<th scope="col" style="width:8%">Product Name </th>
	<th scope="col">Product Image</th>
	<th scope="col" style="width:8%">Product Price </th>
	<th scope="col" style="width:8%">Product Stock</th>
	<th scope="col" style="width:8%">Product Status</th>
	<th scope="col">Product Description </th>
	<th scope="col">Added By </th>
	<th scope="col" style="width:8%">Date Added </th>
	<th scope="col">&nbsp;</th>
	<th scope="col">&nbsp;</th>
</tr>
</thead>
<tbody id="myTable">
                                	<?php
									$conn = mysqli_connect("localhost", "root", "", "vege");

									if ($conn->connect_error) {
									die("Connection failed: " . $conn->connect_error);
									}

									$sql = "SELECT product.Product_ID,product.Product_Name,product.Product_Image,product.Product_Price,product.Product_Stock,
												   product.Product_Status,product.Product_Description,product.Admin_ID,addadmin.Admin_Name,product.dateAdded 
												   FROM (product INNER JOIN addadmin ON product.Admin_ID = addadmin.Admin_ID) WHERE product_isDelete=0 ";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {
									echo "<td>" . $row["Product_Name"] . "</td>" ;
									echo "<td> <img width='125px' src='images/" . $row["Product_Image"]. "'></td>" ; 
									echo "<td>RM" . $row["Product_Price"].  "</td>" ; 
									echo "<td>" . $row["Product_Stock"]. "</td>" ;
									echo "<td>" . $row["Product_Status"]. "</td>" ;
									echo "<td>" . $row["Product_Description"]. "</td>" ;
									echo "<td>" . $row["Admin_Name"]. "</td>" ;	
									echo "<td>" . $row["dateAdded"]. "</td>" ;
									echo "<td>" . $row["Ratings"]. "</td>" ;
									
                                    ?>
                                    <td>
									<div class='btn-group'> 
									<a href="ViewDetails.php?details&id=<?php echo $row['Product_ID'];?>" class="btn btn-info">View Details</a>
									<a href="ViewProduct.php?del&id=<?php echo $row['Product_ID'];?>" class="btn btn-danger" onclick="return confirmation()" >Delete</a></td>
									</div>

                                    <?php
									echo "</tr>" ;
									}
									echo "</table>";
									}else { echo "0 results"; }
									?>  
									
                                </tbody>
</table>
</div>

</div>
</div>

<br>
<br>

</form>
</div>
		
		



    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
</body>

</html>