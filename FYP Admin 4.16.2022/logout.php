<?php
include("Connection.php");
session_start();

unset($_SESSION['id']);

session_destroy();
?>
		<script type="text/javascript">
		alert("Logout Successfully!");
		
		</script>
		
	<?php 
header("location:login.php");

?>