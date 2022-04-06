<?php
include("dataconnection.php");


if(isset($_POST['id']))
{
	$customer_id=$_POST['ID'];
	$result=mysqli_query($connect,"SELECT * from customer WHERE ID='$customer_id'");

	$row=mysqli_fetch_assoc($result);


}
if(isset($_POST["savebtn"]))
{
    $uname = $_POST["username"];
    $uemail = $_POST["useremail"];
    $upwd = $_POST["pwd"];
    $urpwd = $_POST["rpwd"];
    $uaddress = $_POST["useraddress"];
    $uposcode = $_POST["userposcode"];
    $ustate = $_POST["userstate"];
    $utel = $_POST["usertel"];
    $ubirth = $_POST["userbirthday"];


    mysqli_query($connect,"UPDATE customer SET Username ='$uname',
                                               Email='$uemail',
                                               User_Password = '$upwd',
                                               confirm_password = '$urpwd',
                                               PhoneNumber = '$utel',
                                               Birthday = '$ubirth',
                                               User_Address = '$uaddress',
                                               User_State = '$ustate',
                                               User_Poscode = '$uposcode'
                                               WHERE ID");
        
} 
header("url=profile.php");
mysqli_close($connect);
?>
    