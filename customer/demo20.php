
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
<form name="billing" class="billing-form" id="billing"  method="POST">
									<h3 class="billing-heading mb-4">Payment Method</h3>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">	
											   <input type="radio" name="pay" class="mr-2"  onchange=" myFunction(0)" value="Debit Card and Credit Card">Debit and Credit
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <input type="radio" name="pay" class="mr-2"  onchange="myFunction(1)" value="Cash On Delivery">Cash Payment
											</div>
										</div>
									</div>
				<h3 class="mb-4 billing-heading">Delivery Details</h3>
				<div class="row align-items-end">
	          		<div class="col-md-12">
	                <div class="form-group">
					<label for="firstname">Name</label>
	                  <input type="text" name="fname" id="username" class="form-control" value="" required>
                      <span id="errorname" style="color:red"></span>
	                </div>
	              </div>
                <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
		            		<label for="country">State</label>
		            		<div class="select-wrap">
		                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
		                  <select name="state" id="state" class="form-control" value=""required>
						  		<option value=""></option>
                                 <option value="Kuala Lumpur">Kuala Lumpur</option>
                                <option value="Selangor">Selangor</option>
                                <option value="Melaka">Melaka</option>
                                <option value="Negeri Sembilan">Negeri Sembilan</option>
                                <option value="Pahang">Pahang</option>
                                <option value="Kelantan">Kelatan</option>
                                <option value="Terrenganu">Terrenganu</option>
                                <option value="Penang">Penang</option>
                                <option value="Perlis">Perlis</option>
                                <option value="Kedah">Kedah</option>
                                <option value="Johor">Johor</option>
                                <option value="Perak">Perak</option>
                                <option value="Sabah">Sabah</option>
                                <option value="Sarawak">Sarawak</option>
		                  </select>
						  <span id="errorstate" style="color:red"></span>
		                </div>
		            	</div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
	                	<label for="streetaddress">Address (Please State Clearly)</label>
	                  <input type="text" class="form-control" name ="add" value="" required>
                      <span id="erroradd" style="color:red"></span>
	                </div>
		            </div>
		            <div class="col-md-12">
		            	<div class="form-group">
		            		<label for="postcodezip">Postcode / ZIP *</label>
	                  <input type="text" class="form-control" name="zip" value="" required>
					  <span id="errorzip" style="color:red"></span>
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
	                <div class="form-group">
	                	<label for="phone">Phone</label>
	                  <input type="tel" class="form-control" name="phone" value="" required>
					<span id="errorphone" style="color:red"></span>
					</div>
	              </div> 
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="emailaddress">Email Address</label>
	                  <input type="email" class="form-control" name="email" value="" required>
					  <span id="erroremail" style="color:red"></span>
	                </div>
                </div>	
                <div id="card-payment">
				<div class="col-md-12" id="cn">
							<label for="cnumber">Card Number</label>
							<input type="text" class="form-control" name="cardnum" id="card_num" placeholder="0000-0000-0000-0000" required>
							<span id="errorcard" style="color:red"></span>
				</div>
				<div class="col-md-12">
							<label for="ccvv">CVV</label>
							<input type="text" class="form-control" name="cardcvv" id="card_cvv" placeholder="000" required>
							<span id="errorcvv" style="color:red"></span>

				</div>
				<div class="col-md-6">
							<label for="cmonth">Expiry Date</label>
							<select class="col-md-12 form-control" name="card_month" id="month" placeholder="" required>
								<option selected>Select Month</option>
								<option value="01">January</option>
								<option value="02">February</option>
								<option value="03">March</option>
								<option value="04">April</option>
								<option value="05">May</option>
								<option value="06">June</option>
								<option value="07">July</option>
								<option value="08">August</option>
								<option value="09">September</option>
								<option value="10">October</option>
								<option value="11">November</option>
								<option value="12">December</option>
							</select>
							<span id="errormonth" style="color:red"></span>
				</div>
				<div class="col-md-6">
	                		<label for="cyears">Years</label>
							<select class="col-md-12 form-control" name="card_years" id="years" placeholder=""required>
							<option selected>Select Year</option>
							<option value="2012">2012</option>
							<option value="2013">2013</option>
							<option value="2014">2014</option>
							<option value="2015">2015</option>
							<option value="2016">2016</option>
							<option value="2017">2017</option>
							<option value="2018">2018</option>
							<option value="2019">2019</option>
							<option value="2020">2020</option>
							<option value="2021">2021</option>
							<option value="2022">2022</option>
							<option value="2023">2023</option>
							<option value="2024">2024</option>
							<option value="2025">2025</option>
							<option value="2026">2026</option>                          
							<option value="2027">2027</option>
							<option value="2028">2028</option>
							<option value="2029">2029</option>
							<option value="2030">2030</option>
							<option value="2031">2031</option>
							<option value="2032">2032</option>
							<option value="2033">2033</option>
							<option value="2034">2034</option>
							<option value="2035">2035</option>
							<option value="2036">2036</option>
							</select>   
							<span id="erroryears" style="color:red"></span>
</div>
                		</div>
                <div class="w-100">
				<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <input type="radio" id="tnc" value="" class="mr-2" required>I have read and accept the terms and conditions
											   <span id="errortnc" style="color:red"></span>
											</div>
										</div>
									</div>
				</div>
                <div class="col-md-12">
                	<div class="form-group mt-4">
                    <input type="hidden" value="<?php echo $item_qty?>" name="hidden_qty">
                    <input type="hidden" value="<?php echo $subtotal?> " name="hidden_total">
					<button type="submit" href="menu.php" value="Place to Order" style="display:none" id="cardbutton" name="cardbutton" class="btn btn-primary py-3 px-4" onchange="myFunction(0)" onclick="cardValidate(),validateT();">Place to Order</button>
					<button type="submit" href="menu.php" value="Place to Order"  style="display:none" id="cashbutton"  name="cashbutton" class="btn btn-primary py-3 px-4" onchange="myFunction(1)" onclick="validateT();">Place to Order</button>
				</div>
                </div>
		</div>
		</form><!-- END -->
        <script>
	
	function myFunction(x)
{
    if(x==0)
    {
		document.getElementById("cardbutton").style.display='block';
		document.getElementById("cashbutton").style.display='none';
        document.getElementById("card-payment").style.display='block';

    }
    else if(x==1)
    {
       document.getElementById("cardbutton").style.display='none';
		document.getElementById("cashbutton").style.display='block';
        document.getElementById("card-payment").style.display='none';
    }

}
  </script>