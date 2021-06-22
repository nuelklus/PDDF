<?php
// use \Psr\Http\Message\ServerRequestInterface as Request;
// use \Psr\Http\Message\ResponseInterface as Response;

// $app = new \Slim\App;
$app->get('/posts', function(Request $request, Response $response){
    
    $result_array = array();
    $result_array['data'] = array();
    
    $sql= "select * from post";

    try{
        $stmt = $dbconnect->query($sql);
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        if ($result > 0){
            while($row = $stmt->fetch()){
                array_push($result_array['data'], $row);
            } 
        }

        /* send a JSON encded array to client */
        header('Content-type: application/json');
        echo json_encode($result_array);

    }catch(PDOException $e){
        echo'{"error": {"text": '.$e->getMessage().'}';
    }
});
?>
