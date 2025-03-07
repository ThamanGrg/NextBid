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
<h3>Account Deactivation</h3>
<form action="deactivate_account.php" method="POST">
    <p>Are you sure you want to deactivate your account? You will not be able to log in until you reactivate it.</p>
    <button type="submit">Deactivate Account</button>
</form>

<h3>Delete Account</h3>
<form action="delete_account.php" method="POST">
    <p>This action is irreversible. Deleting your account will remove all your auction data.</p>
    <button type="submit" class="delete-btn">Delete Account</button>
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