<?php
session_start();
if(!$_SESSION['username']){
    header('Location: ../index.php?message="login to create auction"');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width" , initial-scale="1.0">
    <title>NextBid (Online Auction)</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="create.css?version=1.8">
</head>

<body>
    <?php
    require_once('../php/header.php');
    ?>
    <?php
  include_once('../php/header.php');
  ?>
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
                        <div class="user-info">
                            <p>ID: <?php echo $row['user_id'] ?></p>
                            <p>Email: <?php echo $row['email'] ?></p>
                        </div>
                        <div>
                            <a href="../userdashboard/editProfile.php"><button>Edit Profile</button></a>
                        </div>
                    </div>
                    <div>
                        <div><img src="../assets/icons/man avatar with circle frame_8515464.png" alt="User Profile Picture" class="userPP"></div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="hr-line"></div>
            <div class="user-menu">
                <h2>User menu</h2>
                <div class="menu">
                    <a href="../userdashboard/userdashboard.php">My dashboard</a>
                    <a href="../userdashboard/editprofile.php">My auctions</a>
                    <a href="../userdashboard/saved.php">Saved items</a>
                </div>
            </div>
            <div class="hr-line"></div>
            <div class="user-menu">
                <h2>Auction menu</h2>
                <div class="menu">
                    <a href="../browse/browse.php">Auctions</a>
                    <a href="../create/create.php">Create Auction</a>
                </div>
            </div>
            <div class="hr-line"></div>
            <div class="logout">
                <button><a href="../php/logout.php">Logout</a></button>
            </div>
        </div>
    <?php
    }
    ?>
    <section>
        <div class="container">

            <div class="auctionCreateForm">
                <div class="Title">
                    <h1>Create an Auction</h1>
                    <h3>Fill the below form to apply for creation of auction.</h3>
                </div>
                <form action="../php/auctionform.php" method="post" enctype="multipart/form-data" class="form">
                    <div class="page1">
                        <div class="inputField">
                            <label for="Item Title">Item Title: </label>
                            <input type="text" name="itemTitle" id="itemTitle" maxlength="255" required placeholder="Enter the title for item">
                        </div>
                        <div class="inputField">
                            <label for="initial Price">Initial Price($): </label>
                            <input type="number" name="initialPrice" id="initialPrice" min="1" required placeholder="Enter starting price" class="no-spinner">
                        </div>

                        <div class="inputField">
                            <label for="maximum price">Maximum Price($): </label>
                            <input type="number" name="maximumPrice" id="maximumPrice" min="1" required placeholder="Enter max price" class="no-spinner">
                        </div>

                        <div class="inputField">
                            <label for="maximum price">Reserve Price($): </label>
                            <input type="number" name="reservePrice" id="reservePrice" min="1" required placeholder="Enter reserve price" class="no-spinner">
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
                            <label for="category">Category: </label>
                            <select name="category" id="category">
                                <option value="" class="none">Select category for item</option>
                                <option value="Vintage Items & Antiques">Vintage Items & Antiques</option>
                                <option value="Electronics & Technology">Electronics & Technology</option>
                                <option value="Automobiles">Automobiles</option>
                                <option value="Arts">Arts</option>
                                <option value="Jewellery">Jewellery</option>
                                <option value="Furniture">Furniture</option>
                                <option value="Decorative items & Gifts">Decorative items & Gifts</option>
                            </select>
                        </div>

                        <div class="inputField">
                            <label for="Description">Item description: </label>
                            <textarea name="itemDescription" id="itemDescription" maxlength="255"></textarea required>
                        </div>

                        <div class="inputField">
                            <label for="Item Image">Item image:</label>
                            <input type="file" name="itemImages[]" id="itemImage" multiple>
                        </div>
                        <div class="next">
                            <button type="button" onclick="nxt_page()" class="nxt-btn">Next</button>
                        </div>
                    </div>
                    <div class="page2">
                        <div class="inputField">
                            <label for="item condition">Item Condition: </label>
                            <select name="item_Condition" id="item_cond">
                                <option value="" class="none"></option>
                                <option value="new">New</option>
                                <option value="secondHand">Second Hand</option>
                                <option value="Good">Good</option>
                                <option value="Damaged">Damaged</option>
                            </select>
                        </div>

                        <div class="inputField noOfItem">
                            <label for="No Of Items">No of Items: </label>
                            <input type="number" name="no_Item" id="number" min="1" max="10" value="1" class="no-spinner">
                            <input type="range" id="slider" min="1" max="10" value="1">
                            
                        </div>

                        <div class="inputField">
                            <label for="Location">Location: </label>
                            <input type="text" name="location" id="location" maxlength="255" required>
                        </div>

                        <div class="previous">
                            <button type="button" onclick="prev_page()">Previous</button>
                        </div>

                        <div class="submit">
                            <input type="submit" class="submitButton" name="submit">
                        </div>
                    </div>
                    
                    
                </form>
            </div>

        </div>
    </section>
    
    <?php
    include_once("../php/footer.php");
    ?>
</body>
<script>
    function nxt_page() {
        document.querySelector('.form').style.transform = 'translateX(-60%)';
    }
    
    function prev_page() {
        document.querySelector('.form').style.transform = 'translateX(0)';
    }
</script>
<script>
  const number = document.getElementById("number");
  const slider = document.getElementById("slider");

  number.addEventListener("input", () => {
    slider.value = number.value;
  });

  slider.addEventListener("input", () => {
    number.value = slider.value;
  });
</script>
</html>