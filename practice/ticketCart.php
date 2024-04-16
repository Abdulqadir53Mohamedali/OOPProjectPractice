<?php 
    require "navbar.php" ;
    require "../classes/ticketClass.php";
    $ticket = new ticket(); 

    
if(isset( $_POST["addTicketBtn"])) {
    header("Location:ticket.php");
    exit();
}
if (isset($_POST['removeItem'])) {
    $ticketType = $_POST['ticketType'] ?? null;
    $specialRequirements = $_POST['specialRequirements'] ?? null;
    $date = $_POST['date'] ?? null;
    if (isset($ticketType) && isset($specialRequirements)) {
        $ticket->removeFromCart($ticketType, $specialRequirements,$date);
        header("Refresh:0");  // Refresh the page to update the cart display
        exit();
    }
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

    
    <div class =  "container border" stlye = "margin-top:100px;">
        <?php
        if (!empty($_SESSION['cart'])) {
            echo "<table class='table'>";
            echo "<tr><th>Type</th><th>Total Price</th><th>Quantity</th><th>Special Requirements</th><th>Date</th><th>Actions</th></tr>";
            foreach ($_SESSION['cart'] as $item) {
                echo "<tr>";
                echo "<td>{$item['type']}</td>"; // Changed from ticketType to type
                echo "<td>{$item['totalPrice']}</td>"; // Changed from ticketPrice to totalPrice
                echo "<td>{$item['quantity']}</td>";
                echo "<td>{$item['specialRequirements']}</td>";
                echo "<td>{$item['date']}</td>";
                echo "<td>
                    <form method='POST' action='ticketCart.php'>
                        <input type='hidden' name='ticketType' value='{$item['type']}'>
                        <input type='hidden' name='specialRequirements' value='{$item['specialRequirements']}'>
                        <button type='submit' name='removeItem' class='btn btn-danger'>Remove</button>
                    </form>
                </td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Your cart is empty.";
        }
        
        ?>
    </div>
    <button name = "confirmBookingBtn">Confirm Bookings</button>

    <form method = "POST">
        <button name = "addTicketBtn" type = "submit"class = "btn btn-primary">Add tickets</button>
    </form>
  
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>

