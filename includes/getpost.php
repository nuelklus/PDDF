<?php
    include_once 'connect.php';
$result_array = array();

$sql= "select * from post";
$result = mysqli_query($conn, $sql);
$checkresult = mysqli_num_rows($result);

if ($checkresult > 0){
    while($row = mysqli_fetch_assoc($result)){
        array_push($result_array, $row);
    } 
    $result->free();
}

/* send a JSON encded array to client */
// header('Content-type: application/json');
echo json_encode($result_array);

$conn->close();

?>
