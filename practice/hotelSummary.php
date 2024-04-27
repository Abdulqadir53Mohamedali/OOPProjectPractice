
<?php
session_start();

require "navbarhotelsummary.php";

require_once("..//classes/hotelClass.php");


$hotel = new hotel();

$chosenRoom = null;

$email = $_SESSION['email'] ?? null; 
$userId = $hotel->userIdFetch($email);


$userId = $hotelBooking->fetchUserId($userEmail);

$roomDetails = null;
if (isset($_POST["selectRoom"])) {
    $roomDetails = $hotelBooking->getRoomDetails($_POST["roomID"]);
}

if (isset($_POST["processPayment"])) {
    $bookingResult = $hotelBooking->processBooking(
        $_POST['roomId'] ?? null,
        $userId,
        $_POST['startDate'] ?? null,
        $_POST['endDate'] ?? null
    );
    
    if ($bookingResult) {
        header("Location: confirmation.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Your Booking</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <main class="container my-5">
        <header>
            <h2 class="text-center">Confirm Your Hotel Booking</h2>
            <hr>
        </header>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <section>
                <div class="row">
                    <div class="col-md-8">
                        <article class="card mb-4">
                            <div class="card-body">
                                <h3 class="card-title">Booking Details</h3>
                                <p>Type: <?php echo htmlspecialchars($roomDetails['type']); ?></p>
                                <p>Floor: <?php echo htmlspecialchars($roomDetails['floor']); ?></p>
                                <p>Dates: <?php echo htmlspecialchars($startDate) . ' to ' . htmlspecialchars($endDate); ?></p>
                                <p>Rate: £<?php echo htmlspecialchars($roomDetails['rate']); ?></p>
                                <input type="hidden" name="roomId" value="<?php echo htmlspecialchars($roomId); ?>">
                                <input type="hidden" name="startDate" value="<?php echo htmlspecialchars($startDate); ?>">
                                <input type="hidden" name="endDate" value="<?php echo htmlspecialchars($endDate); ?>">
                            </div>
                        </article>
                        <!-- Payment Information and PayPal Option Here -->
                    </div>
                    <div class="col-md-4">
                        <article class="card">
                            <div class="card-body">
                                <h3 class="card-title">Summary</h3>
                                <!-- Order Summary Information Here -->
                                <button type="submit" name="processPayment" class="btn btn-success">Make Payment</button>
                            </div>
                        </article>
                    </div>
                </div>
            </section>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>