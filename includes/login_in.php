<?php
include_once "../controller/student_controller.php";
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $loginController = new StudentController();
    $loginController->studentLoginController($email,$password);
}