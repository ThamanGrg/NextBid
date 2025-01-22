<?php
include_once('../php/connection.php');

if (isset($_POST['submit'])) {
    $itemName = $_POST['itemName'];
    $initialPrice = $_POST['initialPrice'];
    $maximumPrice = $_POST['maximumPrice'];
    $postDate = date("y/m/d");
    $startDate = $_POST['startDate'];
    $startTime = $_POST['startTime'];
    $endDate = $_POST['endDate'];
    $endTime = $_POST['endTime'];
    $itemDescription = $_POST['itemDescription'];

    $image_name = $_FILES['itemImage']['name'];
    $tmp = explode('.', $image_name);
    $newFileName = round(microtime(true)) . '.' . end($tmp);
    $uploadPath = "../uploads/" . $newFileName;
    move_uploaded_file($_FILES['itemImage']['tmp_name'], $uploadPath);

    $sql = "INSERT INTO products (item_name, initial_price, maximum_price, post_date, starting_date, startTime, ending_date, endTime, item_description, item_image) VALUES ('$itemName', '$initialPrice', '$maximumPrice', '$postDate', '$startDate', '$startTime', '$endDate', '$endTime', '$itemDescription', '$uploadPath')";

    $data = mysqli_query($conn, $sql);
    if ($data){
        header('location:../website/frontend/Create/create.php');
    }
}
