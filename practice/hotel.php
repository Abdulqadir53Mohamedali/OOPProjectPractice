<?php   
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
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href = "/styles/hoteBookingPage.css">
</head>
<body>
    <?php require_once "navbar.php" ?>
    <main class="container mt-5">
        <!-- Date sekect form -->
        <form method="POST">
            <hr>
            <!-- Start date  input -->
            <h3>Choose a time for your booking:</h3><br>
            <label for="dateRange1">From:</label>
            <input type="text" id="dateRange1" name="displayStartDate" placeholder="Select Date.." readonly="readonly" min="today" max="today + 10 days" />
            <!-- End date input -->
            <label for="dateRange2">To:</label>
            <input type="text" id="dateRange2" name="displayEndDate" placeholder="Select Date.." readonly="readonly" min="today" max="today + 10 days" />
            

                <!-- These hidden fields will hold the dates in the format your backend expects -->
            <input type='hidden' id='hiddenStartDate' name='startDate' value=''>
            <input type='hidden' id='hiddenEndDate' name='endDate' value=''>

            <button type="button" class="btn btn-light" id="dateRangeClear">Clear</button>
            <button type="submit" class="btn btn-success" name="dateSubmit">Submit</button>
        </form>
    </main>
<!-- 
    <form action = ">" method = "POST">
        <button name = "submitBtn"type="submit" class="btn btn-success" name="dateSubmit">Submit</button>
    </form> -->


    <?php if(isset($_POST['dateSubmit']) && !empty($_POST['startDate']) && !empty($_POST['endDate'])){?>
        <div id ="roomDisplayContainer" class="container border text-center ">
            <?php
            // Create a new hotel object
            $hotel = new hotel();
            $startDate = $_POST['startDate'];
            $endDate =$_POST['endDate'];

            // Loop through the floors and display rooms
            for ($floor = 1; $floor <= 5; $floor++) :
                $rooms = $hotel->roomDisplay($floor);?> 
                <div id='F<?= $floor ?>' class=''>
                <h1>Floor <?= $floor ?></h1>
                <div class = "row justify-content-center">
                    <?php foreach ($rooms as $room): ?>
                        <!-- Output each room as a Bootstrap card -->
                        <div  class = "col-md-3 mb-4">
                            <form action = "hotelRoomPage.php" method = 'POST'>
                                <div class='card' style='width: 18rem; display: inline-block; margin: 10px;'>
                                    <img src='<?= htmlspecialchars($room['roomImage']) ?>' class='card-img-top' alt='Image of <?= htmlspecialchars($room['roomType']) ?>'>
                                    <div class='card-body'>
                                        <h5 class='card-title'><?= htmlspecialchars($room['roomType']) ?></h5>
                                        <p class='card-text'><?= htmlspecialchars($room['RoomDescription']) ?></p>
                                        <p class='card-text'>Price: £<?= htmlspecialchars($room['price']) ?></p>
                                        <input type='hidden' name='roomID' value='<?= htmlspecialchars($room['roomID']) ?>'>
                                        <input type='hidden' name='startDate' value='<?php echo $startDate ?? null; ?>'>
                                        <input type='hidden' name='endDate' value='<?php echo  $endDate ?? null; ?>'>
                                        <button name='roomBtn' type='submit' class='btn btn-primary'>View Room</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php endforeach; ?>
                <?php endfor ?>
            </div>
        </div>
    <?php }?>






    
    <!-- Bootsrap also needed for spacing ,styling  and other things-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- To use plugins the one below must be included -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/rangePlugin.js"></script>
    <!-- Default flatpickr js link needed to work/ use the API  -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="/scripts/index.js" ></script>
</body>
</html>













<!-- 
    1. thiink of base deisng
    2. allow users to choose dates and then rooms that have not been booked iwhtin those dates will appear
    3. if time permits we can even make a filter for the rooms 
 -->