<?php include_once ('C:\xampp\htdocs\NextBid\php\topItems.php') ?>
 
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
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div class="header">
            <div class="logo">
                <img src="../assets/logo.png" alt="logo">
            </div>
            <div class="nav">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="/browse">Browse Auction</a></li>
                    <li>Category</li>
                    <li><a href="#Contacts">Contacts</a></li>
                </ul>
            </div>
            <div class="notification">
                <img src="../assets/icons/bell.png" alt="">
            </div>
            <div class="loginSignup">
                <button><img src="../assets/icons/user.png">Login/Register</button>
            </div>
        </div>
    </header>
    <div class="main">
        <div class="hero">
            <div class="leftnright">
                <div class="left">
                    <div class="title">
                        <h1>Online</h1>
                        <h1 style="color: #758BFD;">Auction</h1>
                    </div>
                    <div class="slogan">
                        <p>NextBid is an online application where you can participate</p>
                        <p>in auction online from anywhere.</p>
                    </div>
                    <div class="searchBox">
                        <input type="text" id="searchInput" class="searchInput" placeholder="Search for items....."
                            maxlength="27">
                        <button type="submit"><img src="../assets/icons/magnifying-glass.png" alt="">Search</button>
                    </div>
                </div>
                <div class="right">
                    <img src="../assets/images/herosection.png" alt="">
                </div>
            </div>

        </div>
    </div>
    <div class="categories">
        <div class="categoryTitle">
            <hr>
            <div class="categoryBox">
                <p>Categories</p>
            </div>
            <hr>
        </div>
        <div class="categoryBoxes">
            <div class="autoMobiles">
                <h1>Auto</h1>
                <h1>mobiles</h1>
                <a href="browse.html?p=automobiles"><button><img src="../assets/icons/right-arrow.png"
                            alt="">Category</button></a>
                <img src="../assets/images/Automobiles.png" alt="" class="automobilesImage">
            </div>
            <div class="vintageItems">
                <h1>Vintage Items</h1>
                <h1>& Antiques</h1>
                <a href="browse.html?p=vintageItems"><button><img src="../assets/icons/right-arrow.png"
                            alt="">Category</button></a>
                <img src="../assets/images/vintageitems.png" alt="" class="vintageImage">
            </div>
            <div class="arts">
                <h1>Arts</h1>
                <a href="browse.html?p=arts"><button><img src="../assets/icons/right-arrow.png"
                            alt="">Category</button></a>
                <img src="../assets/images/arts.png" alt="" class="artsImage">
            </div>
            <div class="viewCategory">
                <img src="../assets/images/categories.png" alt="">
                <a href="browse.html"><button><img src="../assets/icons/right-arrow.png" alt="">Explore
                        categories</button></a>
            </div>
        </div>
        <div>
        <div class="topItems">
        <div class="TopItemsTitle">
            <hr>
            <div class="TopItemsBox">
                <p>Top Items</p>
            </div>
            <hr>
        </div>
            <?php
            topItems();
            ?>
        </div>
    </div>
</body>

</html>