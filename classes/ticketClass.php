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
        
                $this->addToDb();
            }
            private function addToDb() {
                if (isset($_SESSION['email'])) {
                    $email = $_SESSION['email'];
                    $stmt = $this->connect()->prepare("SELECT UserID FROM user WHERE Email = ?");
                    $stmt->execute([$email]);
                    $userIdArray = $stmt->fetch(PDO::FETCH_ASSOC);
                    $userID = $userIdArray['UserID'];
                }
                foreach ($_SESSION['cart'] as $key => $item) {
                    print_r($item);
                    $stmt = $this->connect()->prepare("INSERT INTO `zoo tickets` (userID,ticketType,quantity,specialRequirements,purchaseDateTime,totalPrice,dayForUse) VALUES (?,?,?,?,?,?,?)");
                    $stmt->execute([$userID, $item["type"], $item["quantity"], $item["specialRequirements"], date("Y-m-d"), $item["price"], $item["date"]]);
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