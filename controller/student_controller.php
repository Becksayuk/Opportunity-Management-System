<?php
include_once "../model/student_class.php";
class StudentController extends Student {
    function studentRigistrationController($firstName,$lastName,$userName,$role,$email,$password,$phoneNumber){
        $error = "";
        if(empty($firstName) || empty($lastName)|| empty($email) || empty($password) || empty($role) || empty($phoneNumber)){
            $error = "Empty Fields";
            return $error;
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error = "Invalid Email";
            return $error;
        }
        else{
            $password = password_hash($password, PASSWORD_DEFAULT);
            $this->studentRegistration($firstName,$lastName,$userName,$role,$email,$password,$phoneNumber);
            $error = "none";
            return $error;
        }
    }
    function studentLoginController($email,$pwd){
        $row = $this->studentLogin($email);
        foreach($row as $result){
            $Email = $result['email'];
            $role = $result['role'];
            $Password = $result['password'];
        }
        if(password_verify($pwd,$Password) == true && $role == "Employee"){
            session_start();

            $_SESSION['email'] = $Email; 

            header("Location:../applicantdashboard1.html");
            exit();
        }
        elseif(password_verify($pwd,$Password) == true && $role == "Employer"){
            session_start();

            $_SESSION['email'] = $Email; 

            header("Location:../apdashboard.html");
            exit();
        }
        else{
            header("Location:Location:../index.html");
            exit(); 
        }
    }
}
