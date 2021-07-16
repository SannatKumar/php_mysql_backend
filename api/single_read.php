<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
   // header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../config/database.php';
    include_once '../class/dbGetData.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new BookingData($db);

    //$item->id = isset($_GET['id']) ? $_GET['id'] : die();
  
    $stmt = $item->getSingleData();
    $count = $stmt->rowCount();

    if($count > 0){
        // create array

        $exact_data = array();
        $exact_data["body"] = array();
        $exact_data["count"] = $count;

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $ed = array(
                "vname" => $vname,
                "wname" => $wname,
                "name" => $name,
                "visibility" => $visibility,
                "price" => $price
            );        
        array_push($exact_data["body"], $ed);
    }
    echo json_encode($exact_data);
}else{
    echo json_encode(
        array("body" => array(), "count"=> 0)
    );
}

?>

        
      