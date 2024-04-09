
<?php
require "navbarhotelsummary.php";

require_once("..//classes/hotelClass.php");


$hotel = new hotel();

$chosenRoom = null;

$email = $_SESSION['email'] ?? null; 
$userId = $hotel->userIdFetch($email);


if(isset($_POST["roomID"])){
    $chosenRoom = $hotel->chosenRoom($_POST["roomID"]);
    $startDate = $_POST['startDate'] ;
    $endDate = $_POST['endDate'] ;
    $roomID = $_POST["roomID"];
}
if (isset($_POST["ConfirmPaymentBtn"])) {
    var_dump($_POST['roomId'], $userId, $_POST['startDate'], $_POST['endDate']);
    $hotel->sendBookingInfo($_POST['roomId'] ?? '', $_POST['userId'] ?? '', $_POST['startDate'] ?? '', $_POST['endDate'] ?? '');
    header("Location:hotel.php");
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


    <h2 name="roomName" class="text-center">Hotel Room</h2>
    <hr class="border">

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <div class="container">
            <h2>Payment</h2>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title"><u>Booking Information</u></h5>
                            <p class="card-text">Room Type <br> <?php echo $chosenRoom['roomType']  ?></p>
                            <p class="card-text">Floor <br> <?php echo $chosenRoom['floor'] ?></p>
                            <p class="card-text">Booking Dates <br> <?php echo $startDate ?> - <?php echo $endDate ?></p>
                            <p class="card-text"> Booking Time </p>
                            <h5 class="card-title"> <u>Booking Cost</u></h5>
                            <p>Price: <br> £<?php echo  $chosenRoom['price'] ?></p>
                            <input name="userId" type="hidden" value="<?php echo $userId ?>">
                            <input name="roomId" type="hidden" value="<?php echo $roomID ?>">
                            <input name="startDate" type="hidden" value="<?php echo $startDate; ?>">
                            <input name="endDate" type="hidden" value="<?php echo $endDate; ?>">
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
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Order Summary</h5>
                            <p class="card-text">Subtotal</p>
                            <p class="card-text">Discount</p>
                            <hr>
                            <p class="card-text">Total</p>
                            <button type="submit" name="ConfirmPaymentBtn" class="btn btn-primary">Confirm Payment</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>




    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>