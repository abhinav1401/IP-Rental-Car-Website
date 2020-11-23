<?php
session_start();

// Send email
$to = $_REQUEST['emailAddr'];
$subject = 'Your Order Details';
$message = '<h1>Order Conformation Details</h1>
            <h2>Thanks For Renting Cars From Hertz-UTS, Your Total Cost Is : $' . $_SESSION["total"] .
            '</h2><h2>Details Are as Follow : </h2>';

foreach ($_SESSION["cart"] as $id => $item) {
    $message .= 'Model: '.$item["Brand"].'-'.$item['Model'].'-'.$item['Year'];
    $message .= '<br>Mileage: ' . $item["Mileage"] . ' kms';
    $message .= '<br>Fuel Type: ' . $item['FuelType'];
    $message .= '<br>Seats: ' . $item['Seats'];
    $message .= '<br>Price Per Day: ' . $item['PricePerDay'];
    $message .= '<br>Rent Days: ' . $item['RentalDays'];
    $message .= '<br><br>';
}


// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

//// More headers
$headers .= 'From: <13313162@student.uts.edu.au>' . "\r\n";
$headers .= "Return-Path: <13313162@student.uts.edu.au>\n";

mail($to, $subject, $message, $headers);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="main_style.css">

    <title>Purchase</title>
</head>
<body>

    <div class="container text-center">
        <h1>Email Sent</h1>
        <a href="car_rental_center.html" target="mainFrame" class="btn btn-primary">Back to Home</a>
    </div>

</body>
<?php
session_destroy();
?>
