<?php
include('connection.php');

$query = "SELECT * FROM products";
$result = $conn->query($query);
if ($result === false) {
    die("Error executing query: " . $conn->error);
}

if (isset($_GET['id']) && isset($_GET['action'])) {
    $id = $_GET['id'];
    $action = $_GET['action'];

    if ($action == 'accept') {
        $Aquery = "UPDATE products SET status = 'accepted' WHERE item_ID = $id";
        if ($conn->query($Aquery) === TRUE) {
            header("Location: ../admin/auctions.php");
            exit;
        } else {
            header("Location: ../admin/auctions.php?error=Error accepting auction: " . $conn->error);
            exit;
        }
    } elseif ($action == 'reject') {
        $Rquery = "UPDATE products SET status = 'rejected' WHERE item_ID = $id";
        if ($conn->query($Rquery) === TRUE) {
            header("Location: ../admin/auctions.php");
            exit;
        } else {
            header("Location: ../admin/auctions.php?error=Error rejecting auction: " . $conn->error);
            exit;
        }
    } else {
        $Dquery = "DELETE FROM products WHERE item_ID = $id";
        if ($conn->query($Dquery) === TRUE) {
            header("Location: ../admin/auctions.php");
            exit;
        } else {
            header("Location: ../admin/auctions.php?error=Error deleting auction: " . $conn->error);
            exit;
        }
    }
} else {
    echo "Invalid request.";
}
?>