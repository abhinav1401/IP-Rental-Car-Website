<?php
session_start();

$total = 0;
$rentalDays = $_REQUEST["rentalDays"];
$index = 0;

foreach ($_SESSION["cart"] as $id => $item) {
    $_SESSION["cart"][$id]["RentalDays"] = $rentalDays[$index];
    $total += $rentalDays[$index++] * $item["PricePerDay"];
}
$_SESSION["total"]=$total;
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

    h2{
        color:#001a00;
        font-size:28px;
        font-style: oblique;
        text-transform: capitalize;
    }

    .btn {
      background-color: #78244c;
      color: white;
      padding: 4px;
      margin: 10px 10;
      border: none;
      width: 100%;
      border-radius: 8px;
      cursor: pointer;
      font-size: 12px;
    }

input[type=text] {
  width: 90%;
  margin-bottom: 5px;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 6px;
}

table.tablebill
{
  border: 1px solid #471d31;
  width: 100%;
  color: #471d31;
  font-family: Verdana;
  font-size: 12px;
  text-align: left;
}

table.tablebill th {
  background-color: #471d31;
  color: #ffffff;
  font-size: 14px;
}

table.tablebill tr:nth-child(even) {background-color: #ffffff}

</style>

<script type="text/javascript">

	function validate()
	{
		var error = true;
		document.form1.fname.style.background = "White";
        document.form1.email.style.background = "White";
        document.form1.address.style.background = "White";
		document.form1.suburb.style.background = "White";
        document.form1.state.style.background = "White";
		document.form1.country.style.background = "White";
        document.form1.zip.style.background = "White";


		if (document.form1.fname.value == "")
		{
         		error_type = 1;
			document.form1.fname.focus();
			document.form1.fname.style.background = "#ff9900";
         		error = false;
		}

		if (document.form1.address.value == "")
		{
         		error_type = 1;
			document.form1.address.focus();
			document.form1.address.style.background = "#ff9900";
         		error = false;
		}
		if (document.form1.suburb.value == "")
		{
         		error_type = 1;
			document.form1.suburb.focus();
			document.form1.suburb.style.background = "#ff9900";
         		error = false;
		}
		if (document.form1.state.value == "")
		{
         		error_type = 1;
			document.form1.state.focus();
			document.form1.state.style.background = "#ff9900";
         		error = false;
		}
		if (document.form1.country.value == "")
		{
         		error_type = 1;
			document.form1.country.focus();
			document.form1.country.style.background = "#ff9900";
         		error = false;
		}
		if (document.form1.zip.value == "")
		{
			error_type = 1;
			document.form1.zip.focus();
			document.form1.zip.style.background = "#ff9900";
         		error = false;
		}
		if (isNaN(document.form1.zip.value))
		{
			error_type = 2;
			document.form1.zip.focus();
			document.form1.zip.style.background = "#ffff99";
         		error = false;
		}


		if (document.form1.email.value == "")
		{
         		error_type = 1;
			document.form1.email.focus();
			document.form1.email.style.background = "#ffff99";
         		error = false;
		}
		var emailfilter=/^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i

		if ( document.form1.email.value != "" && emailfilter.test(document.form1.email.value) ==false)
		{
			error_type = 2;
			document.form1.email.focus();
			document.form1.email.style.background = "#ffff99";
         		error = false;
		}

/***********************************************
* Email Validation script-   Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/


		if ( error ==false)
		{
			switch (error_type)
			{
				case 1: alert("The required field has not been filled in");
				break;
				case 2: alert("please enter a valid value");
				break;
			}
         		return false;
		}
		else
		{
			return true;
		}

	}

	</script>
</head>


<body style="background-color:#f7f1ee">




  <title>Checkout Form</title>
</head>
<body>
  <h1 class="text-center">Check Out</h1>
  <div class="container mx-4">

      <form name="purchaseForm" method="post" action="send_email.php">
      <div class="form-group row">
          <label for="firstName" class="col-sm-2 col-form-label">First Name</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" required name="firstName" id="firstName" placeholder="First Name">
          </div>
      </div>
      <div class="form-group row">
          <label for="lastName" class="col-sm-2 col-form-label">Last Name</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" required name="lastName" id="lastName"  placeholder="Last Name">
          </div>
      </div>
      <div class="form-group row">
          <label for="emailAddr" class="col-sm-2 col-form-label">Email Address</label>
          <div class="col-sm-10">
              <input type="email" class="form-control" required name="emailAddr" id="emailAddr"  placeholder="Email Address">
          </div>
      </div>
      <div class="form-group row">
          <label for="addrLine1" class="col-sm-2 col-form-label">Address Line 1</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" required name="addrLine1" id="addrLine1"  placeholder="Address Line 1">
          </div>
      </div>
      <div class="form-group row">
          <label for="addrLine2" class="col-sm-2">Address Line 2</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" name="addrLine2" id="addrLine2" placeholder="Address Line 2">
          </div>
      </div>
      <div class="form-group row">
          <label for="city" class="col-sm-2 col-form-label">City</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" required name="city" id="city"  placeholder="City">
          </div>
      </div>
      <div class="form-group row">
          <label for="state" class="col-sm-2 col-form-label">State</label>
          <div class="col-sm-10">
              <select class="form-control" required id="state" name="state">
                  <option selected>New South Wales</option>
                  <option>Western Australia</option>
                  <option>Queensland</option>
                  <option>South Australia</option>
                  <option>Victoria</option>
                  <option>Tasmania</option>
              </select>
          </div>
      </div>
      <div class="form-group row">
          <label for="postCode" class="col-sm-2 col-form-label">Post Code</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" required name="postCode" id="postCode"  placeholder="Post Code">
          </div>
      </div>
      <div class="form-group row">
          <label for="paymentType" class="col-sm-2 col-form-label">Payment Type</label>
          <div class="col-sm-10">
              <select class="form-control" required id="paymentType" name="paymentType">
                  <option selected>VISA</option>
                  <option>MasterCard</option>
                  <option>PayPal</option>
              </select>
          </div>
      </div>
      <h3>Total Amount $<?php echo $total;?></h3>
      <div class="form-group row">
          <div class="col-sm-12 text-right">
              <a href="car_rental_center.html" target="mainFrame" class="btn btn-primary">Continue Selection</a>
              <button type="submit" class="btn btn-primary">Finish Booking</button>
          </div>
      </div>
  </form>
  </div>
</body>
</html>
