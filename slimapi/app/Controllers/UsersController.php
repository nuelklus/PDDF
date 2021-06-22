<?php
namespace App\Controllers;

use PDO;

class UsersController extends BaseController{
    public function users($request, $response, $args){
        // return $this->ci->dbconnect;
        $sql= "select * from user";

        $stmt = $this->ci->dbconnect->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $response->withJson($result);
    }

    public function show($request, $response, $args){

        // get id from protected getPostById class
        $user = $this->getUserById($args['id']);
        
        // check if post exit and respond with proper error code id not avialable 
        if ($user === null){
            return $response->withStatus(404);
        }

        return $response->withJson($user);
    }

    public function store($request, $response, $args){
        
        try{
            $body = $request->getParams();
            $user_id = $body['user_id'];
            $fname = $body['fname'];
            $lname = $body['lname'];
            $email = $body['email'];
            $password = password_hash($body['password'], PASSWORD_DEFAULT);
            $active = $body['active'];
            $role = $body['role'];
            $registration_date = $body['registration_date'];
            $phone = $body['phone'];

            if (isset($body['user_id'])){
                $user_id = $body['user_id'];
                if ($user_id > 0){
                    $sql ="UPDATE `user` SET `first_name`='$fname',`last_name`='$lname',`email`='$email',`password`='$password',
                    `is_active`='$active',`role`='$role',`registration_date`='$registration_date',`phone`='$phone' WHERE `id`='$user_id'";

                    $stmt = $this->ci->dbconnect->prepare($sql);
                    $stmt->execute();
                    return $response->withJson($this->getUserById($user_id));
                }else {
                    $sql ="INSERT INTO `user`(`first_name`, `last_name`, `email`, `password`, `is_active`, `role`, `registration_date`, `phone`) 
                    VALUES ('$fname','$lname','$email','$password','$active','$role','$registration_date','$phone')";
                    
                    $stmt = $this->ci->dbconnect->prepare($sql);
                    $stmt->execute();
                }  
            }
            

        } catch(PDOException $e){
            return $response->withStatus(404)->write(json_encode([
                'error' => 'could not store user'
            ]));
        }

        return $response->withJson($this->getUserById($this->ci->dbconnect->lastInsertId()));

    }

    protected function getUserById($id){ //is it possible to delcare two variables in the function and use one at a time
        $sql= "select * from user where id = :id";
        $stmt = $this->ci->dbconnect->prepare($sql);
        $stmt->execute(['id'=>$id]);

        if ($stmt->rowCount() === 0){
            return null; // because their is no post with that id
        }

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }



}