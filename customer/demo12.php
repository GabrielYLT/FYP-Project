<!DOCTYPE HTML>
<head>
<title>Add Product</title>
</head>
<body>
<?php
include("dataconnection.php");
$msg="";
if(isset($_POST["savebtn"]))
	$productname = $_POST["pname"];
	$productprice = $_POST["price"];
	$productstock = $_POST["pstock"];
	$productDesc = $_POST["pdesc"];
	$productimage = $_FILES['image']['name'];

	$sql=mysqli_query($connect,"INSERT INTO product(Product_Name,Product_Image,Product_Price,Product_Stock,Product_Description) 
	VALUES('$productname','$productimage','$productprice','$productstock','$productDesc')");

	$target = "images/".basename($_FILES['image']['name']);
	if(move_uploaded_file($_FILES['image']['tmp_name'],$target))
	{
		$msg = "upload successfully";
	}
	else
	{
		$msg = "problem occur";
	}
	

?>
<div id="right">

		<h1>Insert Product</h1>

		<form name="addfrm" method="post" enctype="multipart/form-data" >

			<p><label>Product_Name: </label><input type="text" name="pname" id="pname"></p>
		 
			<p><label>Product_Image: </label><input type="file" name="image" id="image">
			
			<p><label>Product_Price: </label><input type="number" min="0.00" max="10000.00" step="0.01" name="price">

			<p><label>Product_Stock: </label><input type="text" name="pstock">
			
			<p><label>Product_Description: </label><textarea cols="60" rows="4" name="pdesc"></textarea>

			<p><input type="submit" name="savebtn" value="Save product">
		</form>
	
	</div>
	
</div>
</body>
</html>