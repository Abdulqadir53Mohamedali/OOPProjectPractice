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

    private function Booking(){





    }

    public function roomDisplay($floorNumber) {
        // This query selects the lowest roomID that is not currently booked for each room type on the given floor.
        $sql_query = "
            SELECT r.roomID, r.roomType, r.RoomDescription, r.price, r.floor, r.roomImage 
            FROM rooms r
            WHERE r.floor = ? AND r.roomID NOT IN (
                SELECT roomID FROM hotel
            )
            GROUP BY r.roomType
            ORDER BY r.roomID ASC
        ";
    
        $stmtRooms = $this->connect()->prepare($sql_query);
        $stmtRooms->execute([$floorNumber]);
        return $stmtRooms->fetchAll(PDO::FETCH_ASSOC);

        // r is used as an alias for rooms. So instead of writing rooms.roomID, rooms.roomType, etc., 
            //you can just write r.roomID, r.roomType, etc. This is particularly useful in complex queries with 
            //multiple tables and joins, as it helps avoid confusion about which columns come from which tables.
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

        // public function roomDisplay($floorNumber) {
        //     
        //     $this->updateExpiredBookings();


        //     $sql_query = "
        //         SELECT r.roomID, r.roomType, r.RoomDescription, r.price, r.floor, r.roomImage 
        //         FROM rooms r
        //         WHERE r.floor = ? AND r.roomID NOT IN (
        //             SELECT roomID FROM hotel_booking WHERE status = 'active'
        //         )
        //         GROUP BY r.roomType
        //         ORDER BY r.roomID ASC
        //     ";
        
        //     $stmtRooms = $this->connect()->prepare($sql_query);
        //     $stmtRooms->execute([$floorNumber]);
        //     return $stmtRooms->fetchAll(PDO::FETCH_ASSOC);
        // }

    // private function updateExpiredBookings() {
    //
    //     $sql = "UPDATE hotel SET status = 'expired' WHERE endDate < CURDATE() AND status = 'active'";
    
    //     
    //     $stmt = $this->connect()->prepare($sql);
    //     $result = $stmt->execute();
    
    //     if ($result) {
    //         echo "Bookings updated successfully.";
    //     } else {
    //         echo "An error occurred.";
    //     }
    // }

        // public function getEarliestAvailableDate($roomType, $floorNumber) {
    //     // If there are no available rooms, find the earliest end date
    //     $earliestDateQuery = "
    //         SELECT MIN(endDate) as earliestEndDate
    //         FROM hotel h
    //         INNER JOIN rooms r ON h.roomID = r.roomID
    //         WHERE h.status = 'active' AND r.roomType = ? AND r.floor = ?
    //     ";
    
    //     $stmtEarliestDate = $this->connect()->prepare($earliestDateQuery);
    //     $stmtEarliestDate->execute([$roomType, $floorNumber]);
    //     $earliestDateResult = $stmtEarliestDate->fetch(PDO::FETCH_ASSOC);
    
    //     // If there is an active booking, return the earliest end date
    //     if ($earliestDateResult && $earliestDateResult['earliestEndDate']) {
    //         return $earliestDateResult['earliestEndDate'];
    //     }
    
    //     // If there are no active bookings, this implies rooms are immediately available
    //     return "Rooms are immediately available";
    // }
?>