<?php
include("dataconnection.php");
session_start();
error_reporting(1);

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
$customer_id=$_SESSION['id'];
$result=mysqli_query($connect,"SELECT *FROM customer WHERE ID='$customer_id'");
$row = mysqli_fetch_assoc($result);
?>
<script>
function validate()
{
var name_check=0;
var name= document.billing.fname.value;
var address = document.billing.add.value;
var zip = document.billing.zip.value;
var phone = document.billing.phone.value;
var state =document.billing.state.value;
var email =document.billing.email.value;

    if(name=="")
    {
        document.getElementById("errorname").innerHTML="Please Enter your name.";
    }
	else
	{
		document.getElementById("errorname").innerHTML="";
	}

    if(address=="")
    {
        document.getElementById("erroradd").innerHTML="Please provided the address.";
    }
	else
	{
		document.getElementById("erroradd").innerHTML="";
	}

	if(zip=="")
	{
		document.getElementById("errorzip").innerHTML="Please provided the Poscode";
	}
	else
	{
		document.getElementById("errorzip").innerHTML="";
	}
	if(phone=="")
	{
		document.getElementById("errorphone").innerHTML="Please provided the PhoneNumber";
	}
	else
	{
		document.getElementById("errorphone").innerHTML="";
	}
	if(document.billing.state.selectedIndex=="")
	{
		document.getElementById("errorstate").innerHTML="Please provided the State";
	}
	else
	{
		document.getElementById("errorstate").innerHTML="";
	}
	if(email=="")
	{
		document.getElementById("erroremail").innerHTML="Please provided the Email";
	}
	else
	{
		document.getElementById("erroremail").innerHTML="";
	}
	
}
</script>
<script>
function cardValidate()
{
	var c_num = document.getElementById("card_num");
	var c_cvv = document.getElementById("card_cvv");
	if(c_num.value.trim().length!=16)
	{
		document.getElementById("errorcard").innerHTML="Invalid Card Number";
		
	}
	else
	{
		document.getElementById("errorcard").innerHTML="";
	}
	
	if(c_cvv.value.trim().length!=3)
	{
		document.getElementById("errorcvv").innerHTML="Invalid CVV";
	}
	else
	{
		document.getElementById("errorcvv").innerHTML="";
	}
	if(document.billing.card_month.selectedIndex=="")
	{
		document.getElementById("errormonth").innerHTML="Please select the month";
	}
	else
	{
		document.getElementById("errormonth").innerHTML="";
	}
	if(document.billing.card_years.selectedIndex=="")
	{
		document.getElementById("erroryears").innerHTML="Please select the years";
	}
	else
	{
		document.getElementById("erroryears").innerHTML="";
	}
	
}
</script>
<script>
function validateT()
{
			if(document.getElementById("tnc").checked)
			{
				document.getElementById("errortnc").innerHTML="";
			
			}
			else
			{
				document.getElementById("errortnc").innerHTML="Please AGREE the terms and condition";
				
			}
}
</script>
<?php
$dt1 = date("Y-m-d");
if(isset($_POST["cashbutton"]))
{
 $name = $_POST["fname"];
 $state = $_POST["state"];
 $address = $_POST["add"];
 $postcode = $_POST["zip"];
 $phone = $_POST["phone"];
 $email = $_POST["email"];
 $method = $_POST["pay"];
 
$sql=mysqli_query($connect,"INSERT INTO payment(payment_name,payment_state,payment_address,payment_postcode,payment_phone,payment_email,payment_method,payment_date)
VALUES('$name','$state','$address','$postcode','$phone','$email','$method','$dt1')");

$sql4=mysqli_query($connect,"SELECT payment_id FROM payment ORDER BY payment_id DESC LIMIT 1");
$row = mysqli_fetch_assoc($sql4);
echo $row["payment_id"];


}
?>
<?php
{
	
}
?>
<?php
if(isset($_POST["cardbutton"]))
{
 $name = $_POST["fname"];
 $state = $_POST["state"];
 $address = $_POST["add"];
 $postcode = $_POST["zip"];
 $phone = $_POST["phone"];
 $email = $_POST["email"];
 $method = $_POST["pay"];
 $card_num = $_POST["cardnum"];
 $card_cvv = $_POST["cardcvv"];
 $card_month = $_POST["card_month"];
 $card_years = $_POST["card_years"];

 $sql3 = "INSERT INTO payment(payment_name,payment_state,payment_address,payment_postcode,payment_phone,payment_email,payment_method,payment_date,payment_cardnum,payment_cvv,payment_carddate,payment_cardyears)
 VALUES('$name','$state','$address','$postcode','$phone','$email','$method','$dt1','$card_num','$card_cvv','$card_month','$card_years')";

mysqli_query($connect,$sql3);

$sql6 = mysqli_query($connect,"SELECT payment_id FROM payment ORDER BY payment_id DESC LIMIT 1");
$row = mysqli_fetch_assoc($sql6);
echo $row["payment_id"];
}
?>
<?php 
    if (isset($_POST["cashbutton"])) 
    {

        foreach($_SESSION["shopping_cart"] as $elements => $values) 
        { 
            $sql5 = 
            "UPDATE product
            SET Product_Stock = Product_Stock - $values[item_quantity]
            WHERE Product_ID = '$values[item_id]';";

			$total = $_POST["hidden_total"];
			$qty = $_POST["hidden_qty"];

            $sql2 =
            "INSERT INTO customer_order (customer_id, product_id, quantity,payment_id,payment_price,order_date,Order_Status,Payment_Status)
            VALUES ('$_SESSION[id]', '$values[item_id]', '$qty','$row[payment_id]','$total','$dt1','Pending','Unpaid')";

           mysqli_query($connect,$sql5);
           mysqli_query($connect,$sql2);

	
        }
        
        if ($sql5 and $sql2) {
            mysqli_close($connect);
            
            unset($_SESSION["shopping_cart"]);

            echo "<script>alert('Thank you for purchasing!');
            window.location.href = 'main.php';
            </script>";
        }
        else {
            die('Error: '.mysqli_error($connect));
        }

        
    }
?>
<?php 
    if (isset($_POST["cardbutton"])) 
    {

        foreach($_SESSION["shopping_cart"] as $elements => $values) 
        { 
            $sql5 = 
            "UPDATE product
            SET Product_Stock = Product_Stock - $values[item_quantity]
            WHERE Product_ID = '$values[item_id]';";

			$total = $_POST["hidden_total"];
			$qty = $_POST["hidden_qty"];

            $sql2 =
            "INSERT INTO customer_order (customer_id, product_id, quantity,payment_id,payment_price,order_date,Order_Status,Payment_Status)
            VALUES ('$_SESSION[id]', '$values[item_id]', '$qty','$row[payment_id]','$total','$dt1','Pending','Paid')";

           mysqli_query($connect,$sql5);
           mysqli_query($connect,$sql2);

	
        }
        
        if ($sql5 and $sql2) {
            mysqli_close($connect);
            
            unset($_SESSION["shopping_cart"]);

            echo "<script>alert('Thank you for purchasing!');
            window.location.href = 'main.php';
            </script>";
        }
        else {
            die('Error: '.mysqli_error($connect));
        }

        
    }
?>