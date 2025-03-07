<?php
while ($row = $result->fetch_assoc()) {
?>
    <header>
        <h1>Welcome, <?php echo $row['username']; ?></h1>
        <button id="theme-toggle">Light/Dark</button>
    </header>

    <section class="user-info">
        <div class="card">
            <h3>User Info</h3>
            <p>Name: <?php echo $row['name'] ?>;</p>
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