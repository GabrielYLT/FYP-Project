<?php
 include("connection.php");
if(isset($_POST["image"]))
{
 $Admin_Image = $_POST["image"];

 mysqli_query($connect,"INSERT INTO admin (Admin_Image)VALUES('Admin_Image')");

}
?>
<script type="text/javascript">
	alert("Update Successfully!");
	</script>
<?php
?>

