<?php
    include_once('../../../php/connection.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width" , initial-scale=1.0">
    <title>NextBid (Online Auction)</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="create.css">
</head>

<body>
    <header>
        <div class="header">
            <div class="logo">
                <img src="../../assets/logo.png" alt="logo">
            </div>
            <div class="nav">
                <ul>
                    <li><a href="../Home/home.html">Home</a></li>
                    <li><a href="../browse/browse.html">Browse Auction</a></li>
                    <li>Category</li>
                    <li><a href="../create/create.html">Create Auction</a></li>
                    <li><a href="#Contacts">Contacts</a></li>
                </ul>
            </div>
            <div class="notification">
                <img src="../../assets/icons/bell.png" alt="">
            </div>
            <div class="loginSignup">
                <button><img src="../../assets/icons/user.png">Login/Register</button>
            </div>
        </div>
    </header>
    <div class="container">

        <div class="auctionCreateForm">
            <div class="Title">
                <h1>Create an Auction</h1>
            </div>
            <form action="../../../php/auctionform.php" method="post" enctype="multipart/form-data">
                <div class="inputField">
                    <label for="Item Name">Item Name: </label>
                    <input type="text" name="itemName" id="itemName" maxlength="255">
                </div>
                <div class="inputField">
                    <label for="initial Price">Initial Price($): </label>
                    <input type="text" name="initialPrice" id="initialPrice">
                </div>

                <div class="inputField">
                    <label for="maximum price">Maximum Price($): </label>
                    <input type="text" name="maximumPrice" id="maximumPrice">
                </div>

                <div class="inputField">
                    <label for="start Date">Starting Date: </label>
                    <input type="date" name="startDate" id="startDate">
                    <input type="time" name="startTime" id="startTime">
                </div>

                <div class="inputField">
                    <label for="end Date">Ending Date: </label>
                    <input type="date" name="endDate" id="endDate">
                    <input type="time" name="endTime" id="endTime">
                </div>

                <div class="inputField">
                    <label for="Description">Item description: </label>
                    <input type="text" maxlength="255" name="itemDescription">
                </div>

                <div class="inputField">
                    <label for="Item Image">Item image:</label>
                    <input type="file" name="itemImage" id="itemImage">
                </div>

        </div>
        <div class="submit">
            <input type="submit" class="submitButton">
        </div>
        </form>
    </div>
    </div>
</body>

</html>