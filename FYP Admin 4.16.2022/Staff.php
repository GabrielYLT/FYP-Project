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
	if(($_SESSION['id'])=='86'){
	$aID=$_GET['id'];
	if(($_GET['id'])!=($_SESSION['id'])){
	mysqli_query($connect,"UPDATE addadmin SET admin_isDelete=1 WHERE Admin_ID='$aID'");
	
	header("location:Staff.php");
	}else{
		?>
	<script>
    alert("This Account Cannot Be Deleted");
    </script>
    <?php
	 header("refresh:0.001;url=Staff.php");
		
	}
	}else{
		?>
	<script>
    alert("You are not the Super Admin !!!");
    </script>
    <?php
	 header("refresh:0.001;url=Staff.php");
	}
}

mysqli_close($connect);

?>

<script type="text/javascript">

//create a javascript function named confirmation()
function confirmation()
{
	var option;
	option=confirm("Do you want to delete this admin?");
	
	return option;
}
</script>

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
    <title>View Staffs Account | JJG Fruits &amp Vege</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
	
	<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
	
	
	
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
</head>

<body id="Staff" class="bg03">
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
            <div class="row tm-content-row tm-mt-big" style="font-family: 'Lato', sans-serif;">
                <div class="col-xl-20 col-lg-12 tm-md-12 tm-sm-12 tm-col">
                    <div class="bg-white tm-block h-100">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
								<h2 class="tm-block-title d-inline-block">Staffs</h2>

                            </div>
                            <div class="col-md-4 col-sm-12 text-right">
                                <a href="accounts.php" class="btn btn-small btn-primary">Add New Staff</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped tm-table-striped-even mt-3">
                                <thead>
                                    <tr class="tm-bg-gray">
                                        <th scope="col">Staff Name</th>
                                        <th scope="col" >Staff's Email</th>
                                        <th scope="col" >Contact Number</th>
                                        <th scope="col">Gender</th>
										<th scope="col">&nbsp;</th>	
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php
									$conn = mysqli_connect("localhost", "root", "", "vege");

									if ($conn->connect_error) {
									die("Connection failed: " . $conn->connect_error);
									}
									$sql = "SELECT Admin_ID, Admin_Name, Admin_Email, Admin_PhoneNo, Admin_Image, Admin_Gender FROM addadmin WHERE admin_isDelete=0";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {

									while($row = $result->fetch_assoc()) {
									echo "<td>" . $row["Admin_Name"] . "</td>" ;
									echo "<td>" . $row["Admin_Email"]. "</td>" ; 
									echo "<td>" . $row["Admin_PhoneNo"].  "</td>" ; 
									echo "<td>" .  $row["Admin_Gender"]. "</td>" ;
                                    ?>
                                    <td>
									<div class='btn-group'> 
									<a href="Edit.php?edit&id=<?php echo $row['Admin_ID'];?>" class="btn btn-secondary">Edit</a>
									<a href="Staff.php?del&id=<?php echo $row['Admin_ID'];?>" class="btn btn-danger" onclick="return confirmation()" >Delete</a></td>
									</div>
                                    <?php
									echo "</tr>" ;
									}
									echo "</table>";
									} else { echo "0 results"; }
									?>    
                                </tbody>
                            </table>
                        </div>
            </div>
        </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    
</body>

</html>

