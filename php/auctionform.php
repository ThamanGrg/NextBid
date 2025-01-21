<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $itemName = $_POST['itemName'];
    $initialPrice = $_POST['initialPrice'];
    $maximumPrice = $_POST['maximumPrice'];
    $startDate = $_POST['startDate'];
    $startTime = $_POST['startTime'];
    $endDate = $_POST['endDate'];
    $endTime = $_POST['endTime'];
    $itemDescription = $_POST['itemDescription'];

    echo  $itemName;
    echo $initialPrice;
    echo $maximumPrice;
    echo $startDate;
    echo $startTime;
    echo $endDate;
    echo $endTime;
    echo $itemDescription;
} 
?>

