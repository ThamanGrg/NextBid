<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="../website/frontend/Home/style.css">
</head>

<body>
    <style>
        .dropDownCategory {
            display: none;
        }

        .nav ul li:hover .dropDownCategory {
            display: block;
            position: absolute;
            left: 0;
            top: 100%;
            width: 400px;
            height: 300px;
            background-color: #758BFD;
            color: white;
            padding: 40px;
            border-radius: 20px;
            border-top-left-radius: 0;
            z-index: 10;
        }

        .dropDownCategory ul {
            display: block;
            list-style: none;
        }

        .dropDownCategory ul li {
            margin-bottom: 16px;
            font-weight: 400;
            font-size: 18px;
        }

        .dropDownCategory ul li a {
            color: white;
        }

        .dropDownCategory ul li:hover {
            font-weight: 600;
        }
    </style>
    <header>
        <div class="header">
            <div class="logo">
                <img src="../../assets/logo.png" alt="logo">
            </div>
            <div class="nav">
                <ul class="navList">
                    <li><a href="../Home/home.php">Home</a></li>
                    <li><a href="../browse/browse.php">Browse Auction</a></li>
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
                <button class="btnLogin-popup">Login</button>
            </div>
    </header>
</body>

</html>