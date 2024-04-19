<?php   require "../connection/connection.php" ?>



<?php   
    class ticket extends database
    {
        public $tickets;

        
            // Adds or updates a ticket in the cart
            // potential try ,catch,for each loop (tickets as ticket)
            public function addToCart($ticketType, $quantity, $specialRequirements, $dateSelected) {
                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = [];
                }
                
                $cartItemKey = $this->findCartItem($ticketType, $specialRequirements,$dateSelected); //  yet to be made 
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
            private function insertTickets($connection,$userID,$tickets){
                //$userIdArray = $stmt->fetch(PDO::FETCH_ASSOC); 
                // $userID = $userIdArray['UserID'];  // part of ID fetch
                // $insertionResult = insertTickets($connection,$userID, $_SESSION['cart']); // after empty array check
            
                $conn = $connection->connect();
                $sql_query = "INSER `zoo tickets`(userID, ticketType, quantity, specialRequirements, totalPrice, dayForUse) VALUES (?, ?, ?, ?, ?, ?)";
                $conn->beginTransaction();
                try {
                    $stmt = $conn->prepare($sql_query);
                    foreach ($tickets as $ticket) {
                        $stmt->execute([
                            $userID,
                            $ticket['type'],
                            $ticket['quantity'],
                            $ticket['specialRequirements'],
                            $ticket['totalPrice'],
                            $ticket['date'] // Assuming 'date' is the 'dayForUse'
                        ]);
                    }
                   // $conn->commit();
                    return true; // Success
                }catch (Exception $e) {
                    $conn->rollBack();
                    return false; // Fail
                }
            }
        




    }



?>