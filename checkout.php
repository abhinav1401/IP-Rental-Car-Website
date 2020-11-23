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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="main_style.css">
    <style type="text/css">
        .form-group .col-form-label:after{
            content: " *";
            color: red;
        }
    </style>

    <title>Checkout Form</title>
</head>
<body>
    <h1 class="text-center">Check-Out</h1>
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
            <label for="city" class="col-sm-2 col-form-label">City</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" required name="city" id="city"  placeholder="City">
            </div>
        </div>

        <div class="form-group row">
            <label for="state" class="col-sm-2 col-form-label">State</label>
            <div class="col-sm-10">

                  <input type="text" class="form-control" required name="state" id="state"  placeholder="State">
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
                </select>
            </div>
        </div>
        <h3>Total Amount: $<?php echo $total;?></h3>
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
