<?php
include_once('connection.php');

if(isset($_POST['register'])){
    $uname = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (username, email, password) VALUES ('$uname', '$email', '$password')";
    $fetchData = "SELECT * FROM users";
    $fetchResult = $conn->query($fetchData);
    
}



?>