<?php
session_start();
include('../php/connection.php');

if (isset($_POST['submit'])) {
    
    $itemTitle = mysqli_real_escape_string($conn, $_POST['itemTitle']);
    $productCategory = mysqli_real_escape_string($conn, $_POST['category']);
    $initialPrice = $_POST['initialPrice'];
    $maximumPrice = $_POST['maximumPrice'];
    $postDate = date("Y/m/d");
    $startDate = $_POST['startDate'];
    $startTime = $_POST['startTime'];
    $endDate = $_POST['endDate'];
    $endTime = $_POST['endTime'];
    $itemDescription = mysqli_real_escape_string($conn, $_POST['itemDescription']);

    $itemCond = $_POST['item_Condition'];
    $noOfItem = $_POST['no_Item'];
    $location = $_POST['location'];

    $sql = "INSERT INTO products (item_title, product_category, initial_price, maximum_price, post_date, starting_date, startTime, ending_date, endTime, item_description) VALUES ('$itemTitle', '$productCategory', '$initialPrice', '$maximumPrice', '$postDate', '$startDate', '$startTime', '$endDate', '$endTime', '$itemDescription')";
    

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

        $allowedTypes = ['image/jpeg', 'image/png'];

        if (!in_array($_FILES['itemImages']['type'][$key], $allowedTypes)) {
            continue;
        }
    }
    
    $detailSQL = "INSERT INTO item_details (item_ID, item_condition, no_Item, location, user) VALUES ('$item_id', '$itemCond', '$noOfItem', '$location', 'ThamanGrg!23';";
    $subQuery = $conn->query($detailSQL);
    
    if ($data) {
        header('location:../Create/create.php');
    }
    
}
