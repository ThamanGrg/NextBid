<?php
session_start();
include("../php/connection.php");
if (isset($_SESSION['username'])) {
    $uname = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username = '$uname'";
    $result = $conn->query($query);
}
?>
<h2 class="heading">Account Settings</h2>


<style>
    .container {
        max-width: 660px;
        margin: 0 auto;
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .userEdit{
        width: 620px;
        display: flex;
        align-items: center;
        text-align: left;
    }

    .userEdit p{
        width: 1260px;
    }

    .heading {
        text-align: center;
        color: #333;
        font-size: 50px;
    }

    .userEdit a{
        width: 100%;
        text-align: right;
    }

    h2{
        color: white;
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

    h3 {
        margin-bottom: 10px;
        font-size: 50px;
        color: #333;
        padding-bottom: 5px;
    }

    h2{
        margin-bottom: 20px;
    }

    p {
        font-size: 24px;
        color: #555;
        margin: 8px 0;
    }

    a{
        font-size: 16px;
    }
</style>

<?php
while ($row = $result->fetch_assoc()) {
?>
    <div class="container">
        <div class="userEdit">
           <p>User id: <?php echo $row['user_id']; ?></p> 
        </div>
        <div class="userEdit">
            <p>Name: <?php echo $row['name']; ?></p><a href="#" onclick="loadContent('personalinfo.php'); return false;">Change name</a>
        </div>
        <div class="userEdit">
            <p>Email: <?php echo $row['email']; ?></p><a href="#" onclick="loadContent('personalinfo.php'); return false;">Change email</a>
        </div>
        <div class="userEdit">
            <p>Phone: <?php echo $row['phone']; ?></p><a href="#" onclick="loadContent('personalinfo.php'); return false;">Add or Change phone</a>
        </div>
    </div>

<?php

}
?>

<div class="container">
    <h3>Email Preferences</h3>
    <form action="update_preferences.php" method="POST">
        <div class="inputField">
            <label for="notifications">Receive Auction Notifications:</label>
            <input type="checkbox" id="notifications" name="notifications">
        </div>
        <div class="inputField">
            <label for="marketingEmails">Receive Marketing Emails:</label>
            <input type="checkbox" id="marketingEmails" name="marketingEmails">
        </div>
        <button type="submit">Save Preferences</button>
    </form>
</div>