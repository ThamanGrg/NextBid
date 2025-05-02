<?php
session_start();
include("../php/connection.php");

if (!$_SESSION['username']) {
  header('Location: ../index.php?message="Login first for bidding"');
}

if (isset($_GET['itemId'])) {
  $id = intval($_GET['itemId']);
  $query = "SELECT p.*, i.*, d.*, (SELECT MAX(bid_amount) FROM bids WHERE item_id = p.item_id) AS highest_bid FROM products p LEFT JOIN item_images i ON p.item_id = i.item_id LEFT JOIN item_details d ON p.item_id = d.item_id WHERE p.item_id = $id;";
  $result = mysqli_query($conn, $query);
  $item = mysqli_fetch_assoc($result);
  mysqli_data_seek($result, 0);
  if (!$item) {
    echo "<h1 style='color: red;'>Item not found!</h1>";
    exit();
  }

  $currentBid = $item['highest_bid'] ?? $item['initial_price'];
  $reservePrice = $item['maximum_price'];
} else {
  header('Location: itemdetails.php?message="Id not given"');
}

if (isset($_GET['message'])) {
  $message = $_GET['message'];
  echo "<script type='text/javascript'>
            alert('$message');
          </script>";
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
              <div class="bidTime">
                <h1>Closes in <?php echo date("F d, Y", strtotime($item['ending_date'])) . " at " . date("h:i A", strtotime($item['endTime'])) ?></h1>
              </div>
              <div class="bidCard">
                <div class="top">
                  <p>Current Bid: $<?php echo number_format($currentBid, 2); ?></p>
                  <p>Reserve Price: $<?php echo number_format($item['reserve_price'], 2); ?></p>
                  <p>Maximum Price: $<?php echo number_format($item['maximum_price'], 2); ?></p>

                  <?php
                  $endingDateTime = $item['ending_date'] . ' ' . $item['endTime'];
                  if (strtotime($endingDateTime) <= time()) {
                    echo "<h1 style='color: red;'>Auction Ended</h1>";
                  } else {
                  ?>
                    <?php
                    if ($currentBid < $reservePrice) {
                      $statusMessage = "Reserve price not met";
                    } else {
                      $statusMessage = "Highest bid meets the reserve price";
                    }
                    ?>
                      <div class="biddingSection">
                        <form action="place_bid.php" method="post">
                          <input type="hidden" name="itemId" value="<?php echo $id; ?>">
                          <input type="number" name="bidAmount" placeholder="Enter your bid" class="bidInput no-spinner" min="1" max="99999" required>
                          <input type="submit" class="submit" value="Place Bid">
                        </form>
                      </div>
                      <h4 class="statusMsg">Status: <b><?php echo $statusMessage ?></b></h4>
                </div>
              <?php
                  }
              ?>
              <div class="biddedUser">
                <h1>Bids:</h1>
                <table>
                  <thead>
                    <tr>
                      <th>Username</th>
                      <th>Time</th>
                      <th>Bid</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $bidQuery = "SELECT u.username, b.bid_time, b.bid_amount FROM bids b JOIN users u ON b.user_id = u.user_id WHERE b.item_id = $id ORDER BY b.bid_amount DESC";
                    $bidResult = mysqli_query($conn, $bidQuery);
                    if (mysqli_num_rows($bidResult) > 0) {
                      while ($bid = mysqli_fetch_assoc($bidResult)) {
                        echo "<tr>
                                  <td>{$bid['username']}</td>
                                  <td>{$bid['bid_time']}</td>
                                  <td>\${$bid['bid_amount']}</td>
                                </tr>";
                      }
                    } else {
                      echo "<tr><td colspan='3'>No bids placed yet.</td></tr>";
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              </div>
              <hr>

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

</html>
<?php
