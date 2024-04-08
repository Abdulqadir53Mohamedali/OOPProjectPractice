<?php
require_once("..//classes/hotelClass.php");


$hotel = new hotel();

$chosenRoom = null;
if(isset($_POST["roomID"])){
    $chosenRoom = $hotel->chosenRoom($_POST["roomID"]);
    $startDate = $_POST['startDate'] ;
    $endDate = $_POST['endDate'] ;
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <?php require "navbar.php"?>

    <h2 name="roomName" class="text-center">Hotel Room</h2>
    <hr class="border">

    <div class = "container">
    <h2>Payment</h2>
        <div class = "row">
            <div class = "col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                            <h5 class="card-title"><u>Booking Information</u></h5>
                                <p class="card-text">Room Type <br> <?php echo $chosenRoom['roomType']  ?></p>
                                <p class = "card-text">Floor <br> <?php echo $chosenRoom['floor']?></p>
                                <p class = "card-text">Booking Dates <br> <?php echo $startDate?> - <?php echo $endDate?></p>
                                <p class = "card-text"> Booking Time </p>
                            <h5 class = "card-title"> <u>Booking Cost</u></h5>
                                <p>Price: <br> £<?php   echo  $chosenRoom['price']?></p>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                            <h5 class="card-title">1. Credit Card</h5>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Card number</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="e.g. 1234567891234567">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Name on card</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="e.g. Silvers Reileigh">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Expiry date</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="MM/YY">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">CVV code</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="e.g.961">
                            </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                            <h5 class="card-title">2. Paypal</h5>
                            <!-- Paypal icon -->
                    </div>
                </div>


            </div>
            <div class = "col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Order Summary</h5>
                    <p class="card-text">Subtotal</p>
                    <p class="card-text">Discount</p>
                    <hr>
                    <p class="card-text">Total</p>
                    <a href="#" name = "submitPaymentBtn"class="btn btn-primary">Confirm Payment</a>
                </div>
                </div>
            </div>
        </div>
    </div>





    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>