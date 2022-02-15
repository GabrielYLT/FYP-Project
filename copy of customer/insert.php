<?php
 include("dataconnection.php");
if(isset($_POST["sbtn"]))
{
 $name = $_POST["name"];
 $email = $_POST["useremail"];
 $pas = $_POST["userpassword"];
 $cpassword = $_POST["userrpassword"];
 
$sql=mysqli_query($connect,"INSERT INTO customer(Username,Email,User_Password,confirm_password)
VALUES('$name','$email','$pas','$cpassword')");
}
?>
<script type="text/javascript">
	alert("Register Successfully!");
	</script>


<?php
 header("refresh:0.1; url=login.php");
mysqli_close($connect);

?>