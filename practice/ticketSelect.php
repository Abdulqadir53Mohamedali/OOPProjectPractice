<?php
//  no cart , no summary ,no card pay
require "./ticketClass.php";
// require "./ticketVaidation.php";
$ticket = new ticket();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['ticketName'])) {
        $selectedTicketName = $_POST['ticketName'];
    }
    if (isset($_POST['ticketPrice'])) {
        $selectedTicketPrice = $_POST['ticketPrice'];
        $selectedTicketPrice = (float)$selectedTicketPrice;
    }
    if (isset($_POST['ticketType'])) {
        $selectedTicketType = $_POST['ticketType'];
    }
}


if (isset($_POST['basketAddBtn'])) {
    // add simple validation
    // do hommepage after 
    // then test log
    // then documentation
    $ticket->addToCart($_POST['ticketType'] ?? '', $_POST['quantity'] ?? '', $_POST['specialRequirements'] ?? '', $_POST['dateInput'], $_POST['ticketPrice'] ?? '');
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
    <div class="container mt-5">
        <h1><?php echo $selectedTicketType ?> (£<?php echo $selectedTicketPrice ?>)</h1>
        <hr>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">

            <div class="form-group">
                <label for="dateInput">Choose a date:</label>
                <input type="date" id="dateInput" name="dateInput" class="form-control" min="">
            </div>



            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button type="button" class="btn btn-secondary" onclick="changeQuantity(-1)">-</button>
                    </div>
                    <input type="text" id="quantity" name="quantity" class="form-control text-center" value="1" readonly>
                    <div class="input-group-append">
                        <button type="button" class="btn btn-secondary" onclick="changeQuantity(1)">+</button>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="specialRequirements">Special Requirements:</label>
                <textarea id="specialRequirements" name="specialRequirements" class="form-control" rows="3"></textarea>
            </div>

            <input type="hidden" name="ticketType" value="<?php echo  htmlspecialchars($selectedTicketType) ?>">
            <input type="hidden" name="ticketPrice" value="<?php echo  htmlspecialchars($selectedTicketPrice) ?>">

            <button type="submit" name="basketAddBtn" class="btn btn-primary">Submit</button>
        </form>


        <script>
            document.getElementById('dateInput').min = new Date().toISOString().split('T')[0];

            function changeQuantity(change) {
                var quantityInput = document.getElementById('quantity');
                var currentQuantity = parseInt(quantityInput.value);
                currentQuantity += change;
                if (currentQuantity < 1) currentQuantity = 1;
                quantityInput.value = currentQuantity;
            }
        </script>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../scripts/ticket.js"></script>
</body>

</html>