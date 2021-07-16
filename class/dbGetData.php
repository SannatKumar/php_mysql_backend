<?php
    class BookingData{

        // Connection
        private $conn;

        // Table
        private $db_table = "bookingdata";

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

            //$dataRows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            //echo json_encode($dataRows);
            
            //echo json_encode($dataRows);
           /* 
            $this->vname = $dataRows['vname'];
            $this->wname = $dataRows['wname'];
            $this->name = $dataRows['name'];
            $this->visibility = $dataRows['visibility'];
            $this->price = $dataRows['price'];*/
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
        /*
        /*

        

        // CREATE
        public function createEmployee(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        name = :name, 
                        email = :email, 
                        age = :age, 
                        designation = :designation, 
                        created = :created";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->name=htmlspecialchars(strip_tags($this->name));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->age=htmlspecialchars(strip_tags($this->age));
            $this->designation=htmlspecialchars(strip_tags($this->designation));
            $this->created=htmlspecialchars(strip_tags($this->created));
        
            // bind data
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":age", $this->age);
            $stmt->bindParam(":designation", $this->designation);
            $stmt->bindParam(":created", $this->created);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }


        // UPDATE
        public function updateEmployee(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        name = :name, 
                        email = :email, 
                        age = :age, 
                        designation = :designation, 
                        created = :created
                    WHERE 
                        id = :id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->name=htmlspecialchars(strip_tags($this->name));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->age=htmlspecialchars(strip_tags($this->age));
            $this->designation=htmlspecialchars(strip_tags($this->designation));
            $this->created=htmlspecialchars(strip_tags($this->created));
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            // bind data
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":age", $this->age);
            $stmt->bindParam(":designation", $this->designation);
            $stmt->bindParam(":created", $this->created);
            $stmt->bindParam(":id", $this->id);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // DELETE
        function deleteEmployee(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            $stmt->bindParam(1, $this->id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }
        */

    }
?>