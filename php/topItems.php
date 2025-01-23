<?php

include_once('connection.php');
$sql = "SELECT * FROM products";

$result = mysqli_query($conn, $sql);

function topItems()
{
    $element = <<<HTML
            <div class="topItemsCard">
                <div class="cardImage">
                    <div class="imageContainer">
                        <img src="../uploads/">
                    </div>
                </div>

                <div class="itemDetails">
                    <h2><?php ?></h2>
                    <p>Time: 1 hrs</p>
                    <p>Current Bid: 200</p>
                </div>
                <a href="../Itemdetails/itemdetails.php"><button class="bidButton">Bid</button></a>
            </div>
        HTML;

    echo $element;
}
