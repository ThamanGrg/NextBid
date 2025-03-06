<?php
session_start();
include("../php/connection.php");
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username = '$username'";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="userdashboard.css?version=1.1">
</head>
<body>
    <div class="dashboard">
        <nav class="sidebar">
            <h2>Dashboard</h2>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="../php/logout.php">Logout</a></li>
            </ul>
        </nav>
        <div class="main-content">
            <?php
             while($row = $result->fetch_assoc()) {
            ?>
            <header>
                <h1>Welcome, <?php echo $row['username']; ?></h1>
                <button id="theme-toggle">Light/Dark</button>
            </header>

            <section class="user-info">
                <div class="card">
                    <h3>User Info</h3>
                    <p>Name: Anech Darai</p>
                    <p>Email:<?php echo $row['email']; ?></p>
                    <p>Phone no: 9876543210</p>
                    <p>Address: Nepal,Pokhara</p>
                </div>
                <div class="card">
                    <h3>Stats</h3>
                    <p>Projects: 5</p>
                    <p>Tasks Completed: 12</p>
                </div>
            </section>
            <?php
            }
            ?>
        </div>
    </div>

    <script src="script.js"></script>
</body>
<script>
    document.getElementById('theme-toggle').addEventListener('click', function() {
    document.body.classList.toggle('dark-mode');
});
</script>
</html>
