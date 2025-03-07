<?php
session_start();
include("../php/connection.php");
if(isset($_SESSION['username'])){
    $uname = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username = '$uname'";
    $result = $conn->query($query);
}
?>
<?php
             while($row = $result->fetch_assoc()) {
            ?>
            <header>
                <h1>Welcome, <?php echo $row['username']; ?></h1>
                <button id="theme-toggle">Light/Dark</button>
            </header>

            <section class="user-info">
                <div class="card">
                    <div>
                        <h3>User Info</h3>
                    <p>Name: <?php echo $row['name']?></p>
                    <p>Email: <?php echo $row['email']; ?></p>
                    <p>Phone no: 9876543210</p>
                    <p>Address: Nepal,Pokhara</p>
                </div>
                    <div>
                        <img src="../assets/icons/man avatar with circle frame_8515464.png" alt="">
                    </div>
                </div>
              
            </section>
            <?php
            }
            ?>
