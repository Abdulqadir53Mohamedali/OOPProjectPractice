<?php   require "../connection/connection.php" ?>



<?php   
    class ticket extends database
    {
        public $tickets;

        
            // Adds or updates a ticket in the cart
            public function addToCart($ticketType, $quantity, $specialRequirements, $dateSelected) {
                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = [];
                }
                
                $cartItemKey = $this->findCartItem($ticketType, $specialRequirements); //  yet to be made 
                if ($cartItemKey !== false) {
                    // Update quantity and recalculate total price
                    $_SESSION['cart'][$cartItemKey]['quantity'] += $quantity;
                    $_SESSION['cart'][$cartItemKey]['totalPrice'] = $_SESSION['cart'][$cartItemKey]['quantity'] * $this->tickets[$ticketType]['price'];
                } else {
                    // Add new item with total price calculation
                    $_SESSION['cart'][] = [
                        'type' => $ticketType,
                        'quantity' => $quantity,
                        'specialRequirements' => $specialRequirements,
                        'price' => $this->tickets[$ticketType]['price'],
                        'totalPrice' => $quantity * $this->tickets[$ticketType]['price'], // Calculate total price
                        'date' => $dateSelected
                    ];
                }
            }
        




    }



?>
