<?php
session_start();
include_once("php/connection.php");

$query = "SELECT p.item_ID, p.item_title, p.ending_date, p.endTime, i.image_path FROM products p LEFT JOIN item_images i ON p.item_ID = i.item_ID WHERE i.is_primary = 1";
$result = mysqli_query($conn, $query);
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
    <link rel="stylesheet" href="style.css?version=1">
</head>

<body>
    <header>
        <div class="header">
            <div class="logo">
                <img src="assets/logo.png" alt="logo">
            </div>
            <div class="nav">
                <ul class="navList">
                    <li><a href="#">Home</a></li>
                    <li><a href="Browse/browse.php">Browse Auction</a></li>
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

                    <li><a href="Create/create.php">Create Auction</a></li>
                    <li><a href="#Contacts">Contacts</a></li>
                </ul>
            </div>
            <div class="notification">
                <img src="assets/icons/bell.png" alt="">
            </div>
            <div class="loginSignup">
                <?php
                if(isset($_SESSION['username'])){
                    echo "<button><img src='assets/icons/user.png' alt='user' class='userDropDown'>" . $_SESSION['username'] . "</button>";
                } else {
                    echo "<button class='btnLogin-popup' onclick='loginForm();'><img src='assets/icons/user.png' alt='user'>Login</button>";
                }
                    
                ?>
            </div>
        </div>
    </header>
    <section>

        <div class="loginBg">
            <div class="loginForm">
                <div class="wrapper">
                    <span class="icon-close"><ion-icon name="close-outline"></ion-icon></span>
                    <div class="from-box login">
                        <h1>Login</h1>
                        <form action="php/loginRegister.php" method="POST" id="loginForm">
                            <div class="input-box">
                                <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                                <input type="email" name="email" required>
                                <label>Email</label>
                            </div>
                            <div class="input-box">
                                <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                                <input type="password" name="password" required>
                                <label>password</label>
                            </div>
                            <div class="remember-forgot">
                                <label><input type="checkbox">Remember me </label>
                                <a href="">forgot password?</a>
                            </div>
                            <button type="submit" name="login" class="btn">login</button>
                        </form>
                        <div class="login-register">
                            <p>Don't have an account?<a href="#" class="register-link">Register</a></p>
                        </div>
                    </div>

                    <div class="from-box register" id="registerForm">
                        <h1>Registration</h1>
                        <form action="php/loginRegister.php" method="POST" id="registerForm">
                            <div class="input-box">
                                <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                                <input type="text" name="username" required>
                                <label>Username</label>
                            </div>
                            <div id="result"></div>
                            <div class="input-box">
                                <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                                <input type="email" name="email" required>
                                <label>Email</label>
                            </div>
                            <div id="result"></div>
                            <div class="input-box">
                                <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                                <input type="text" name="password" id="password" required>
                                <label>password</label>
                            </div>
                            <div class="input-box">
                                <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                                <input type="text" name="confirm_password" id="confirm_password" required>
                                <label>Confirm password</label>
                            </div>
                            <div class="remember-forgot">
                                <label><input type="checkbox">I agree to the trems & conditions</label>
                            </div>
                            <button type="submit" class="btn" name="register">Register</button>
                            <div class="login-register">
                                <p>Already have an account?<a href="#" class="login-link">Login</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

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
                            <button type="submit"><img src="assets/icons/magnifying-glass.png" alt="">Search</button>
                        </div>
                    </div>
                    <div class="right">
                        <img src="assets/images/herosection.png" alt="herosection">
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
                    <a href="browse.html?p=automobiles"><button><img src="assets/icons/right-arrow.png"
                                alt="">Category</button></a>
                    <img src="assets/images/Automobiles.png" alt="" class="automobilesImage">
                </div>
                <div class="vintageItems">
                    <h1>Vintage Items</h1>
                    <h1>& Antiques</h1>
                    <a href="browse.html?p=vintageItems"><button><img src="assets/icons/right-arrow.png"
                                alt="">Category</button></a>
                    <img src="assets/images/vintageitems.png" alt="" class="vintageImage">
                </div>
                <div class="arts">
                    <h1>Arts</h1>
                    <a href="browse.html?p=arts"><button><img src="assets/icons/right-arrow.png"
                                alt="">Category</button></a>
                    <img src="assets/images/arts.png" alt="" class="artsImage">
                </div>
                <div class="viewCategory">
                    <img src="assets/images/categories.png" alt="">
                    <a href="../browse/browse.html"><button><img src="assets/icons/right-arrow.png" alt="">Explore
                            categories</button></a>
                </div>
            </div>
        </div>
        <div class="topItems">
            <div class="topItemsTitle">
                <hr>
                <div class="topItemsTitleBox">
                    <p>Top Items</p>
                </div>
                <hr>
            </div>
            <div class="topItemListContainer">
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="topItemsCard">
                        <div class="cardImage">
                            <div class="imageContainer">
                                <img src="uploads/<?php echo $row['image_path'] ?>">
                            </div>
                        </div>
                        <div class="itemDetails">
                            <h2><?php echo $row['item_title'] ?></h2>
                            <?php echo "<p> Ending Time: " . $row['ending_date'] . "   " . $row['endTime'] . "</p>" ?>
                            <p>Current Bid: </p>
                        </div>
                        <a href="Itemdetails/itemdetails.php?itemId=<?php echo $row["item_ID"] ?>"><button class="bidButton">Bid</button></a>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="moreItems">
                <a href="Browse/browse.html"><button>View more items</button></a>
            </div>
        </div>

    </section>
    <footer>
        <div class="footerMenus">
            <div class="Menu">
                <h1>Menu</h1>
                <a href="#">Home</a>
                <a href="Browse/browse.php">Browse Auctions</a>
                <a href="#login">Login</a>
                <a href="#register">Register</a>
                <a href="Create/create.php">Create an Auction</a>
            </div>
            <hr>
            <div class="supports">
                <h1>Supports</h1>
                <a href="#terms">Terms & conditions</a>
                <a href="#privacy">Privacy Policy</a>
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
                <a href="#"><img src="assets/icons/facebook.png" alt=""></a>
                <a href="#"><img src="assets/icons/instagram (1).png" alt=""></a>
                <a href="#"><img src="assets/icons/twitter.png" alt=""></a>
            </div>
        </div>
    </footer>
</body>
<script src="script.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script>
    document.getElementById('registerForm').addEventListener("submit"),
        function(e) {
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirm_password').value;
            var resultDiv = document.getElementById("result");
            e.preventDefault();

            if (password.length < 6) {
                alert('Password must be length of 8')
            } else if (password !== confirmPassword) {
                alert('Password do not Match!!')
            }



            var xhr = new XMLHttpRequest();
            xhr.open("POST", "php/loginRegister.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    alert(xhr.responseText);
                }
            };
            xhr.send("username=" + username + "&email=" + email);
        }
</script>

</html>