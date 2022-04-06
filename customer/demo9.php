<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <title>Checkout | Online Pet Shop</title>

    <style>
        * {
			box-sizing: border-box;
		}

        body {
            text-align: center;
            font-family: Arial;
        }

        form {
            background-color: #ddd;
            margin: 80px;
            text-align: left;
            width: 60%;
            border-radius: 5px;
            padding-left: 30px;
            padding-top: 20px;
            padding-bottom: 30px;

        }

        .form-header {
            margin-left: 10px;
            margin-bottom: 80px;
        }

        .card-icon {
            margin-left: 200px;
        }

        .form-control {
			margin-bottom: 10px;
			padding-bottom: 20px;
			position: relative;
			background: transparent;
			border: none;
		}

		label {
			color: black;
			display: inline-block;
			width: 120px;
            text-align: right;
		}

		.form-control input,
        .form-control button {
			width: 40%;
			padding: 10px;
            border: none;
		}

		::placeholder {
			color: slategray;
		}

        .form-control button {
            cursor: pointer;
            border-radius: 5px;
        }

        .form-control button:hover {
            background-color: #333;
            color: pink;
        }
    </style>

    <script>
		function payment_validation() {
			var name = document.getElementById("name");
			var card_num = document.getElementById("card_num");
    		var expiry = document.getElementById("expiry");
			var cvc = document.getElementById("cvc");

			if (name.value.trim() == "") {
				alert("Invalid name");
				return false;
			}
			else if (card_num.value.trim().length != 16) {
				alert("Invalid card number");
				return false;
			}
			else if (expiry.value.trim().length != 4) {
				alert("Invalid expiry");
				return false;
			}
			else if (cvc.value.trim().length != 3) {
				alert("Invalid cvc");
				return false;
			}
			else {
				return true;
			}
		}
	</script>
</head>

<body>
    <?php
    include ("dataconnection.php"); 
    ?>

    <form action = "payment_success.php" method = "POST" onsubmit = "return payment_validation()">
        <div class = "form-header">
            <h2>Payment</h2>
            <h3>Accepted Cards</h3>
            <i class="fa fa-cc-visa" style = "color: navy;"></i>
            <i class="fa fa-cc-amex" style = "color: blue;"></i>
            <i class="fa fa-cc-mastercard" style = "color: red;"></i>
        </div>

        <div class = "form-control">
			<label>Name on Cards: </label>
			<input type = "text" placeholder = "Name" id = "name" name = "name" required = "required">
		</div>

        <div class = "form-control">
			<label>Card Number: </label>
			<input type = "text" placeholder = "0000-0000-0000-0000" id = "card_num" name = "card_num" required = "required">
		</div>

        <div class = "form-control">
			<label>Expiry: </label>
			<input type = "text" placeholder = "MM/YY" id = "expiry" name = "expiry" required = "required" style = "width: 70px;">
            <label>CVC: </label>
			<input type = "text" placeholder = "000" id = "cvc"  name = "cvc" required = "required" style = "width: 70px;">
		</div>

        <div class = "form-control">
            <label></label>
            <button type = "submit" name = "pay" onclick = "return confirm('Are you sure?')"><i class = 'fas fa-credit-card'></i> Continue to Pay</button>
        </div>
    </form>

    <?php 
    ?>
</body>
</html>