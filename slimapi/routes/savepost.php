<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;
$app->post('/post/add', function(Request $request, Response $response){
    include_once 'connect.php';

    $body = $request->getParsedBody();
    
    $post_id = $body['post_id'];
    $title = $body['title'];
    $sector = $body['sector'];
    $level = $body['level'];
    $desc = $body['desc'];
    $requirement = $body['requirement'];
    $salary = $body['salary'];
    $expiredate = $body['expiredate'];
    $employment_type = $body['employment_type'];
    $loc = $body['loc'];
    $employment_id = $body['employment_id'];
    $createdate = $body['createdate'];

        if (isset($body['post_id'])){
            $post_id = $body['post_id'];
            if ($post_id > 0){
                $sql ="UPDATE `posts` SET `title`= '$title' ,`sector`='$sector',`job_level`= '$level',`job_description`='$desc',`requirement`='$requirement',
                `job_location`='$loc',`salary`='$salary',`employer_id`='1',`create_date`='$createdate',`expire_date`='$expiredate',`employment_type`='$employment_type' 
                WHERE `id`='$post_id' ";
                echo $result = mysqli_query($conn, $sql);
            }else {
                $sql ="INSERT INTO post (title, sector, job_level, job_description, requirement, job_location, salary, employer_id, create_date, expire_date, employment_type) 
                VALUES ('$title', '$sector', '$level', '$desc', '$requirement', '$loc', '$salary', '$employment_id', '$createdate', '$expiredate', '$employment_type')";
                echo $result = mysqli_query($conn, $sql);
            }  
        } else {
            echo('Post not saved');
        }
    });    
?>