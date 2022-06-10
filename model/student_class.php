<?php
include_once "connection_class.php";

class Student extends Connection{

    // student login function

    public function studentRegistration($firstName,$lastName,$userName,$role,$email,$password,$phoneNumber){
        $sql = "INSERT INTO users (first_name,last_name,username,role,email,password,phoneNumber) VALUES(:firstName,:lastName,:userName,:role,:email,:password,:phoneNumber)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':firstName', $firstName, PDO::PARAM_STR);
        $stmt->bindParam(':lastName', $lastName, PDO::PARAM_STR);
        $stmt->bindParam(':userName', $userName, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':phoneNumber', $phoneNumber, PDO::PARAM_STR);
        $stmt->bindParam(':role', $role, PDO::PARAM_STR);
        $stmt->execute();
    }
    public function studentLogin($email){
        $sql = "SELECT * FROM `users` WHERE email=:email";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":email",$email);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count == 0){
            header("Location:../login.html");
            exit(); 
        }
        else{
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }
    }
}