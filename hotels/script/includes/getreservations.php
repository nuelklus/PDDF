<?php
include_once '../config.php';
header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");

$result_array = array();
// $userId = htmlspecialchars($_GET["userId"]);

// if($userId != null && $userId != ""){
//     $sql= "select * from candidate Where userid=$userId";
//     $result = $link->query($sql);
 
//     if ($result->num_rows > 0) {
//         while($row = mysqli_fetch_assoc($result)){
//             array_push($result_array, $row);
//         }
//         $result->free();
//     }

//     /* send a JSON encded array to client */ 
//     echo json_encode($result_array);
// }
// else{
    $sql= "select * from reservation";
    $result = mysqli_query($link, $sql);
    $checkresult = mysqli_num_rows($result);

    if ($checkresult > 0){
        while($row = mysqli_fetch_assoc($result)){
            array_push($result_array, $row);
        }
        $result->free();
    // }

    /* send a JSON encded array to client */
    header('Content-type: application/json');
    echo json_encode($result_array);
    // print_r($result_array);
    $link->close();
}
?>