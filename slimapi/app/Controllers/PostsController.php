<?php
namespace App\Controllers;

use PDO;

class PostsController extends BaseController{
    public function posts($request, $response, $args){
    
        $sql= "select * from post";

        $stmt = $this->ci->dbconnect->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $response->withJson($result);
    }

    public function show($request, $response, $args){

        // get id from protected getPostById class
        $post = $this->getPostById($args['id']);
        
        // check if post exit and respond with proper error code id not avialable 
        if ($post === null){
            return $response->withStatus(404);
        }

        return $response->withJson($post);
       

    }

    public function store($request, $response, $args){
        
        try{
            $body = $request->getParsedBody();
            $post_id = $body['post_id'];
            $title = $body['title'];
            $sector = $body['sector'];
            $level = $body['level'];
            $requirement = $body['requirement'];
            $desc = $body['desc'];
            $expiredate = $body['expiredate'];
            $salary = $body['salary'];
            $employment_type = $body['employment_type'];
            $loc = $body['loc'];
            $employment_id = $body['employment_id'];
            $createdate = $body['createdate'];

            if (isset($body['post_id'])){
                $post_id = $body['post_id'];
                if ($post_id > 0){
                    $sql ="UPDATE `post` SET `title`= '$title' ,`sector`='$sector',`job_level`= '$level',`job_description`='$desc',`requirement`='$requirement',
                    `job_location`='$loc',`salary`='$salary',`employer_id`='1',`create_date`='$createdate',`expire_date`='$expiredate',`employment_type`='$employment_type' 
                    WHERE `id`='$post_id' ";
                    $stmt = $this->ci->dbconnect->prepare($sql);
                    $stmt->execute();
                    // return $response->write('updated successfully');
                    return $response->withJson($this->getPostById($post_id));
                }else {
                    $sql ="INSERT INTO post (title, sector, job_level, job_description, requirement, job_location, salary, employer_id, create_date, expire_date, employment_type) 
                    VALUES ('$title', '$sector', '$level', '$desc', '$requirement', '$loc', '$salary', '$employment_id', '$createdate', '$expiredate', '$employment_type')";
                    $stmt = $this->ci->dbconnect->prepare($sql);
                    $stmt->execute();
                }  
            }
            

        } catch(PDOException $e){
            return $response->withStatus(404)->write(json_encode([
                'error' => 'could not store post'
            ]));
        }

        return $response->withJson($this->getPostById($this->ci->dbconnect->lastInsertId()));

    }

    protected function getPostById($id){ //is it possible to delcare two variables in the function and use one at a time
        $sql= "select * from post where id = :id";
        $stmt = $this->ci->dbconnect->prepare($sql);
        $stmt->execute(['id'=>$id]);

        if ($stmt->rowCount() === 0){
            return null; // because their is no post with that id
        }

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

  