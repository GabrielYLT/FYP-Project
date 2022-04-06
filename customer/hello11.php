<?php
 include("dataconnection.php");
if(isset($_POST["sbtn"]))
{
 $name = $_POST["name"];
 $email = $_POST["useremail"];
 $pas = $_POST["userpassword"];
 $cpassword = $_POST["userrpassword"];
 $select = "SELECT * FROM customer WHERE Email = '$email'";
 $selectrow=mysqli_query($connect,$select);
 

    if(mysqli_num_rows($selectrow)>0)
    {
        $email_error = "Sorry... Email already Taken";
    }
    else
    {
        $sql=mysqli_query($connect,"INSERT INTO customer(Username,Email,User_Password,confirm_password)
        VALUES('$name','$email','$pas','$cpassword')");
        echo 'Saved!';
        header("refresh:0.1; url=login.php");
        mysqli_close($connect);
	}
}
?>
