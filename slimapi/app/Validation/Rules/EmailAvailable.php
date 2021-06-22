<?php

namespace App\Validation\Rules;

use App\Controllers\Auth\AuthController;
use Respect\Validation\Rules\AbstractRule;
use Psr\Container\ContainerInterface;

use PDO;

class EmailAvailable extends AbstractRule {

    protected $dbconnect;

    // constructor receives container instance
    public function __construct($dbconnect){
        var_dump($this);
        die();
        $this->dbconnect = $dbconnect;
        var_dump($dbconnect);
        die();
    }

    public function validate ($input){
        // $formdata = $input->getParsedBody();
        // $email = $formdata["email"];
        var_dump($this);
        die();
        $sql= "select * from user where email = '$email'";
        $stmt = $this->ci->dbconnect->prepare($sql);
        
        $stmt->execute();
        // var_dump($stmt->rowCount());
        // die();
        return $stmt->rowCount() === 0;
    }

//     public function __invoke($request, $response, $next) {
//         $request = $request->withAttribute('result', $this->validate());
//         var_dump($request);
//         die();
//         $response->getBody()->write(' Hello ');
//         return $response;
        
//    }

}