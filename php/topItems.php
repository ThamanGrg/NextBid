<?php

function topItems(){
    $element =
    "
        <div class=\"topItemsCard\">
            <div class=\"cardImage\">
                <div class=\"imageContainer\">
                    <img src=\"../../../uploads/pexels-mikebirdy-3729464.jpg\" alt=\A title of an Item\">
                </div>
            </div>

            <div class=\"itemDetails\">
                <h2>A title of an Item</h2>
                <p>Time: 1 DAYS LEFT</p>
                <p>Current Bid: $00</p>
            </div>
            <button class=\"bidButton\">Bid</button>
        </div>
    ";
    echo $element;
}