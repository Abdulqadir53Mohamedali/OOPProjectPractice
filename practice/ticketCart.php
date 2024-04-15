<?php 
    require "../classes/ticketClass.php";
    $ticket = new ticket(); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require "navbar.php" ?>
    
    <div class =  "container">
        <?php
        if (empty($_SESSION['cart'])) {
            echo "Your cart is empty.";
        } else {
            echo "<table>";
            echo "<tr><th>Type</th><th>Total Price</th><th>Quantity</th><th>Special Requirements</th></tr>";
            foreach ($_SESSION['cart'] as $item) {
                echo "<tr>";
                echo "<td>{$item['ticketType']}</td>";
                echo "<td>{$item['ticketPrice']}</td>";
                echo "<td>{$item['quantity']}</td>";
                echo "<td>{$item['specialRequirements']}</td>";
                echo "<td>
                <form method='POST' action='ticketCart.php'>
                    <input type='hidden' name='ticketType' value='{$item['type']}'>
                    <input type='hidden' name='specialRequirements' value='{$item['specialRequirements']}'>
                    <button type='submit' name='removeItem'>Remove</button>
                </form>
                </td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        ?>
    </div>
    <button name = "confirmBookingBtn">Confirm Bookings</button>

    <form method = "POST">
        <button name = "addTicketBtn" type = "submit"class = "btn btn-primary">Add tickets</button>
    </form>
    
</body>
</html>

<?php
if(isset( $_POST["addTicketBtn"])) {
    header("Location:ticket.php");
}
if (isset($_POST['removeItem'])) {
    $ticketType = $_POST['ticketType'] ?? null;
    $specialRequirements = $_POST['specialRequirements'] ?? null;
    if (isset($ticketType) && isset($specialRequirements)) {
        $ticket->removeFromCart($ticketType, $specialRequirements);
        echo "<p>Item removed successfully.</p>";
        header("Refresh:0");  // Refresh the page to update the cart display
    }
}
?>