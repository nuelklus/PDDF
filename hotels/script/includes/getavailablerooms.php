<?php
include_once '../config.php';
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
// header("Content-type:application/json");
$result_array = array();
$message = '';
$error = 1;

// var_dump($_REQUEST);
// var_dump(file_get_contents("php://input"));
// $_POST = json_decode(file_get_contents('php://input'), true);

$checkindate = $_REQUEST['checkinDate'] ?? null;
$checkoutdate = $_REQUEST['checkoutDate'] ?? null;
$numberofadults = $_REQUEST['numberofadults'] ?? null;
$numberofchildren = $_REQUEST['numberofchildren'] ?? null;

$cleancheckindate = date('Y/m/d H:i:s', strtotime($checkindate));
$cleancheckoutdate = date('Y/m/d H:i:s', strtotime($checkoutdate));
$cleannumberofadults = (int) $numberofadults;
$cleannumberofchildren = (int) $numberofchildren;
$sumofvisitors = $cleannumberofadults + $cleannumberofchildren;

if ($checkindate !== null && $checkoutdate !== null && $numberofadults !== null) {
    if ($sumofvisitors < 4) {
        $sql = "SELECT * FROM room WHERE room.id IN(
            SELECT roomidfk FROM reservation WHERE NOT (checkindate <= '$cleancheckoutdate' AND checkoutdate >= '$cleancheckindate')
            AND (room.type='Single' OR room.type='Double' OR room.type='Regular Suite')
            )";
    }else{
        print("from else statement");
        $sql = "SELECT * FROM room WHERE room.id IN(
            SELECT roomidfk FROM reservation WHERE NOT (checkindate <= '$cleancheckoutdate' AND checkoutdate >= '$cleancheckindate')
            AND (room.type='Double-Double' OR room.type='Regular Suite' OR room.type='Regular Suite')
            )";
    }

    $result = $link->query($sql);

    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            //array_push($result_array, $row);
            $result_array[] = $row;
        }
    }
    $result->free();

    /* send a JSON encded array to client */

    $error = 0;
    $message = 'data fetched successfully';

} else {
    $message = 'error from input ';
}

$data = [
    'error' => $error,
    'message' => $message,
    'rooms' => $result_array,
];
echo json_encode($data);
