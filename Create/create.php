<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width" , initial-scale="1.0">
    <title>NextBid (Online Auction)</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="create.css?version=1.1">
</head>

<body>
    <?php
    require_once('../php/header.php');
    ?>
    <section>
        <div class="container">

            <div class="auctionCreateForm">
                <div class="Title">
                    <h1>Create an Auction</h1>
                    <h3>Fill the below form to apply for creation of auction.</h3>
                </div>
                <form action="../php/auctionform.php" method="post" enctype="multipart/form-data">
                    <div class="inputField">
                        <label for="Item Title">Item Title: </label>
                        <input type="text" name="itemTitle" id="itemTitle" maxlength="255" required>
                    </div>
                    <div class="inputField">
                        <label for="initial Price">Initial Price($): </label>
                        <input type="number" name="initialPrice" id="initialPrice" required>
                    </div>

                    <div class="inputField">
                        <label for="maximum price">Maximum Price($): </label>
                        <input type="number" name="maximumPrice" id="maximumPrice" required>
                    </div>

                    <div class="inputField">
                        <label for="start Date">Starting Date: </label>
                        <input type="date" name="startDate" id="startDate" required>
                        <input type="time" name="startTime" id="startTime" required>
                    </div>

                    <div class="inputField">
                        <label for="end Date">Ending Date: </label>
                        <input type="date" name="endDate" id="endDate" required>
                        <input type="time" name="endTime" id="endTime" required>
                    </div>

                    <div class="inputField">
                        <label for="category">Category: </label>
                        <select name="category" id="category">
                            <option value="" class="none"></option>
                            <option value="Vintage items and Antiques">Vintage items and Antiques</option>
                            <option value="Automobiles">Automobiles</option>
                            <option value="Arts">Arts</option>
                            <option value="Jewellery">Jewellery</option>
                            <option value="Furniture">Furniture</option>
                            <option value="Decorative items & Gifts">Decorative items & Gifts</option>
                        </select>
                    </div>

                    <div class="inputField">
                        <label for="Description">Item description: </label>
                        <textarea name="itemDescription" id="itemDescription" maxlength="255"></textarea required>
        </div>

        <div class="inputField">
            <label for="Item Image">Item image:</label>
            <input type="file" name="itemImages[]" id="itemImage" multiple>
        </div>
        <div class="submit">
            <input type="submit" class="submitButton" name="submit">
        </div>
    </form>
</div>

</div>
    </section>
    
    <?php
    include_once("../php/footer.php");
    ?>
</body>

</html>