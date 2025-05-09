<?php
session_start();
include("../php/connection.php");

if (!isset($_SESSION['username'])) {
  $_SESSION['message'] = "Login first for bidding";
  header('Location: ../index.php');
  exit();
}

if (isset($_SESSION['message'])) {
  $message = $_SESSION['message'];
  echo "<script>alert('$message');</script>";
  unset($_SESSION['message']);
}

if (isset($_GET['itemId'])) {
  $id = intval($_GET['itemId']);
  $query = "SELECT p.*, i.*, d.*, (SELECT MAX(bid_amount) FROM bids WHERE auction_id = p.item_id) AS highest_bid FROM products p LEFT JOIN item_images i ON p.item_id = i.item_id LEFT JOIN item_details d ON p.item_id = d.item_id WHERE p.item_id = $id;";
  $result = mysqli_query($conn, $query);
  $item = mysqli_fetch_assoc($result);
  mysqli_data_seek($result, 0);

  $currentBid = $item['highest_bid'];
  $reservePrice = $item['reserve_price'];
  $maximumPrice = $item['maximum_price'];

  $auctionWinner = "SELECT u.username, b.bid_amount FROM bids b JOIN users u ON b.user_id = u.user_id WHERE b.auction_id = $id ORDER BY b.bid_amount DESC LIMIT 1";
  $winnerResult = mysqli_query($conn, $auctionWinner);

  if (!$item) {
    echo "<h1 style='color: red;'>Item not found!</h1>";
    exit();
  }
} else {
  header('Location: itemdetails.php');
}

if (isset($_GET['status'])) {
  if ($_GET['status'] == 'success') {
    echo "<script>alert('Bid placed successfully!');</script>";
  } elseif ($_GET['status'] == 'error') {
    echo "<script>alert('Error placing bid. Please try again.');</script>";
  }
}

$statusMessage = "Auction Running"
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
  <link rel="stylesheet" href="itemdetails.css?version=1.9">
</head>

