<?php
include_once('../php/connection.php');

if (isset($_POST['submit'])) {
    
    $itemTitle = $_POST['itemTitle'];
    $initialPrice = $_POST['initialPrice'];
    $maximumPrice = $_POST['maximumPrice'];
    $postDate = date("y/m/d");
    $startDate = $_POST['startDate'];
    $startTime = $_POST['startTime'];
    $endDate = $_POST['endDate'];
    $endTime = $_POST['endTime'];
    $itemDescription = $_POST['itemDescription'];

    $sql = "INSERT INTO products (item_title, initial_price, maximum_price, post_date, starting_date, startTime, ending_date, endTime, item_description) VALUES ('$itemTitle', '$initialPrice', '$maximumPrice', '$postDate', '$startDate', '$startTime', '$endDate', '$endTime', '$itemDescription')";

    $data = mysqli_query($conn, $sql);


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
            ($conn->query("INSERT INTO item_images (item_ID, image_path, is_primary) VALUES ($item_id, '$filePath', $isPrimary)"));
        }

        $allowedTypes = ['image/jpeg', 'image/png'];

        if (!in_array($_FILES['itemImages']['type'][$key], $allowedTypes)) {
            continue;
        }
    }
    if ($data) {
        header('location:../website/frontend/Create/create.php');
    }
    
}
