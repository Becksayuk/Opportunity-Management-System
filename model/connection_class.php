<?php
    Class Connection {
        // db params
        private $host = "localhost";
        private $db_name = "oms";
        private $username = "root";
        private $password = "";
        private $conn;

        // db connect 
        public function connect(){
            $this->conn = null;

            try{
                $this->conn = new PDO('mysql:host='. $this->host .';dbname='. $this->db_name,
                $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                echo 'Connection Error: '. $e->getMessage();
            }

            return $this->conn; 
        }
    }