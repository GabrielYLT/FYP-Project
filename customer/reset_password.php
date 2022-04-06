<?php
include("dataconnection.php");
if(isset($_POST['submit_password']))
{
  $email=$_POST['email'];
  $pass=$_POST['password'];
  $npass=$_POST['cpassword'];
  
  $select=mysqli_query($connect,"UPDATE customer SET User_Password='$pass', 
                                                    confirm_password='$npass'
                                                    WHERE Email='$email'");

  header("location:Login.php");
}
?>

<script>
  var password = document.getElementById("password");
  var confirm_password = document.getElementById("cpassword");

  function validatePassword()
  {
    var password = document.getElementById("password");
    var confirm_password = document.getElementById("cpassword");
    //var password_check=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z0-9])(?!.*\s).{8,15}$/;
    if(password.value != confirm_password.value)
    {
      confirm_password.setCustomValidity("Passwords Not Match");
    } 
    else 
    {
      confirm_password.setCustomValidity('');
    
    }
  }
  password.onchange = validatePassword;
  confirm_password.onkeyup = validatePassword;
</script>

<!DOCTYPE HTML>
<html>
<head>
<title>Reset Password Page</title>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="index/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="index/css/animate.css">
    
    <link rel="stylesheet" href="index/css/owl.carousel.min.css">
    <link rel="stylesheet" href="index/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="index/css/magnific-popup.css">

    <link rel="stylesheet" href="index/css/aos.css">

    <link rel="stylesheet" href="index/css/ionicons.min.css">

    <link rel="stylesheet" href="index/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="index/css/jquery.timepicker.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/signup.css" type="text/css">
    <script type="text/javascript"></script>
    
    <link rel="stylesheet" href="index/css/flaticon.css">
    <link rel="stylesheet" href="index/css/icomoon.css">
    <link rel="stylesheet" href="index/css/style.css">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="reset_pass.php">JJG Fruit & Vege</a>
          <a class="navbar-brand">Reset Password</a>
	    </div>
	  </nav>
      <div class="container1">
		<div class="signup-box">
    <?php
  if($_GET['key'] && $_GET['reset'])
  {
  $email=$_GET['key'];
  $pass=$_GET['reset'];
  
  $select=mysqli_query($connect,"SELECT * FROM customer WHERE Email='$email' AND User_Password='$pass'");
  if(mysqli_num_rows($select)==1)
  {
    ?>
    <div>
            <div>
                <ul id="d1" class="list-group" style="display:none;">
                    <li class="list-group-item list-group-item-success">Password Condition</li>
                    <li class="list-group-item" id="d12" style="color:rgb(255,0,0);">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                        One Upper Case Letter
                    </li>
                    <li class="list-group-item" id="d13" style="color:rgb(255,0,0);">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                        One Lower Case Letter
                    </li>
                    <li class="list-group-item" id="d14" style="color:rgb(255,0,0);">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        One Special Char
                    </li>
                    <li class="list-group-item" id="d15" style="color:rgb(255,0,0);">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        One Number
                    </li>
                    <li class="list-group-item" id="d16" style="color:rgb(255,0,0);">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        Length 8 Char
                    </li>
                </ul>
              </div>
        </div>
    <form method="POST" id="f1">
    <input type="hidden" name="email" value="<?php echo $email;?>">
    <div class="textbox">
    <input type="password" name='password' id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}"  title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Password" required>
    </div>
    <div class="textbox">
    <input type="password" name='cpassword' id="cpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}"  title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Confirm_Password" required>
    </div>
    <div class="button">
				<input type="submit" value="Done" name="submit_password" id="b1" onclick="validatePassword();">
		</div> 
    <span id="errorrpwd"></span>
                <div class="<?=(@$msg_success=="")? 'error':'green';?>">
                <?php echo @$error;?><?php echo @$msg_success;?>
                </div>    
    
    </form>
    <?php
    }
  }
  ?>
		</div>
    
	</div>
  
        <footer class="ftco-footer ftco-section">
      <div class="container">
      	<div class="row">
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>. Downloaded from <a href="https://themeslab.org/" target="_blank">Themeslab</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="index/js/jquery.min.js"></script>
  <script src="index/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="index/js/popper.min.js"></script>
  <script src="index/js/bootstrap.min.js"></script>
  <script src="index/js/jquery.easing.1.3.js"></script>
  <script src="index/js/jquery.waypoints.min.js"></script>
  <script src="index/js/jquery.stellar.min.js"></script>
  <script src="index/js/owl.carousel.min.js"></script>
  <script src="index/js/jquery.magnific-popup.min.js"></script>
  <script src="index/js/aos.js"></script>
  <script src="index/js/jquery.animateNumber.min.js"></script>
  <script src="index/js/bootstrap-datepicker.js"></script>
  <script src="index/js/scrollax.min.js"></script>
  <script src="index/js/main.js"></script>

  <script>
$(document).ready(function()
{
    $(".submit_password").click(function(event){
        var data_str=$('#f1').serialize();
        $.post("reset_password.php",$("#f1").serialize(),function(return_data){
            if(return_data.status_form=='OK')
            {
                $("#f1")[0].reset();
                $("#msg").removeClass('alert alert-danger').addClass('alert alert-info');
            }
            else
            {
                $("#msg").removeClass('alert alert-info').addClass('alert alert-danger');
            }
            $("#msg").html(return_data.msg);
            $("#msg").show();
            setTimeout(function()
            {
                $('#msg').fadeOut('slow');},6000);
        },"json");
    });
    $('#password').keyup(function(){
        var str=$('#password').val();
        var upper_text = new RegExp('[A-Z]');
        var lower_text = new RegExp('[a-z]');
        var number_check = new RegExp('[0-9]');
        var special_char = new RegExp('[!@#$%^&*()~`/.,?><":";{}|[]');
        var flag='T';

        if(str.match(upper_text))
        {
            $('#d12').html("<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>One Upper Case Letter");
            $('#d12').css("color","green");
        }
        else
        {
            $('#d12').css("color","red");
            $('#d12').html("<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>One Upper Case Letter ");
            flag='F';
        }

        if(str.match(lower_text))
        {
            $('#d13').html("<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>One Lower Case Letter");
            $('#d13').css("color","green");
            
        }
        else
        {
            $('#d13').css("color","red");
            $('#d13').html("<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>One Lower Case Letter");   
            flag='F';
        }
        if(str.match(special_char))
        {
            $('#d14').html("<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>One Special Case Letter");
            $('#d14').css("color","green");
        }
        else
        {
            $('#d14').css("color","red");
            $('#d14').html("<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>One Special Case Letter");   
            flag='F';
        }
        if(str.match(number_check))
        {
            $('#d15').html("<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>One Number Case Letter");
            $('#d15').css("color","green");
        }
        else
        {
            $('#d15').css("color","red");
            $('#d15').html("<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>One Number Case Letter")
            flag='F';
        }
        if(str.length>7)
        {
            $('#d16').html("<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>Length MORE than 8");
            $('#d16').css("color","green");
        }
        else
        {
            $('#d16').css("color","red");
            $('#d16').html("<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>Length NOT MORE than 8")
            flag='F';
        }

        if(flag=='T')
        {
            $("#d1").fadeOut();
            $('#display_box').css("color","green");
            $('#display_box').html("<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>"+str);
        }
        else
        {
            $("#d1").show();
            $('#display_box').css("color","red");
            $('#display_box').html("<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>"+str);
        }
        });

        $("#password").blur(function(){
            $("#d1").fadeOut();
        });

        $("#password").focus(function()
        {
            $("#d1").show();
        });



});	
</script>
  


</html>
</body>
