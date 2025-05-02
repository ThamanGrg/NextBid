<?php
session_start();
include('../php/connection.php');

if (!isset($_SESSION['user_id'])) {
    $_SESSION['message'] = "Login first for bidding";
    header('Location: ../index.php');
    exit();
}

$itemId = intval($_POST['auctionId']);
$bidAmount = floatval($_POST['bidAmount']);
$userId = intval($_SESSION['user_id']);

$query = "SELECT MAX(b.bid_amount) AS max_bid, p.reserve_price FROM bids b JOIN products p ON b.auction_id = p.item_ID WHERE b.auction_id = $itemId";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$highestBid = $row['max_bid'] ?? 0;
$reservedPrice = $row['reserve_price'];

if ($bidAmount > $highestBid && $bidAmount >= $reservedPrice) {
    $insertBid = "INSERT INTO bids (auction_id, user_id, bid_amount) VALUES ($itemId, $userId, $bidAmount)";
    if (mysqli_query($conn, $insertBid)) {
        $_SESSION['message'] = "Bid placed successfully";
    } else {
        $_SESSION['message'] = "Error placing bid: " . mysqli_error($conn);
    }
} else {
    $_SESSION['message'] = "Bid must be higher than the current bid and at least the reserved price.";
}

header("Location: itemdetails.php?itemId=$itemId");
exit();
?>
