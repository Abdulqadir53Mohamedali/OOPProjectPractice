<?php

session_start();

require_once("..//classes/hotelClass.php");


$hotel = new hotel();
$chosenRoom = $hotel->chosenRoom($_POST["roomID"]);

if(isset($_POST['submitBtn'])){
    header("Location:hotelSummaryPage.php");
}

$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body >
    <?php require("navbar.php"); ?>


    <div>
        <form action = "/practice//hotelSummary.php" method = "POST">
            <?php if(isset($chosenRoom)) {  ?>
                <h2 name="roomName" class="text-center"><?php echo htmlspecialchars($chosenRoom['roomType']); ?></h2>
                <hr class="border">

                <div class="row " style = "color:#471F3A;">
                    <div class="col-md-6 align-items-center">
                        <div class = "container">
                            <img name="roomImage" src="<?php echo htmlspecialchars($chosenRoom['roomImage']); ?>"
                                alt="<?php echo htmlspecialchars($chosenRoom['roomType']); ?>"
                                class="img-fluid"
                                style="max-height: 45rem; width: 100%;">
                        </div>
                    </div>

                    <div class="col-md-6 ">
                        <p name="roomDescryption" class="fs-3 mb-4 "><?php echo htmlspecialchars($chosenRoom['RoomDescription']); ?> Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima dolorem fuga error autem. Aliquam repellat nulla consectetur dolorum nesciunt corrupti ea quo, fugit consequuntur unde eligendi distinctio architecto saepe magnam!</p>
                        <p class = "fs-3" >Can house 2 adults and 1 child</p>
                        <p name="roomPrice" class ="fs-3"><b>Price: £<?php echo htmlspecialchars(number_format($chosenRoom['price'], 2)); ?></b></p>
                        <input type="hidden" name="roomID" value="<?php echo $chosenRoom['roomID']; ?>">
                        <input type='hidden' name='startDate' value='<?php echo $startDate ?>'>
                        <input type='hidden' name='endDate' value='<?php echo $endDate ?>'>
                        <button name = "submitBtn"type = "submit" class = "btn btn-primary mt-5">Book room</button>
                    </div>
                </div>

            <?php } ?>
        </form>

    </div>

    <?php require ("footer.php") ?>














    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/64e743ec68.js" crossorigin="anonymous"></script>
</body>
</html>