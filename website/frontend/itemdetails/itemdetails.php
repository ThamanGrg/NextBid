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
  <link rel="stylesheet" href="itemdetails.css">
</head>

<body>
  <?php
  require_once('../../../php/header.php');
  ?>
  <div class="main">
    <div class="path">
      <p>Home / Category / Vintage items & antiques / Rare antique Japamese Amida Budddha statue</p>
    </div>
    <div class="upperSection">
      <div class="leftSection">
        <div class="itemTitle">
          <h1>Rare antique Japanese Amida Buddha statue</h1>
        </div>
        <div class="itemImages">
          <div class="imageList">
            <div class="imageContainer">
              <img src="../../../uploads/special_original_Buddha_statues_Japanese_buddha-1.jpg" alt="">
            </div>
            <div class="imageContainer">
              <img src="../../../uploads/special_original_Buddha_statues_Japanese_buddha-1.jpg" alt="">
            </div>
            <div class="imageContainer">
              <img src="../../../uploads/special_original_Buddha_statues_Japanese_buddha-1.jpg" alt="">
            </div>
            <div class="imageContainer">
              <img src="../../../uploads/special_original_Buddha_statues_Japanese_buddha-1.jpg" alt="">
            </div>
            <div class="imageContainer">
              <img src="../../../uploads/special_original_Buddha_statues_Japanese_buddha-1.jpg" alt="">
            </div>
          </div>
          <div class="selectedImage">
            <img src="../../../uploads/special_original_Buddha_statues_Japanese_buddha-1.jpg" alt="">
          </div>
        </div>
      </div>
      <div class="rightSection">
        <div class="bidTime">
          <h1>Closes in Sunday 01:55</h1>
        </div>
        <div class="bidCard">
          <div class="top">
            <p>Current Bid: $1,405</p>
            <p>Reserve Price: $2,000</p>
          </div>
          <div class="biddingSection">
            <form action="" method="post">
              <input type="text" placeholder="$ 1406 or Up" class="bidInput">
              <input type="submit" class="submit" value="Place Bid">
            </form>

          </div>
          <hr>
          <div class="biddedUser">
            <h1>Bids:</h1>
            <table>
              <tr>
                <th>Username</th>
                <th>Time</th>
                <th>Bid</th>
              </tr>
              <tr>
                <td>username23</td>
                <td>24 minutes ago</td>
                <td>$1405</td>
              </tr>
              <tr>
                <td>username24</td>
                <td>24 minutes ago</td>
                <td>$1500</td>
              </tr>
              <tr>
                <td>username200</td>
                <td>24 minutes ago</td>
                <td>$1550</td>
              </tr>
            </table>
            <p>See all bids <button><img src="../../assets/icons/chevron.png" alt=""></button></p>
          </div>
        </div>
      </div>
    </div>

    <div class="lowerSection">
      <div class="title">
        <p>Rare antique Japanese Amida Buddha statue</p>
      </div>
      <div class="itemOverview margin">
        <h3>Item Overview</h3>
        <ul>
          <li>Condition: Good</li>
          <li>Height: 116cm</li>
          <li>Width: 55cm</li>
          <li>No of item: 1</li>
          <li>Material: Gold</li>
          <li>Location: Japan, Tokyo</li>
        </ul>
      </div>
      <div class="auctionDetails margin">
        <h3>Auction Details</h3>
        <p>Rare antique Japanese Amida Buddha statue</p>
        <p>By Username234</p>
        <p>December 15, 10:50 PM</p>
        <p>Tokyo-to, Shibuya-ku, Japan</p>
      </div>
      <div class="shippingDetails">
        <h3>Shipping Details</h3>
        <p>Pokhara 8, Kaski, Nepal</p>
        <p>Contact: email@gmail.com</p>
      </div>
    </div>
  </div>
  <footer>
    <div class="footerMenus">
      <div class="Menu">
        <h1>Menu</h1>
        <a href="../Home/home.php">Home</a>
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