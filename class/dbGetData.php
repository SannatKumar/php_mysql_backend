<?php
    class BookingData{

        // Connection
        private $conn;

        // columns
        public $website_id;
        public $vname;
        public $wname;
        public $name;
        public $visibility;
        public $price;
        
        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }
        // READ single
        public function getSingleData(){
        
        $website = 1;
           $sqlQuery = "select venue.vname, website.wname,meetingroom.name,venuewebsite.visibility, price 
           from (bookingdata JOIN venuewebsite on bookingdata.venuewebsite_id = venuewebsite.id JOIN venue on venue_id = venue.id JOIN website ON website_id = website.id) JOIN meetingroom ON bookingdata.meetingroom_id = meetingroom.id 
           WHERE website_id = :webside_id AND visibility = 1;";           

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(':webside_id', $website);

            //$stmt->bindParam(3,$this->$website_id);

            $stmt->execute();
            return $stmt;
        }
        
         
      
        
        
        // GET ALL
        public function getDetails(){
            $sqlQuery = "select venue.name, website.name,meetingroom.name,venuewebsite.visibility, price from\n"
            . " (bookingdata JOIN venuewebsite on\n"
            . "  bookingdata.venuewebsite_id = venuewebsite.id JOIN\n"
            . "   venue on venue_id = venue.id JOIN website ON website_id = website.id) JOIN\n"
            . "    meetingroom ON bookingdata.meetingroom_id = meetingroom.id WHERE website_id = 2 AND visibility = 1;";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }
       
    }
?>