<?php
session_start();
include("../php/connection.php");

if (!isset($_SESSION['username'])) {
  $_SESSION['message'] = "Login first for registering bid";
  header('Location: ../index.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NextBid (Online Auction)</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="registerbid.css?version=1">
</head>

<body>
    <?php
    include_once("../php/header.php")
    ?>
    <main>
        <div class="container">
            <h1>Register to Bid</h1>
            <p>Welcome, Participant. In order to bid online, we will need additional information from you.</p>
            
            <form action="../../../php/registerBidForm.php">
                <h4>Personal Details</h4>
                <div class="inputField">
                    <label for="">First Name :</label>
                    <input type="text" id=".." name="fName" placeholder="First Name">
                </div>

                <div class="inputField">
                    <label for="">Last Name :</label>
                    <input type="text" id=".." name="lName" placeholder="Last Name">
                </div>
                <div class="inputField">
                    <label for="phone">Phone :</label>
                    <input type="tel" id="phone" name="phone" placeholder="Enter your phone number">
                </div>

                <h4>Shipping Address</h4>
                <div class="inputField">
                    <label for="Country">Country :</label>
                    <input type="text" id="Nepal" name="Nepal" placeholder="Enter your Country">
                </div>

                <div class="inputField">
                    <label for="address">Address :</label>
                    <input type="text" id="address" name="address" placeholder="Enter your address">
                </div>

                <div class="inputField">
                    <label for="city">City :</label>
                    <input type="text" id=" city" name="city" placeholder=" Enter your city">
                </div>

                <div class="inputField">
                    <label for="state">Province :</label>
                    <input type="text" id="state" name="state" placeholder="Enter your state">
                </div>

                <div class="inputField">
                    <label for="zip">Zip Code :</label>
                    <input type="text" id="zip" name="zip" placeholder="Enter your zip code">
                </div>
                <div class="inputField">
                    <input type="submit" name="registerBid" id="" class="registerbutton">
                </div>

            </form>
            <div class="clickbid">
                <input type="checkbox">
                <p>By clicking "Register to Bid" I agree to this auction's Terms and Conditions.</p>
            </div>
            <a href="../Browse/browse.php"><button class="cancelbutton">Cancel</button></a>
        </div>
    </main>

</body>

</html>