<?php
session_start();
include_once('connection.php');

if (isset($_POST['register'])) {
    $uname = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $uname = $conn->real_escape_string($uname);
    $email = $conn->real_escape_string($email);

    
    $sql = "SELECT * FROM users WHERE username = '$uname' OR email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $response = "";
        $sql_user = "SELECT * FROM users WHERE username = '$uname'";
        $result_user = $conn->query($sql_user);
        if ($result_user->num_rows > 0) {
            $response .= "Username already exists. ";
        }

        $sql_email = "SELECT * FROM users WHERE email = '$email'";
        $result_email = $conn->query($sql_email);
        if ($result_email->num_rows > 0) {
            $response .= "Email already exists.";
        }

        echo $response;
    } else {
        $submitQuery = "INSERT INTO users (username, email, password) VALUES ('$uname', '$email', '$password')";
        $success = $conn->query($submitQuery);

        if($success){
            header("Location: ../index.php");
            $response .= "Registered";
        } else {
            header("Location: ../index.php");
            $response .= "Register unsuccessful try again!!";
        }
    }
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $res = mysqli_query($conn, $query);

    if (mysqli_num_rows($res) == 1) {
        $row = mysqli_fetch_assoc($res);
        $_SESSION['username'] = $row['username'];
        header("Location: ../index.php");
        exit();
    } else {
        echo "Invalid Username or Password!";
    }
}

$conn->close();
?>