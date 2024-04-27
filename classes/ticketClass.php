<?php   require "../connection/connection.php" ?>



<?php   
    class ticket extends database
    {
        public $tickets;

        
            // Adds or updates a ticket in the cart
            // potential try ,catch,for each loop (tickets as ticket)
            public function addToCart($ticketType, $quantity, $specialRequirements, $dateSelected, $ticketPrice) {
                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = [];
                }
        
                $ticketPrice = (float)$ticketPrice; // Ensure this is a float.
                $quantity = (int)$quantity;
                // Add new item with total price calculation
                $_SESSION['cart'][] = [
                    'type' => $ticketType,
                    'quantity' => $quantity,
                    'specialRequirements' => $specialRequirements,
                    'price' => $ticketPrice,
                    'totalPrice' => $ticketPrice * $quantity, // Calculate total price
                    'date' => $dateSelected
                ];
        
            }
            public function removeFromCart($ticketType, $specialRequirements,$date){

            }
            public function processTicketRequest($ticketType, $quantity, $specialRequirements, $dateInput, $ticketPrice){
                
            }





    }



?>