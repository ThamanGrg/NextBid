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
<div class="container">
    <div>
<form action="update_settings.php" method="POST">
    <h3>Personal Information</h3>
    <div class="inputField">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>
    </div>
    <div class="inputField">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
    </div>
    <div class="inputField">
        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($row['phone']); ?>" required>
    </div>
    <button type="submit">Update Information</button>
</form>
</div>

</div>
<?php
             }
?>


<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }
    .container {
        max-width: 600px;
        margin: 0 auto;
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }
    h2, h3 {
        color: #333;
    }
    .inputField {
        margin-bottom: 15px;
    }
    label {
        display: block;
        font-weight: bold;
    }
    input[type="text"],
    input[type="email"],
    input[type="tel"],
    input[type="password"],
    input[type="file"] {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    button {
        background-color: #28a745;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
    }
    button:hover {
        background-color: #218838;
    }
    .delete-btn {
        background-color: #dc3545;
    }
    .delete-btn:hover {
        background-color: #c82333;
    }
</style>
