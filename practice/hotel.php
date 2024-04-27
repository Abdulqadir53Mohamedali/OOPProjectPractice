<?php   
session_start();
require_once "..//classes/hotelClass.php";




// if(isset($_POST['submitBtn'])){
//     $roomcreation = new hotel();
//     $roomcreation->roomCreation();
// }


if(isset($_POST['roomBtn'])){
    header("Location:hotelRoomPage.php");
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="/styles/hotelBookingPage.css">
</head>
<body>
    <?php require_once "navbar.php"; ?>
    <main class="container mt-5">
        <section>
            <hr>
            <h3>Set Your Stay Dates:</h3><br>
            <label for="dateRangeStart">Check-in:</label>
            <input type="text" id="dateRangeStart" name="displayStartDate" placeholder="Select Date.." readonly="readonly" />

            <label for="dateRangeEnd">Check-out:</label>
            <input type="text" id="dateRangeEnd" name="displayEndDate" placeholder="Select Date.." readonly="readonly" />

            <!-- Hidden fields to pass the correct format of dates -->
            <input type='hidden' id='hiddenStartDate' name='startDate' value=''>
            <input type='hidden' id='hiddenEndDate' name='endDate' value=''>

            <button type="button" class="btn btn-light" id="dateClear">Clear Dates</button>
            <button type="submit" class="btn btn-success" name="dateSubmit">Confirm Dates</button>
        </section>
    </main>

    <?php if (isset($_POST['dateSubmit']) && !empty($_POST['startDate']) && !empty($_POST['endDate'])): ?>
        <div id="roomDisplayArea" class="container border text-center">
            <?php
            $accommodation = new Hotel();
            $startDate = $_POST['startDate'] ?? null;
            $endDate = $_POST['endDate'] ?? null;

            for ($level = 1; $level <= 5; $level++):
                $availableRooms = $accommodation->fetchAvailableRooms($level);
            ?>
                <div id='Level<?= $level ?>' class=''>
                    <h1>Level <?= $level ?></h1>
                    <div class="row justify-content-center">
                        <?php foreach ($availableRooms as $roomDetail): ?>
                            <div class='col-md-3 mb-4'>
                                <form action='roomDetails.php' method='POST'>
                                    <div class='card' style='width: 18rem; margin: 10px;'>
                                        <img src='<?= htmlspecialchars($roomDetail['image']) ?>' class='card-img-top' alt='<?= htmlspecialchars($roomDetail['type']) ?> Room'>
                                        <div class='card-body'>
                                            <h5 class='card-title'><?= htmlspecialchars($roomDetail['type']) ?></h5>
                                            <p class='card-text'><?= htmlspecialchars($roomDetail['description']) ?></p>
                                            <p class='card-text'>Price: £<?= htmlspecialchars($roomDetail['price']) ?></p>
                                                <input type='hidden' name='roomID' value='<?= htmlspecialchars($roomDetail['roomId']) ?>'>
                                                <input type='hidden' name='startDate' value='<?= htmlspecialchars($startDate) ?>'>
                                                <input type='hidden' name='endDate' value='<?= htmlspecialchars($endDate) ?>'>
                                                <button name='roomBtn' type='submit' class='btn btn-primary'>Book Now</button>
                                                <p class='text-warning'>Next Available: <?= htmlspecialchars($roomDetail['nextAvailable']) ?></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="/scripts/index.js"></script>
</body>
</html>













<!-- 
    1. thiink of base deisng
    2. allow users to choose dates and then rooms that have not been booked iwhtin those dates will appear
    3. if time permits we can even make a filter for the rooms 
 -->