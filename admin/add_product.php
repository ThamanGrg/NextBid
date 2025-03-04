<?php
include ('../php/connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <h2>Ecom Admin</h2>
            <ul>
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li>
                    <a href="#">Users</a>
                </li>
                <li>
                    <a href="#">Add products</a>
                </li>
                <li>
                    <a href="#">View products</a>
                </li>
            </ul>

        </div>
        <div class="header">
            <div class="admin_header">
                <a href="#">Logout</a>
            </div>
            <div class="info">

           <h1>Add products</h1>

           <div class="my_from">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="div_deg">
                    <label>Tittle</label>
                    <input type="text" name="tittle">
                </div>

                <div class="div_deg">
                    <label>Description</label>
                    <textarea name="description"></textarea>
                </div>

                <div class="div_deg">
                    <label>Price</label>
                    <input type="number" name="price">
                </div>

                <div class="div_deg">
                    <label>Quantity</label>
                    <input type="number" name="qty">
                </div>

                <div class="div_deg">
                    <label>Product image </label>
                    <input type="file" name="my_image">
                </div>

                <div class="div_deg">
                    
                    <input type="submit" name="add_product" value="Add product">
                </div>
            </form>
           </div>

            </div>
        </div>
</body>
</html>