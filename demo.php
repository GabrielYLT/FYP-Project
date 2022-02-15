//backup for edit profile//
<!DOCTYPE html>
<html>
<head>
<title>Profile Page</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="css/profile1.css">
</head>
<?php
include("dataconnection.php");
if(isset($_GET["id"]))
{
	$cus_id=$_GET['id'];
	$result=mysqli_query($connect,"SELECT * from customer WHERE ID='$cus_id'");

	$row=mysqli_fetch_assoc($result);
}
?>
<?php
    $msg ="";
    if(isset($_POST['upload']))
    {
        $image = $_FILES['image']['name'];
  
        mysqli_query($connect,"UPDATE customer SET ProfileIMG='$image'
                                                    WHERE ID = '$cus_id'");

        $target ="images/".basename($_FILES['image']['name']);
        if(move_uploaded_file($_FILES['image']['tmp_name'],$target))
        {
          $msg = "upload successfully";
        }
        else{
          $msg = "problem occur.";
        }

        header("refresh:0.1");
    }
?>
<?php
if(isset($_POST["savebtn"]))
{
	$uname = $_POST["username"];
    $uemail = $_POST["useremail"];
    $uaddress = $_POST["useraddress"];
    $uposcode = $_POST["userposcode"];
    $ustate = $_POST["userstate"];
    $utel = $_POST["usertel"];
    $ubirth = $_POST["userbirthday"];
    
    
    mysqli_query($connect,"UPDATE customer SET Username ='$uname',
                                               Email='$uemail',
                                               PhoneNumber = '$utel',
                                               Birthday = '$ubirth',
                                               User_Address = '$uaddress',
                                               User_State = '$ustate',
                                               User_Poscode = '$uposcode'
                                               WHERE ID = '$cus_id'");
     
    header("location:profile.php");

}
mysqli_close($connect);
?>
<body>
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class=col-md-3 border-right>
            <form name="profile" method="POST" enctype="multipart/form-data">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px"><?php echo "<img src='images/" .$row['ProfileIMG']."'>"?>
                
            <h5>Profile Picture</h5>   
            <div style="width:150px";><input type="file" name="image" id="image"> </div>
            <button class="button-58" type="submit" name="upload" style="margin-top:50px">Save Profile Image</button>
            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 p-5">
                <div class="d-flex justify-content-between  align-items-center mb-3">
                    <h4 class="text-right">My Profile</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label class="labels">Name:</label>
                        <input type="text" name="username" class="form-control" placeholder="Enter your name" value="<?php echo "".$row['Username'];?>">
                    </div>
                </div>
                <div class="row-mt-3">
                    <div class="col-md-12"><label class="labels">Email</label><input type="email" name="useremail" class="form-control" placeholder="example@gmail.com" value="<?php echo $row['Email'];?>"></div>
                    <div class="col-md-12"><label class="labels">Address Line 1</label><input type="text" name="useraddress" class="form-control" placeholder="Enter Address 1" value="<?php echo $row["User_Address"];?>"></div>
                    <div class="col-md-12"><label class="labels">Postcode</label><input type="text" name="userposcode" class="form-control" placeholder="Postcode" value="<?php echo $row["User_Poscode"];?>"></div>
                    <div class="col-md-12"><label class="labels">State</label><input type="text" name="userstate" class="form-control" placeholder="State" value="<?php echo $row["User_State"];?>"></div>
                    
                    <div class="col-md-12"><label class="labels">Phone Number</label><input type="tel" name="usertel" class="form-control" placeholder="Enter your Phone Number" value="<?php echo $row["PhoneNumber"];?>"></div>
                    <div class="col-md-12"><label class="labels">Birthday</label><input type="date" name="userbirthday" class="form-control" placeholder="Birthday" value="<?php echo $row["Birthday"];?>"></div> 
                </div>
                    
                <div>
                <div class="mt-5 text-center"><button class="button-58" type="submit" name="savebtn">Save Changes</button></div>
                <div class="mt-5 text-center"><a class="button-58" href="profile.php">Back</a></div>
                </div>

            </div>
        </div>
        <div class="col-md-4">  
        </div>
        </form>
    </div>
    
</div>

</body>
</html>