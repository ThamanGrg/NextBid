<?php
session_start();
include("../php/connection.php");
if(isset($_SESSION['username'])){
    $uname = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username = '$uname'";
    $result = $conn->query($query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="userdashboard.css?version=1.4">
</head>
<body>
    <div class="dashboard">
        <nav class="sidebar">
            <h2>Dashboard</h2>
            <ul>
            <li><a href="../index.php">Home</a></li>
                <li><a href="#" onclick="loadContent('profile.php'); return false;">Profile</a></li>
                <li><a href="#" onclick="loadContent('setting.php'); return false;">Settings</a></li>
                <li><a href="#" onclick="loadContent('account.php'); return false;">Account</a></li>
                <li><a href="../php/logout.php">Logout</a></li>
                
            </ul>
        </nav>
        <div class="main-content">

        </div>
    </div>

    <script src="script.js"></script>
</body>
<script>
    document.getElementById('theme-toggle').addEventListener('click', function() {
    document.body.classList.toggle('dark-mode');
});
</script>
<script>
window.onload = function () {
        loadContent('profile.php');
    };

function loadContent(page) {
    const mainContent = document.querySelector('.main-content');
    mainContent.innerHTML = '<div class="loading">Loading...</div>'; // Loading text while fetching data

    fetch(page)
        .then(response => response.text())
        .then(data => {
            mainContent.innerHTML = data;
        })
        .catch(() => {
            mainContent.innerHTML = '<p>Error loading content!</p>';
        });
}
</script>
</html>