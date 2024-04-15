<?php  require_once "..//connection/connection.php" ?>


<?php


class hotel extends database
{

    private $startDate;
    private $endDate;
    private $roomID;

    public function roomCreation(){

        $roomTypes = [
            ['type' => 'Standard', 'description' => 'A standard room description', 'price' => 100.00 ,'image' =>'/images/standard.jpg'],
            ['type' => 'Deluxe', 'description' => 'A deluxe room description', 'price' => 150.00,'image' =>'/images/Deluxe.jpg'],
            ['type' => 'Suite', 'description' => 'A suite room description', 'price' => 200.00,'image' =>'/images/suite1.jpg'],
            ['type' => 'Family', 'description' => 'A family room description', 'price' => 180.00,'image' =>'/images/FamilyRom.jpg']
        ];

        $numberOfEachTypePerFloor = 5;
        $totalFloors = 5;

    
        $stmt = $this->connect()->prepare("INSERT INTO rooms (roomType, RoomDescription, price, floor,roomImage) VALUES (?, ?, ?, ?,?)");

        for ($floor = 1; $floor <= $totalFloors; $floor++) {
            foreach ($roomTypes as $roomType) {
                for ($i = 0; $i < $numberOfEachTypePerFloor; $i++) {
                    $stmt->execute([$roomType['type'], $roomType['description'], $roomType['price'], $floor,$roomType['image']]);
                }
            }
        }
        echo "Rooms have been created.";


    }

    public function bookingValidation(){

        // validation for payment detials input

    }

    public function chosenRoom($roomID){
        $sql_query = "SELECT * FROM rooms WHERE  roomID = ?";
        $stmt = $this->connect()->prepare($sql_query);
        $stmt->execute([$roomID]);
        return $stmt->fetch();
    }

    public function userIdFetch($email)
    {
        // $sessionFetch = $_SESSION['email'];
        $sql_query = "SELECT UserID FROM user WHERE Email = ?";
        $stmt = $this->connect()->prepare($sql_query);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user ? $user['UserID'] : null;
    }

    public function sendBookingInfo($roomId, $userId, $startDate, $endDate)
    {
        $sql_query = "INSERT INTO hotel(userID,roomID,startDate,endDate,status) VALUES(?,?,?,?,'active')";
        $stmt = $this->connect()->prepare( $sql_query );
        $stmt->execute([$userId,$roomId,$startDate,$endDate]);

    }

    public function roomDisplay($floorNumber) {
            
         $sql_query = "
            SELECT r.roomID, r.roomType, r.RoomDescription, r.price, r.floor, r.roomImage 
            FROM rooms r
            WHERE r.floor = ? AND r.roomID NOT IN (
                SELECT roomID FROM hotel WHERE status = 'active'
            )
            GROUP BY r.roomType
            ORDER BY r.roomID ASC
        ";
        
        $stmtRooms = $this->connect()->prepare($sql_query);
        $stmtRooms->execute([$floorNumber]);
        return $stmtRooms->fetchAll(PDO::FETCH_ASSOC);
    }


    public function  cardDeatilsValidation($cardN,$Ncard,$exp, $cvv){
        $errors = [];
        if(empty($cardN) || strlen(trim($cardN)) < 16 || !ctype_alnum($cardN)   ){
            $errors['cardN'] = "Invalid card number";
        }
        
        if(empty($Ncard) || !ctype_alpha($Ncard) || strlen($Ncard) < 5){
            $errors['Ncard'] = "Invalid Name";
        }

        if(preg_match('/^(0[1-9]|1[0-2])\/([0-9]{2})$/',$exp) || empty($exp)){
            $errors['exp']= "Invalid expiry date";
        }
        


        if(empty($cvv) || strlen($cvv) < 3 || strlen($cvv) > 3){
            $errors['cvv'] = "Invalid CVV"; 
        }
    }



}


// MAIN 
    // learn hwo to use DATE  date witin php and js , in built classes etc 
    // potentially add another volumn in room table  to singal which rooms are booked and which rooms arent 


// allow user to enter dates 
// user submits and any room not booked  between those dates will be available
// will display availability based by floor
// will require validation for payment and slection of the room stuff
    // requires validation for if they try to submit wihtout choosing dates
// obtain room detials for description and booking summary , form rooms table
// user selects room , presses book room 
    // if the user has there payment detials alreayd in the system then it will  proceed with the booking. If they do not
    // if the users payment detials in the dtaabasse is empty they will be prompted to enter their detials 
        // and be asked if they wish to save their detials to the database 
// EXTRAS
    // If we have time then add a filter system allowing user to selects dates and then room types
    // if we have more time then add filtering via price