<?php
namespace App\Models;

class containertest {

protected $dbconnect;
 // constructor receives container instance
 public function __construct($dbconnect){
    $this->dbconnect = $dbconnect;
    var_dump($dbconnect);
    die();
    }
}
