<?php
session_start();
include("../php/connection.php");
if(isset($_SESSION['username'])){
    $uname = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username = '$uname'";
    $result = $conn->query($query);
}
?>
<div class="container">
<h3>Change Password</h3>
<form action="change_password.php" method="POST">
    <div class="inputField">
        <label for="currentPassword">Current Password:</label>
        <input type="password" id="currentPassword" name="currentPassword" required>
    </div>
    <div class="inputField">
        <label for="newPassword">New Password:</label>
        <input type="password" id="newPassword" name="newPassword" required>
    </div>
    <div class="inputField">
        <label for="confirmPassword">Confirm New Password:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required>
    </div>
    <button type="submit">Change Password</button>
</form>
</div>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }
    .container {
        max-width: 600px;
        margin: 0 auto;
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }
    h2, h3 {
        color: #333;
    }
    .inputField {
        margin-bottom: 15px;
    }
    label {
        display: block;
        font-weight: bold;
    }
    input[type="text"],
    input[type="email"],
    input[type="tel"],
    input[type="password"],
    input[type="file"] {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    button {
        background-color: #28a745;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
    }
    button:hover {
        background-color: #218838;
    }
    .delete-btn {
        background-color: #dc3545;
    }
    .delete-btn:hover {
        background-color: #c82333;
    }
</style>