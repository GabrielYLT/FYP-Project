
<?php
 include("connection.php");
if(isset($_POST["sbtn"]))
{
 $Admin_Name = $_POST["name"];
 $Admin_Email = $_POST["email"];
 $Admin_Password = $_POST["password"];
 $Admin_CPassword = $_POST["password2"];
 $Admin_PhoneNo = $_POST["phone"];

 mysqli_query($connect,"INSERT INTO admin (Admin_Name,Admin_Email,Admin_Password,Admin_CPassword,Admin_PhoneNo)VALUES('$Admin_Name','$Admin_Email','$Admin_Password','$Admin_CPassword','$Admin_PhoneNo')");

}
?>
<script type="text/javascript">
	alert("Update Successfully!");
	</script>
<?php
?>

