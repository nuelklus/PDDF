<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

use Respect\Validation\Validator as v;
use PDO;

class AuthController extends BaseController{
   
    public function signup($request, $response, $args){
        
        try{
            $validation = $this->ci->validator->validate($request, [
                'fname' => v::noWhitespace()->notEmpty(),
                'lname' => v::noWhitespace()->notEmpty(),
                'email' => v::noWhitespace()->notEmpty()->email()->emailAvailable(),
                'password' => v::noWhitespace()->notEmpty(),
                'active' => v::noWhitespace()->notEmpty(),
                'role' => v::noWhitespace()->notEmpty(),
                'registration_date' => v::noWhitespace()->notEmpty(),
                'phone' => v::noWhitespace()->notEmpty()
            ]);

        
            if ($validation->failed()){
                return json_encode($_SESSION['validationErrors']);
            }

            $fname = $request->getParam('fname');
            $lname = $request->getParam('lname');
            $email = $request->getParam('email');
            $password = password_hash($request->getParam('password'), PASSWORD_DEFAULT);
            $active = $request->getParam('active');
            $role = $request->getParam('role');
            $registration_date = $request->getParam('registration_date');
            $phone = $request->getParam('phone');
            
            
            $sql ="INSERT INTO `user`(`first_name`, `last_name`, `email`, `password`, `is_active`, `role`, `registration_date`, `phone`) 
            VALUES ('$fname','$lname','$email','$password','$active','$role','$registration_date','$phone')";
            $stmt = $this->ci->dbconnect->prepare($sql);
            $stmt->execute();

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