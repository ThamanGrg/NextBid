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
    <link rel="stylesheet" href="create.css?version=1.1">
</head>

<body>
    <header>
        <div class="header">
            <div class="logo">
                <img src="../../assets/logo.png" alt="logo">
            </div>
            <div class="nav">
                <ul class="navList">
                    <li><a href="#">Home</a></li>
                    <li><a href="../browse/browse.html">Browse Auction</a></li>
                    <li class="categoryDD">Category
                        <div class="dropDownCategory">
                            <ul>
                                <li><a href="">Vintage Items & antiques</a></li>
                                <li><a href="">Automobiles</a></li>
                                <li><a href="">Decorative items & gifts</a></li>
                                <li><a href="">Arts</a></li>
                                <li><a href="">Jewellery</a></li>
                                <li><a href="">Furnitures</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="../Create/create.php">Create Auction</a></li>
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
                <h3>Fill the below form to apply for creation of auction.</h3>
            </div>
            <form action="../../../php/auctionform.php" method="post" enctype="multipart/form-data">
                <div class="inputField">
                    <label for="Item Name">Item Name: </label>
                    <input type="text" name="itemName" id="itemName" maxlength="255" required>
                </div>
                <div class="inputField">
                    <label for="initial Price">Initial Price($): </label>
                    <input type="text" name="initialPrice" id="initialPrice" required>
                </div>

                <div class="inputField">
                    <label for="maximum price">Maximum Price($): </label>
                    <input type="text" name="maximumPrice" id="maximumPrice" required>
                </div>

                <div class="inputField">
                    <label for="start Date">Starting Date: </label>
                    <input type="date" name="startDate" id="startDate" required>
                    <input type="time" name="startTime" id="startTime" required>
                </div>

                <div class="inputField">
                    <label for="end Date">Ending Date: </label>
                    <input type="date" name="endDate" id="endDate" required>
                    <input type="time" name="endTime" id="endTime" required>
                </div>

                <div class="inputField">
                    <label for="Description">Item description: </label>
                    <textarea name="itemDescription" id="itemDescription" maxlength="255"></textarea required>
                </div>

                <div class="inputField">
                    <label for="Item Image">Item image:</label>
                    <input type="file" name="itemImage" id="itemImage" multiple required>
                </div>
                <div class="submit">
                    <input type="submit" class="submitButton">
                </div>
            </form>
        </div>

    </div>
    <footer>
        <div class="footerMenus">
            <div class="Menu">
                <h1>Menu</h1>
                <a href="../Home/Home.php">Home</a>
                <a href="../Browse/browse.html">Browse Auctions</a>
                <a href="#login">Login</a>
                <a href="#register">Register</a>
                <a href="../Create/create.php">Create an Auction</a>
            </div>
            <hr>
            <div class="supports">
                <h1>Supports</h1>
                <a href="terms">Terms & conditions</a>
                <a href="privacy">Privacy Policy</a>
            </div>
            <hr>
            <div class="aboutUs">
                <h1>About Us</h1>
                <a href="#">About Us</a>
                <a href="#">Contact Us</a>
                <a href="#">Partners</a>
            </div>
        </div>
        <div class="socialLinks">
            <div>
                <a href="#"><img src="../../assets/icons/facebook.png" alt=""></a>
                <a href="#"><img src="../../assets/icons/instagram (1).png" alt=""></a>
                <a href="#"><img src="../../assets/icons/twitter.png" alt=""></a>
            </div>
        </div>
    </footer>
</body>

</html>