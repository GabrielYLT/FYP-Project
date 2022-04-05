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
	$product_id=$_GET['id'];
	$result1=mysqli_query($connect,"SELECT product.Admin_ID,
										  addadmin.Admin_Name
										  from(product INNER JOIN addadmin ON product.Admin_ID = addadmin.Admin_ID)WHERE Product_ID='$product_id'");	
										  $row1=mysqli_fetch_assoc($result1);
	$result=mysqli_query($connect,"SELECT * from product WHERE Product_ID='$product_id'");									  
	$row=mysqli_fetch_assoc($result);
	}
	?>
<?php

$msg ="";
$css_class = "";
if(isset($_POST["upload"]))
{
	echo "<pre>", print_r($_FILES['profileImage']['name']), "</pre>";	
    $product_image = time() . '_' . $_FILES['profileImage']['name'];
	
	mysqli_query($connect,"UPDATE product SET Product_Image = '$product_image'
                                               WHERE Product_ID = '$product_id'");	
	
	$target = 'images/' . $product_image;
        if(move_uploaded_file($_FILES['profileImage']['tmp_name'],$target))
        {
          $msg = "upload successfully";
		  $css_class = "alert-sucess";
        }
        else{
          $msg = "problem occur.";
		  $css_class = "alert-danger";
        }

        header("refresh:0.1");
}
?>
<?php
if(isset($_POST["sbtn"]))
{
	$productName = $_POST["name"];
    $productPrice = $_POST["price"];
    $productStock = $_POST["pstock"];
    $productStatus = $_POST["status"];
	$productDesc = $_POST["pdesc"];
	$dateAdded = $_POST["dateAdded"];
	
	
	mysqli_query($connect,"UPDATE product SET Product_Name ='$productName',
                                               Product_Price='$productPrice',
                                               Product_Stock = '$productStock',
                                               Product_Status = '$productStatus',
											   Product_Description = '$productDesc',
											   dateAdded = '$dateAdded'
                                               WHERE Product_ID = '$product_id'");
		?>
		<script type="text/javascript">
		alert("Update Successfully!");
		
		</script>
		
		<?php 
	header("refresh:0.1");

}
mysqli_close($connect);
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
    <title>View Product Detaisl Page | JJG Fruits &amp Vege </title>
   

	
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
                            <h1 class="tm-block-title">Product Details </h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <form name = "updatAdmin" method="post" class="tm-signup-form" enctype="multipart/form-data" >
								<div class="form-group">
									<label for="Image">Product Image</label>
									<div class="d-flex flex-column align-items-center text-center p-3 py-5">
									<img class="rounded-circle" width="320px" img src="images/<?php echo $row['Product_Image'] ?>"/>
									</div>
									<div class="custom-file">
									<input type="file" name="profileImage" id="fileInput" style="display:none" id="profileImage" >
									<input class="btn btn-default d-block mx-xl-auto" type="button" name="profileImage" value="Upload Image" onclick="document.getElementById('fileInput').click();" />
									<button class="btn btn-info d-block mx-xl-auto" type="submit" name="upload" style="margin-top:10px">Save Profile Image</button>
									<br>
									</div>
								</div>
                                <div class="form-group">
                                    <label for="name">Product Name</label>
                                    <input value="<?php echo $row['Product_Name']?>" placeholder="Enter Your Username Here" name="name" type="text" class="form-control" required >
									 
									<span id="errorname"></span>
                                </div>
                                <div class="form-group">
                                    <label for="email">Product Price RM:</label>
                                    <input value="<?php echo $row['Product_Price']?>" type="number" min="0.00" max="10000.00" step="0.01" name="price" class="form-control validate" required>
									<span id="erroremail"></span>	
                                </div>	
                                <div class="form-group">
                                    <label for="phone">Product Stock  &nbsp;	</label>
                                    <input value="<?php echo $row['Product_Stock']?>" type="text" name="pstock"  size="10" class="form-control validate" required>
                                </div>
								<div class="select">
									<label for="status">Product Status &nbsp; </label>
									<select class="form-control selectList" style="width:100%;Height:50%;" name="status" id="status" required>
									<option value="<?php echo $row['Product_Status']?>"><?php echo $row['Product_Status']?></option>
									<optgroup label="Status">
									<option value="Available" class="text-success">Available</option>
									<option value="Out of Stock"  class="text-danger">Out of Stock</option>
									</select>
                                </div>
								<div class="form-group">
                                    <label for="phone">Product Description</label>
                                    <textarea value="<?php echo $row['Product_Description']?>" id="pdesc" name="pdesc" cols="60" rows="4" name="pdesc" class="form-control validate"  required><?php echo $row['Product_Description']?></textarea>
                                </div>	
								<div class="form-group">
                                    <label for="Added by">Added By :   &nbsp;	</label>
                                    <input value="<?php echo $row1['Admin_Name']?>" type="text" name="AdminName" class="form-control validate" readonly>
                                </div>
								<div class="select">
								<label  for="dateAdded">Date Added :</label>
								<input value="<?php echo $row['dateAdded']?>" type="date" name="dateAdded" id="dateAdded" class="form-control validate" required>
								</div>
								<hr>
                                </div>
								</div>
								<div class="row">
                                    <div class="col-12 col-sm-6">
                                        <button type="submit" name="sbtn" class="btn btn-secondary" value="submit" onclick="">Update Product 
                                        </button>
										<a href="ViewProduct.php" class="btn btn-danger" style="height:50px;margin-left:165%;margin-top:-35%;">Return</a>
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


