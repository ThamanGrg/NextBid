<?php
include_once('../../../php/connection.php');

$query = "SELECT p.item_title, p.ending_date, p.endTime, i.image_path FROM products p LEFT JOIN item_images i ON p.item_ID = i.item_ID WHERE i.is_primary = 1";
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
    <link rel="stylesheet" href="style.css?version=1.2">
</head>

<body>
    <?php
    require_once('../../../php/header.php');
    ?>
    <section class="main">

        <div class="loginBg">
            <div class="loginForm">
                <div class="wrapper">
                    <span class="icon-close"><ion-icon name="close-outline"></ion-icon></span>
                    <div class="from-box login">
                        <h1>Login</h1>
                        <form action="../../../php/loginRegister.php" method="POST" id="loginForm">
                            <div class="input-box">
                                <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                                <input type="email" required>
                                <label>Email</label>
                            </div>
                            <div class="input-box">
                                <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                                <input type="password" required>
                                <label>password</label>
                            </div>
                            <div class="remember-forgot">
                                <label><input type="checkbox">Remember me </label>
                                <a href="#">forgot password?</a>
                            </div>
                            <button type="submit" name="login" class="btn">login</button>
                            <div class="login-register">
                                <p>Don't have an account?<a href="#" class="register-link">Register</a></p>
                            </div>
                        </form>
                    </div>

                    <div class="from-box register" id="registerForm">
                        <h1>Registration</h1>
                        <form action="../../../php/loginRegister.php" method="POST" id="registerForm">
                            <div class="input-box">
                                <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                                <input type="text" name="username" required>
                                <label>Username</label>
                            </div>
                            <div class="input-box">
                                <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                                <input type="email" name="email" required>
                                <label>Email</label>
                            </div>
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
                            <button type="submit"><img src="../../assets/icons/magnifying-glass.png" alt="">Search</button>
                        </div>
                    </div>
                    <div class="right">
                        <img src="../../assets/images/herosection.png" alt="">
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
                    <a href="browse.html?p=automobiles"><button><img src="../../assets/icons/right-arrow.png"
                                alt="">Category</button></a>
                    <img src="../../assets/images/Automobiles.png" alt="" class="automobilesImage">
                </div>
                <div class="vintageItems">
                    <h1>Vintage Items</h1>
                    <h1>& Antiques</h1>
                    <a href="browse.html?p=vintageItems"><button><img src="../../assets/icons/right-arrow.png"
                                alt="">Category</button></a>
                    <img src="../../assets/images/vintageitems.png" alt="" class="vintageImage">
                </div>
                <div class="arts">
                    <h1>Arts</h1>
                    <a href="browse.html?p=arts"><button><img src="../../assets/icons/right-arrow.png"
                                alt="">Category</button></a>
                    <img src="../../assets/images/arts.png" alt="" class="artsImage">
                </div>
                <div class="viewCategory">
                    <img src="../../assets/images/categories.png" alt="">
                    <a href="../browse/browse.html"><button><img src="../../assets/icons/right-arrow.png" alt="">Explore
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
                                <img src="../../../uploads/<?php echo $row['image_path'] ?>">
                            </div>
                        </div>
                        <div class="itemDetails">
                            <h2><?php echo $row['item_title'] ?></h2>
                            <?php echo "<p> Ending Time: " . $row['ending_date'] . "   " . $row['endTime'] . "</p>" ?>
                            <p>Current Bid: </p>
                        </div>
                        <a href="../Itemdetails/itemdetails.php"><button class="bidButton">Bid</button></a>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="moreItems">
                <a href="../browse/browse.html"><button>View more items</button></a>
            </div>
        </div>

    </section>
    <?php
    include_once("../../../php/footer.php")
    ?>
</body>
<script src="script.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script>
    document.getElementById('registerForm').addEventListener("submit", function(e) {
        var password = document.getElementById('password').value;
        var confirmPassword = document.getElementById('confirm_password').value;

        if (password.length < 6) {
            alert('Password must be length of 8')
            e.preventDefault();
        } else if (password !== confirmPassword) {
            alert('Password donot Match!!')
            e.preventDefault();
        }
    });
</script>

</html>