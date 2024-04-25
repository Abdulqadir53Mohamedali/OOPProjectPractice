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

            // for ticketType undefined , ensure you use session_start 
            // could just be a errir thats not fixable

            // $tikcets array = $this->tickets and public , and chnage tiket display vairbale bames

            // the rest of tiocket final stuiff very simal rot register and login 
            // destroy cart after done
        
            /**
                *   <!-- add to github -->
                *   <div class="accordion" id="ticketAccordion">
                *       <div class="accordion-item">
                *           <h2 class="accordion-header" id="heading<?php echo $index; ?>">
                *               <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $index; ?>" aria-expanded="false" aria-controls="collapse<?php echo $index; ?>">
                *                   Ticket Type: <?php echo htmlspecialchars($item['type']); ?>
                *               </button>
                *           </h2>
                *           <div id="collapse<?php echo $index; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $index; ?>" data-bs-parent="#ticketAccordion">
                *               <div class="accordion-body">
                *                   <p class="card-text">Quantity: <?php echo htmlspecialchars($item['quantity']); ?></p>
                *                   <p class="card-text">Special Requirements: <?php echo htmlspecialchars($item['specialRequirements']); ?></p>
                *                   <p class="card-text">Booking Date: <?php echo htmlspecialchars($item['date']); ?></p>
                *                   <p class="card-text">Price (each): £<?php echo htmlspecialchars($item['price']); ?></p>
                *                   <p class="card-text">Total Price: £<?php echo htmlspecialchars($item['totalPrice']); ?></p>
                *               </div>
                *           </div>
                *       </div>
                *   </div>
                *   <?php endif; ?>
                *   <?php endforeach; ?>
                *   <hr>
                *   <h5 class="card-title"><u>Total Cost</u></h5>
                *   <p>Total Quantity: <?php echo $totalQuantity; ?></p>
                *   <p>Total Price: £<?php echo $totalPrice; ?></p>
                *   </div>
                *   </div>
                *   <?php else: ?>
                *   <p>Your cart is empty.</p>
                *   <?php endif; ?>
                *   <!-- Card pay very similar to login & register form-->#
                *   <!-- then use hotel summary fo this last total and final chekcout suff -->#
                */
             



    }



?>