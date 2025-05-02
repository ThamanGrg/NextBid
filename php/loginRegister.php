<?php
session_start();
include_once('connection.php');

if (isset($_POST['register'])) {
    $uname = $_POST['username'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];

    $uname = $conn->real_escape_string($uname);
    $email = $conn->real_escape_string($email);
    $name = $conn->real_escape_string($name);

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $sql = "SELECT * FROM users WHERE username = '$uname' OR email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $response = "";
        
        $sql_user = "SELECT * FROM users WHERE username = '$uname'";
        $result_user = $conn->query($sql_user);
        if ($result_user->num_rows > 0) {
            $_SESSION['message'] = "Username already exists. ";
            header("Location: ../index.php");
            exit;
        }

        $sql_email = "SELECT * FROM users WHERE email = '$email'";
        $result_email = $conn->query($sql_email);
        if ($result_email->num_rows > 0) {
            $_SESSION['message'] = "Email already exists. ";
            header("Location: ../index.php");
            exit;
        }
    } else {
        $submitQuery = "INSERT INTO users (username, email, name, password) VALUES ('$uname', '$email', '$name', '$hashed_password')";
        $success = $conn->query($submitQuery);

        if ($success) {
            $_SESSION['message'] = "Registration successful. Please log in.";
            header("Location: ../index.php");
            exit;
        } else {
            $_SESSION['message'] = "Registration unsuccessful. Please try again.";
            header("Location: ../index.php");
            exit;
        }
    }
}


if (isset($_POST['login'])) {
    $response = "";
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];
            
            $_SESSION['message'] = "Login successful";
            header("Location: ../index.php");
            exit;
        } else {
            $_SESSION['message'] = "Invalid username or password";
            header("Location: ../index.php");
            exit;
        }
    } else {
        $_SESSION['message'] = "Invalid username or password";
            header("Location: ../index.php");
            exit;
    }
}

$conn->close();
?>

