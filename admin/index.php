<?php
  include('includes/header.php');
  include('../php/connection.php');

  $userNum = mysqli_query($conn, 'SELECT * FROM users');
  $userRows = mysqli_num_rows($userNum);
  $auctionsNum = mysqli_query($conn, 'SELECT * FROM products');
  $auctionRows = mysqli_num_rows($auctionsNum);
?>
<div class="container">
  <div class="totalDetails">
    <div class="totalCard">
      <div>
        <h2><?php echo $userRows ?></h2>
      </div>
      <div>
        <h2>Users</h2>
      </div>
    </div>
    <div class="totalCard">
      <div>
        <h2><?php echo $auctionRows ?></h2>
      </div>
      <div>
        <h2>Auctions</h2>
      </div>
    </div>
  </div>
</div>