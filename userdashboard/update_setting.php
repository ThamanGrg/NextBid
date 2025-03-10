<?php
session_start();
include("../php/connection.php");

if (!isset($_SESSION['username'])) {
    echo "You must be logged in to update your information.";
    exit;
}

$uname = $_SESSION['username'];
$uid = $_SESSION['user_id'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);

    if (empty($name) || empty($email) || empty($phone)) {
        echo "All fields are required.";
        exit;
    }

    $query = "UPDATE users SET name = ?, email = ?, phone = ? WHERE user_id= ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $name, $email, $phone, $uid);

    if ($stmt->execute()) {
        echo "Information updated successfully!";
        header("Location: userdashboard.php");  
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
