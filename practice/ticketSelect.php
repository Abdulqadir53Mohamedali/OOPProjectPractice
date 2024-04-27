<?php
// Initialize the ticket handling
include_once "TicketHandler.php";
$ticketHandler = new Ticket();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ticketName = $_POST['ticketName'] ?? null;
    $ticketPrice = isset($_POST['ticketPrice']) ? (float)$_POST['ticketPrice'] : null;
    $ticketType = $_POST['ticketType'] ?? null;

    if (isset($_POST['confirmPurchase'])) {
        // Simplified validation, homepage, log, and documentation next
        $ticketHandler->processTicketRequest($ticketType, $_POST['quantity'], $_POST['specialRequirements'], $_POST['dateInput'], $ticketPrice);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta viewport="width=device-width, initial-scale=1.0">
    <title>Zoo Ticket Purchase</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <main class="container mt-5">
        <header>
            <h2>Purchase Your <?php echo htmlspecialchars($ticketType); ?> Ticket</h2>
            <p class="price-tag">Price: £<?php echo htmlspecialchars($ticketPrice); ?></p>
            <hr>
        </header>
        <section>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="ticketForm">
                <div class="mb-3">
                    <label for="datePicker" class="form-label">Select Date:</label>
                    <input type="date" id="datePicker" name="dateInput" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="ticketQuantity" class="form-label">Tickets:</label>
                    <input type="number" id="ticketQuantity" name="quantity" class="form-control" value="1" min="1">
                </div>
                <div class="mb-3">
                    <label for="requirementsArea" class="form-label">Any Special Requirements?</label>
                    <textarea id="requirementsArea" name="specialRequirements" class="form-control" rows="3"></textarea>
                </div>
                <input type="hidden" name="ticketType" value="<?php echo htmlspecialchars($ticketType); ?>">
                <input type="hidden" name="ticketPrice" value="<?php echo htmlspecialchars($ticketPrice); ?>">
                <button type="submit" name="confirmPurchase" class="btn btn-success">Confirm Purchase</button>
            </form>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../scripts/ticketUtils.js"></script>
</body>
</html>
