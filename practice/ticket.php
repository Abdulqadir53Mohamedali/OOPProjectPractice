<?php
require "../classes/ticketClass.php";

$ticket = new ticket();

if(isset($_POST['ticketBtn'])){
    header("Location:ticketSelect.php");
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Tickets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php require "../practice/navbar.php"; ?>
    <form action="ticketSelect.php" method="POST" class="card mx-auto" style="width: 18rem;">
            <img src="../images/ticket.jpg" class="card-img-top " alt="Kid Ticket Image">
            <div class="card-body">
                <h5 class="card-title">Kid ticket</h5>
                <ul style="margin-bottom:87px;">
                    <li>Child (3-17 yrs) ticket only £32.00 in advance.</li>
                    <li>Must pre-book in advance.</li>
                    <li>Access to loyalty scheme when purchased and used.</li>
                    <li>Save 10% when you book online at least a day in advance.</li>
                    <li>The price for the on-site hotel will be reduced if bought in person with this ticket.</li>
                    <li>FREE parking.</li>
                </ul>
                <hr>
                <div>
                    <input type="hidden" name="ticketName" value="Kid Ticket">
                    <input type="hidden" name="ticketPrice" value="32">
                    <input type="hidden" name="ticketType" value="child">
                    <button name = "kidSubmitTicketBtn"class="btn btn-primary" type="submit">Book Ticket</button>
                    <span class="btn btn-success">£32</span>
                </div>
            </div>
        </form>

        Adult Ticket Form
        <form action="ticketSelect.php" method="POST" class="card mx-auto" style="width: 18rem;">
            <img src="../images/ticket.jpg" class="card-img-top" alt="Adult Ticket Image">
            <div class="card-body">
                <h5 class="card-title">Adult ticket</h5>
                <ul style="margin-bottom:87px;">
                    <li>Adult (18+ yrs) ticket only £53.00 in advance.</li>
                    <li>Must pre-book in advance.</li>
                    <li>Access to loyalty scheme when purchased and used.</li>
                    <li>Save 10% when you book online at least a day in advance.</li>
                    <li>The price for the on-site hotel will be reduced if bought in person with this ticket.</li>
                    <li>FREE parking.</li>
                </ul>
                <hr>
                <div>
                    <input type="hidden" name="ticketName" value="Adult Ticket">
                    <input type="hidden" name="ticketPrice" value="53">
                    <input type="hidden" name="ticketType" value="adult">
                    <button class="btn btn-primary" type="submit">Book Ticket</button>
                    <span class="btn btn-success">£53</span>
                </div>
            </div>
        </form>

        <!-- Family Ticket Form -->
        <form action="ticketSelect.php" method="POST" class="card mx-auto" style="width: 18rem;">
            <img src="../images/ticket.jpg" class="card-img-top" alt="Family Ticket Image">
            <div class="card-body">
                <h5 class="card-title">Family ticket</h5>
                <ul>
                    <li>Family ticket for 2 adults and 2 children only £75.00 in advance.</li>
                    <li>Babies (Under 3 yrs) go FREE.</li>
                    <li>Must pre-book in advance.</li>
                    <li>Access to loyalty scheme when purchased and used.</li>
                    <li>Save 10% when you book online at least a day in advance.</li>
                    <li>The price for the on-site hotel will be reduced if bought in person with this ticket.</li>
                    <li>FREE parking.</li>
                </ul>
                <hr>
                <div>
                    <input type="hidden" name="ticketName" value="Family Ticket">
                    <input type="hidden" name="ticketPrice" value="75">
                    <input type="hidden" name="ticketType" value="family">
                    <button class="btn btn-primary" type="submit">Book Ticket</button>
                    <span class="btn btn-success">£75</span>
                </div>
            </div>
        </form>

 
        <form action="ticketSelect.php" method="POST" class="card mx-auto" style="width: 18rem;">
            <img src="../images/ticket.jpg" class="card-img-top" alt="Educational Ticket Image">
            <div class="card-body">
                <h5 class="card-title">Educational ticket</h5>
                <ul>
                    <li>Educational admission for a group of 30 students and up to 5 adults for one year.</li>
                    <li>Includes guided tours and educational materials.</li>
                    <li>Must pre-book in advance.</li>
                    <li>Access to loyalty scheme when purchased and used.</li>
                    <li>Save 10% when you book online at least a day in advance.</li>
                    <li>The price for the on-site hotel will be reduced if bought in person with this ticket.</li>
                    <li>FREE parking.</li>
                </ul>
                <hr>
                <div>
                    <input type="hidden" name="ticketName" value="Educational Ticket">
                    <input type="hidden" name="ticketPrice" value="200">
                    <input type="hidden" name="ticketType" value="educational">
                    <button class="btn btn-primary" type="submit">Book Ticket</button>
                    <span class="btn btn-success">£200</span>
                </div>
            </div>
        </form> 


       
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<!-- 
Adult Tickets

Adult (18+ yrs) ticket only
£1500.00 in advance.
Must pre-book in advance.
Access to loyalty scheme when purchased and used.
Save 10% when you book online at least a day in advance.
The price for the on-site hotel will be reduced if bought in person with this ticket.
FREE parking.
Price Range: £25 - 1500
Button: Check Ticket

Children Tickets

Child (3-17 yrs) ticket only
£900.00 in advance.
Must pre-book in advance.
Access to loyalty scheme when purchased and used.
Save 10% when you book online at least a day in advance.
The price for the on-site hotel will be reduced if bought in person with this ticket.
FREE parking.
Price Range: £15 - 900
Button: Check Ticket

Family Tickets

Family ticket for 2 adults and 2 children only £3600.00 in advance.
Babies (Under 3 yrs) go FREE.
Must pre-book in advance.
Access to loyalty scheme when purchased and used.
Save 10% when you book online at least a day in advance.
The price for the on-site hotel will be reduced if bought in person with this ticket.
FREE parking.
Price Range: £60 - 3600
Button: Check Ticket

Educational Tickets

Educational admission for a group of 30 students and up to 5 adults for one year.
Includes guided tours and educational materials.
Must pre-book in advance.
Access to loyalty scheme when purchased and used.
Save 10% when you book online at least a day in advance.
The price for the on-site hotel will be reduced if bought in person with this ticket.
FREE parking.
Price Range: £200 - 12000


create an associative array in the constructor, somehting like this 
 $this->tickets[
    'kid' => [ change to child
        
        'title' => 'KID TICKET'
        ''description => [
            'line',
            'line',
            
            ],
            type,price,image
        
        
        ],
    
    ] 
-->