<body>
  <?php
  require_once('../php/header.php');
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
    <?php
    if (!$item) {
      $color = 'red';
      echo ("<h1 style='color: $color';>$message</h1>");
      exit();
    } else {
    ?>
      <div class="main">
        <div class="path">
          <p>
            <a href="../index.php">Home</a> /
            <a href=""><?php echo $item['product_category']; ?> </a> /
            <a href=""><?php echo $item['item_title']; ?></a>
          </p>
        </div>
        <?php
        if ($item = mysqli_fetch_assoc($result)) {
          $startingDateTime = $item['starting_date'] . ' ' . $item['startTime'];
          $endingDateTime = $item['ending_date'] . ' ' . $item['endTime'];
        ?>

          <div class="upperSection">
            <div class="leftSection">
              <div class="itemTitle">
                <h1><?php echo $item['item_title'] ?></h1>
              </div>
              <div class="itemImages">
                <div class="imageList">
                  <?php
                  if ($result) {
                    mysqli_data_seek($result, 0);
                    while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                      <div class="imageContainer">
                        <img src="../uploads/<?php echo $row['image_path']; ?>" alt="Item Image" class="sml-image">
                      </div>
                  <?php
                    }
                  }
                  ?>
                </div>
                <div class="selectedImage">
                  <img src="" alt="Selected Image" id="lrg-image">
                </div>
              </div>
            </div>
            <div class="rightSection">
              <?php
              if (strtotime($startingDateTime) <= time()) {
              ?>
                <div class="bidTime">
                  <h1>Closes in <?php echo date("F d, Y", strtotime($item['ending_date'])) . " at " . date("h:i A", strtotime($item['endTime'])) ?></h1>
                </div>
                <div class="bidCard">
                  <div class="top">
                    <?php
                    $endingDateTime = $item['ending_date'] . ' ' . $item['endTime'];
                    if ((strtotime($endingDateTime) <= time()) || ($currentBid >= $maximumPrice)) {
                      echo "<h1 style='color: red;'>Auction Ended</h1>";
                      if ($winner = mysqli_fetch_assoc($winnerResult)) {
                        echo "<p>Winner: " . htmlspecialchars($winner['username']) . "</p>";
                        echo "<p>Winning Bid: $" . number_format($winner['bid_amount'], 2) . "</p>";
                        $statusMessage = "Sold";
                      } else {
                        echo "<p>Auction Ended - No Bids</p>";
                      }
                    ?>
                    <?php
                    } else {
                    ?>
                      <p>Current Price: <span id="currentBid">$<?php echo number_format($currentBid, 2); ?></span></p>
                      <p>Reserve Price: <span id="reservePrice">$<?php echo number_format($item['reserve_price'], 2); ?></span></p>
                      <span id="maxPrice" hidden>$<?php echo number_format($item['maximum_price'], 2); ?></span>

                      <div class="biddingSection">
                        <form action="place_bid.php" method="post">
                          <input type="hidden" name="auctionId" value="<?php echo $id; ?>">
                          <input type="number" name="bidAmount" placeholder="Enter your bid" class="bidInput no-spinner" min="1" max="99999" required>
                          <input type="submit" class="submit" value="Place Bid">
                        </form>
                      </div>
                      <h4 class="statusMsg">Status: <b><?php echo $statusMessage ?></b></h4>
                  </div>
                <?php
                    }
                ?>
                </div>
                <hr>
              <?php
              } else {
                echo "<div class='bidTime'>";
                echo "<h1>Starts in " . date('F d, Y', strtotime($item['starting_date'])) . " at " . date('h:i A', strtotime($item['startTime'])) . "</h1>";
                echo '</div>';
                echo "<div class='bidCard'>";
                echo "<h2 style='color: red;'>Auction not started</h2>";
                echo '</div>';
              }
              ?>
            </div>
          </div>


      </div>

      <div class="lowerSection">
        <div class="title">
          <h2><?php echo $item['item_title'] ?></h2>
          <p><?php echo $item['item_description']; ?></p>
        </div>
        <div class="itemOverview margin">
          <h3>Item Overview</h3>
          <ul>
            <li>Condition: <?php echo $item['item_condition'] ?></li>
            <li>No of item: <?php echo $item['no_Item'] ?></li>
            <li>Location: <?php echo $item['location'] ?></li>
            <li>Category: <?php echo $item['product_category'] ?></li>
          </ul>
        </div>
        <div class="auctionDetails margin">
          <h3>Auction Details</h3>
          <p><b><?php echo $item['item_title'] ?></b></p>
          <p>Auction By: <b><?php echo $item['user'] ?></b></p>
          <p>Added Date: December 15, 10:50 PM</p>
          <p>Location: Tokyo-to, Shibuya-ku, Japan</p>
        </div>
        <div class="shippingDetails">
          <h3>Shipping Details</h3>
          <p>Pokhara 8, Kaski, Nepal</p>
          <p>Contact: email@gmail.com</p>
        </div>
      </div>
    <?php
        }
    ?>
    </div>
  <?php
    }
  ?>
  </section>

  <footer>
    <?php
    include("../php/footer.php");
    ?>
  </footer>

</body>
<script>
  const thumbnails = document.querySelectorAll('.sml-image');
  const largeImage = document.getElementById('lrg-image');

  if (thumbnails.length > 0) {
    largeImage.src = thumbnails[0].src;
  }
  thumbnails.forEach(thumbnail => {
    thumbnail.addEventListener('click', () => {
      largeImage.src = thumbnail.src;
    });
  });
</script>
<script>
  function userProfile() {
    let dropdown = document.querySelector(".userDropdown");

    if (dropdown.style.display === "none") {
      dropdown.style.setProperty("display", "flex");
    } else {
      dropdown.style.setProperty("display", "none");
    }
  }
</script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const bidForm = document.querySelector("form[action='place_bid.php']");
    const bidInput = bidForm.querySelector(".bidInput");

    const maxBid = parseFloat(document.getElementById("maxPrice").innerText.replace("$", "").replace(",", ""));
    const currentBid = parseFloat(document.getElementById("currentBid").innerText.replace("$", "").replace(",", ""));
    const reservePrice = parseFloat(document.getElementById("reservePrice").innerText.replace("$", "").replace(",", ""));

    bidForm.addEventListener("submit", function(event) {
      const bidAmount = parseFloat(bidInput.value);

      if (bidAmount <= currentBid || bidAmount <= reservePrice) {
        alert("Your bid must be higher than the current bid and reserve price");
        event.preventDefault();
      } else if (bidAmount > maxBid) {
        alert("Your bid exceeds the maximum allowed price ");
        event.preventDefault();
      }
    });
  });
</script>

</html>
<?php
