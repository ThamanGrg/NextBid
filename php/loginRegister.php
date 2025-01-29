<?php
include_once('connection.php');

if(isset($_POST['register'])){
    $uname = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rePassword = $_POST['re-password'];

    echo $password;
    echo $rePassword;

    if ($password !== $rePassword){
        echo "password donot match";
    }
}

?>