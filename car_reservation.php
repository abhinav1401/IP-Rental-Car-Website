<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="main_style.css">

    <title>Car Reservation</title>
</head>
<body>
    <h1 class="text-center">Reservation Cart</h1>


        <?php
        session_start();
        if (empty($_SESSION["cart"])){
            echo '<div class="container text-center">';
            echo '<h2>No Items. Please Select Cars</h2>';
            echo '<a href="car_rental_center.html" target="mainFrame" class="btn btn-primary">Home</a></div>';
        }else{
            echo '<form id="checkoutForm" method="post" action="checkout.php">';
            echo '<div class="container">
                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Thumbnail</th>
                                <th scope="col">Vehicle</th>
                                <th scope="col">Price Per Day</th>
                                <th scope="col">Rental Days</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>';

            foreach ($_SESSION["cart"] as $id => $item) {
                echo '<tr>';
                echo '<td class="align-left" scope="row"><img style="width: 70px; height: 70px;" class="img-thumbnail" src="images/'.$item["Model"].'.jpg"></td>';
                echo '<td class="align-left" class="align-left">'.$item["Year"].'-'.$item["Brand"].'-'.$item["Model"].'</td>';
                echo '<td class="align-left">'.$item["PricePerDay"].'</td>';
                echo '<td class="align-left"><input name="rentalDays[]" type="number" required max="300" min="1" value="'.$item["RentalDays"].'" </td>';
                echo '<td class="align-left"><button type="submit" onclick="document.getElementById(\'deleteId\').value=' . $id . '" class="btn btn-danger" form="deleteForm">Delete</button></td></tr>';
            }

            echo '</tbody></table>
            <div class="text-right">
                <button type="submit" form="checkoutForm" class="btn btn-primary">Continue Checkout</button>
            </div></div></form>';

        }
        ?>



<form id="deleteForm" method="post" action="deleteCar.php">
    <input hidden name="id" id="deleteId" value="">
</form>



</body>
</html>
