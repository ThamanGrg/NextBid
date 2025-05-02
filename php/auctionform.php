<?php
session_start();
include('../php/connection.php');
if (isset($_SESSION['username'])) {
    $uname = $_SESSION['username'];
}
if (isset($_POST['submit'])) {

    $itemTitle = mysqli_real_escape_string($conn, $_POST['itemTitle']);
    $productCategory = mysqli_real_escape_string($conn, $_POST['category']);
    $maximumPrice = $_POST['maximumPrice'];
    $reservePrice = $_POST['reservePrice'];
    $postDate = date("Y/m/d");
    $startDate = $_POST['startDate'];
    $startTime = $_POST['startTime'];
    $endDate = $_POST['endDate'];
    $endTime = $_POST['endTime'];
    $itemDescription = mysqli_real_escape_string($conn, $_POST['itemDescription']);

    $itemCond = $_POST['item_Condition'];
    $noOfItem = $_POST['no_Item'];
    $location = $_POST['location'];

    $sql = "INSERT INTO products (item_title, product_category, maximum_price, reserve_price, post_date, starting_date, startTime, ending_date, endTime, item_description) VALUES ('$itemTitle', '$productCategory', '$maximumPrice', '$reservePrice','$postDate', '$startDate', '$startTime', '$endDate', '$endTime', '$itemDescription')";


    $data = mysqli_query($conn, $sql);

    if (!$data) {
        die("Query Failed: " . mysqli_error($conn));
    }

    $item_id = $conn->insert_id;

    foreach ($_FILES['itemImages']['tmp_name'] as $key => $tmp_name) {
        $fileName = $_FILES['itemImages']['name'][$key];
        $filePath = "../uploads/" . $fileName;

        if (move_uploaded_file($tmp_name, $filePath)) {
            if ($key === 0) {
                $isPrimary = 1;
            } else {
                $isPrimary = 0;
            }
            $conn->query("INSERT INTO item_images (item_ID, image_path, is_primary) VALUES ($item_id, '$filePath', $isPrimary)");
        }

        $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];

        if (!in_array($_FILES['itemImages']['type'][$key], $allowedTypes)) {
            continue;
        }
    }


    if ($data) {
        $detailSQL = "INSERT INTO item_details (item_ID, item_condition, no_Item, location, user) VALUES ('$item_id', '$itemCond', '$noOfItem', '$location', '$uname')";
        $subQuery = $conn->query($detailSQL);

        if ($data) {
            header('location:../Create/create.php');
            exit();
        }
    }
}
