<?php
    class dbconnect{
        private $servername = "localhost";
        private $username = "hrfocus";
        private $password = "hrfocus";
        private $dbname = "hrfocus_jobs";
        

         // Create connection
        public function connect(){
            $mysql_connection_string = "mysql:host=$this->servername;dbname=$this->dbname";
            $conn = new PDO($mysql_connection_string, $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }



    }