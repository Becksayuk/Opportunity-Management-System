<?php
include_once "connection_class.php";
class Employer extends Connection {
   public function selectCategory(){
        $sql = "SELECT * FROM category ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }
    public function createOpportunity($title,$description,$location,$type,$user_id){

    }
}
