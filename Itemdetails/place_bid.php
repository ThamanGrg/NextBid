<?php
session_start();
include('../php/connection.php');

if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to place a bid.");
}

$itemId = $_POST['itemId'];
$bidAmount = $_POST['bidAmount'];
$userId = $_SESSION['user_id'];

$query = "SELECT MAX(bid_amount) as max_bid FROM bids WHERE item_id = $itemId";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$highestBid = $row['max_bid'] ?? 0;

if ($bidAmount > $highestBid) {
    $insertBid = "INSERT INTO bids (item_id, user_id, bid_amount) VALUES ('$itemId', '$userId', '$bidAmount')";
    if (mysqli_query($conn, $insertBid)) {
        $message= "Bid placed successfully!";
        header("Location: itemdetails.php?itemId=$itemId&status='success'");
        exit();
    } else {
        echo '"Error: " . mysqli_error($conn)';
        header("Location: itemdetails.php?itemId=$itemId");
    }
} else {
    header("Location: itemdetails.php?itemId=$itemId");
}
?>
