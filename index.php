<?php
session_start();
include_once("php/connection.php");

$query = "SELECT p.item_ID, p.item_title, p.ending_date, p.endTime, p.starting_date, p.startTime, i.image_path FROM products p LEFT JOIN item_images i ON p.item_ID = i.item_ID WHERE i.is_primary = 1 ORDER BY item_ID DESC LIMIT 6";
$result = mysqli_query($conn, $query);


if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    echo "<script>alert('$message');</script>";
    unset($_SESSION['message']);
}

if (isset($_SESSION['username'])) {
    $uname = $_SESSION['username'];

    $userQ = "SELECT * FROM users WHERE username = '$uname'";
    $userR = $conn->query($userQ);
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
    <link rel="stylesheet" href="style.css?version=1.7">
</head>

<body>
    <header>
        <div class="header">
            <div class="logo">
                <a href="index.php"><img src="assets/logo.png" alt="logo"></a>
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
                if (isset($_SESSION['username'])) {
                    echo "<button onclick=\"userProfile();\"><img src='assets/icons/user.png' alt='user' class='userDropDown'>" . $_SESSION['username'] . "</button>";
                } else {
                    echo "<button class='btnLogin-popup' onclick='loginForm();'><img src='assets/icons/user.png' alt='user'>Login</button>";
                }

                ?>
            </div>
        </div>
    </header>
    <?php
    if (isset($_SESSION['username'])) {
    ?>
        <div id="userDropdown" class="userDropdown">
            <div class="profile">
                <?php
                while ($row = mysqli_fetch_assoc($userR)) {
                ?>
                    <div>
                        <div>
                            <h2><?php echo $uname ?></h2>
                        </div>
                        <div>
                            <p>ID: <?php echo $row['user_id'] ?></p>
                            <p>Email: <?php echo $row['email'] ?></p>
                        </div>
                        <div>
                            <a href="userdashboard/userdashboard.php#" onclick="loadContent('personalinfo.php'); return false;"><button>Edit Profile</button></a>
                        </div>
                    </div>
                    <div>
                        <div><img src="assets/icons/man avatar with circle frame_8515464.png" alt="User Profile Picture" class="userPP"></div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="hr-line"></div>
            <div class="user-menu">
                <h2>User menu</h2>
                <div class="menu">
                    <a <?php if($_SESSION['role'] == 'admin'){
                        echo "href='admin'";
                    } elseif ($_SESSION['role'] == 'user'){
                        echo "href='userdashboard/userdashboard.php'";
                    }
                    ?>>My dashboard</a>
                    <a href="userdashboard/editprofile.php">My auctions</a>
                    <a href="userdashboard/saved.php">Saved items</a>
                </div>
            </div>
            <div class="hr-line"></div>
            <div class="user-menu">
                <h2>Auction menu</h2>
                <div class="menu">
                    <a href="browse/browse.php">Auctions</a>
                    <a href="create/create.php">Create Auction</a>
                </div>
            </div>
            <div class="hr-line"></div>
            <div class="logout">
                <button><a href="php/logout.php">Logout</a></button>
            </div>
        </div>
    <?php
    }
    ?>
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
                                <input type="email" name="email" id="email-login" required autocomplete="email">
                                <label for="email">Email</label>
                            </div>
                            <div class="input-box">
                                <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                                <input type="password" name="password" id="password-login" required>
                                <label for="password">password</label>
                            </div>
                            <div class="remember-forgot">
                                <label for="remember-me"><input type="checkbox" id="remember-me" name="remember-me">Remember me </label>
                                <a href="">forgot password?</a>
                            </div>
                            <button type="submit" name="login" class="btn">login</button>
                        </form>
                        <div class="login-register">
                            <p>Don't have an account?<a href="#" class="register-link">Register</a></p>
                        </div>
                    </div>

                    <div class="from-box register">
                        <h1>Registration</h1>
                        <form action="php/loginRegister.php" method="POST" id="registerForm">
                            <div class="input-box">
                                <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                                <input type="text" name="username" id="username" required autocomplete="username">
                                <label for="username">Username</label>
                            </div>
                            <div id="result"></div>
                            <div class="input-box">
                                <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                                <input type="email" name="email" id="email" required autocomplete="email">
                                <label for="email">Email</label>
                            </div>
                            <div class="input-box">
                                <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                                <input type="text" name="name" id="name" required autocomplete="name">
                                <label for="name">Name</label>
                            </div>
                            <div id="result"></div>
                            <div class="input-box">
                                <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                                <input type="text" name="password" id="password" required autocomplete="123">
                                <label for="password">password</label>
                            </div>
                            <div class="input-box">
                                <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                                <input type="text" name="confirm_password" id="confirm_password" required autocomplete="123">
                                <label for="confirm_password">Confirm password</label>
                            </div>
                            <div class="remember-forgot">
                                <label for="terms"><input type="checkbox" id="terms" name="terms" required>I agree to the trems & conditions</label>
                            </div>
                            <button type="submit" class="btn" name="register">Register</button>

                        </form>
                        <div class="login-register">
                            <p>Already have an account?<a href="#" class="login-link">Login</a></p>
                        </div>
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
                    <a href="browse/browse.php?category=Automobiles"><button><img src="assets/icons/right-arrow.png"
                                alt="">Category</button></a>
                    <img src="assets/images/Automobiles.png" alt="" class="automobilesImage">
                </div>
                <div class="vintageItems">
                    <h1>Vintage Items</h1>
                    <h1>& Antiques</h1>
                    <a href="browse/browse.php?category=Vintage%20Items%20%26%20Antiques"><button><img src="assets/icons/right-arrow.png"
                                alt="">Category</button></a>
                    <img src="assets/images/vintageitems.png" alt="" class="vintageImage">
                </div>
                <div class="arts">
                    <h1>Arts</h1>
                    <a href="browse/browse.php?category=Arts"><button><img src="assets/icons/right-arrow.png"
                                alt="">Category</button></a>
                    <img src="assets/images/arts.png" alt="" class="artsImage">
                </div>
                <div class="viewCategory">
                    <img src="assets/images/categories.png" alt="">
                    <a href="browse/browse.php"><button><img src="assets/icons/right-arrow.png" alt="">Explore
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
                    $startingDateTime = $row['starting_date'] . ' ' . $row['startTime'];
                    if (strtotime($startingDateTime) > time()) {
                        $auctionStatus = "notStarted";
                    } else {
                        $auctionStatus = "started";
                    }
                ?>
                    <div class="topItemsCard">
                        <div class="cardImage">
                            <div class="imageContainer">
                                <img src="uploads/<?php echo $row['image_path'] ?>">
                            </div>
                        </div>
                        <div class="itemDetails">
                            <h2><?php echo $row['item_title'] ?></h2>
                            <?php
                            if ($auctionStatus == "notStarted") {
                                echo "<p> Starting Time: " . $row['starting_date'] . "   " . $row['startTime'] . "</p>";
                            } else if ($auctionStatus == "started") {
                                echo "<p> Ending Time: " . $row['ending_date'] . "   " . $row['endTime'] . "</p>";
                            }

                            ?>
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
    document.getElementById('registerForm').addEventListener('submit', function(event) {
        const username = document.getElementById('username').value.trim();
        const password = document.getElementById('password').value.trim();
        const confirmPassword = document.getElementById('confirm_password').value.trim();

        event.preventDefault();

        if (username.includes(" ")) {
            alert("Username must not contain spaces.");
            return;
        }

        const minLength = 8;
        const hasNumber = /\d/;

        if (password.length < minLength) {
            alert("Password must be at least 8 characters long.");
            return;
        }

        if (password !== confirmPassword) {
            alert("Passwords do not match.");
            return;
        }

    });
</script>

<script>
    function userProfile() {
        let dropdown = document.querySelector(".userDropdown");

        if (dropdown) {
            if (dropdown.style.display === "none") {
                dropdown.style.display = "flex";
            } else {
                dropdown.style.display = "none";
            }
        } else {
            console.error("Dropdown element not found.");
        }
    }
</script>

</html>