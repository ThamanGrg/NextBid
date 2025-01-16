<?php

include_once('connection.php');

function topItems($title = "A title of an Item", $timeLeft = "1 DAYS LEFT", $currentBid = "$0", $imageSrc = "../../../uploads/pexels-mikebirdy-3729464.jpg") {
    $element = <<<HTML
        <div class="topItemsCard">
            <div class="cardImage">
                <div class="imageContainer">
                    <img src="$imageSrc" alt="$title">
                </div>
            </div>

            <div class="itemDetails">
                <h2>$title</h2>
                <p>Time: $timeLeft</p>
                <p>Current Bid: $currentBid</p>
            </div>
            <a href="../Itemdetails/itemdetails.html"><button class="bidButton">Bid</button></a>
        </div>
    HTML;

    echo $element;
}

