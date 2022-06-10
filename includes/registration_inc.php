<?php
include_once "../controller/student_controller.php";
session_start();
if(isset($_POST['employee']) || isset(($_POST['employer']))){
    isset($_POST['employee']) ? $role = "Employee" : $role = "Employer";
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $email = $_POST['email'];
    $userName = $_POST['uname'];
    $phoneNumber = $_POST['phoneNumber'];
    $password = $_POST['pwd'];
    $confirmPassword = $_POST['cpwd'];
    if($password !== $confirmPassword){
        header("Location:../registration.html?error=password dont match");
        exit();
    }
    else{
        $registrationController = new StudentController();
        $result = $registrationController->studentRigistrationController($firstName,$lastName,$userName,$role,$email,$password,$phoneNumber);
        // die($result);
        if($result == "none" && isset($_POST['employee'])){
            $_SESSION['email'] = $email;
            header("Location:../applicantdashboard1.html");
            exit();
        }
        elseif($result == "none" && isset($_POST['employer'])){
            $_SESSION['email'] = $email;
            header("Location:../apdashboard.html");
            exit();
        }
        else{
            header("Location:../registration.html?error=error");
            exit();
        }
    }

}
else{
    header("Location:../registration.html");
    exit();
}
?>