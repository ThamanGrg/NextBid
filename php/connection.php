<?php

$servername = "localhost";
$username = "nextbid";
$password = "BibekThamanPrachanda";
$db = "nextbid";

$conn = new mysqli($servername, $username, $password, $db );

if ($conn->connect_error) {
    die("Connection failed: " .$conn->connect_error);
}
?>