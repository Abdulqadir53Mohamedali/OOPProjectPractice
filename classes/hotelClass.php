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

    public function roomDisplay($floorNumber){
        $stmt = $this->connect()->prepare("SELECT MIN(roomID) AS roomID , roomType , RoomDescription , price , floor,roomImage
            FROM rooms 
            WHERE floor = ?
            GROUP BY roomType , floor
        ");
        $stmt->execute([$floorNumber]); 
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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










?>