<?php
include_once('../../../php/connection.php');

$query = "SELECT * FROM products p LEFT JOIN item_images i ON p.item_ID = i.item_ID WHERE i.is_primary = 1";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>NextBid (Online Auction)</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="browse.css?version=1">
</head>

<body>
    <?php
    require_once('../../../php/header.php');
    ?>
    <div class="TopSection">
        <div class="TotalAuction">
            <h2>100</h2>
            <p>Auction</p>
        </div>
        <div class="searchBox">
            <input type="text" placeholder="Search for item..." maxlength="50" class="SearchButton"><button><img src="../../assets/icons/magnifying-glass.png" alt="">Search</button>
        </div>
        <div class="PerPageButton">
            <label for="per-page">Per Page:</label>
            <select id="per-page">
                <option value="30">30</option>
                <option value="50">50</option>
                <option value="70">70</option>
            </select>
        </div>
    </div>
    <div class="main">
        <div class="leftSection">
            <div class="filterSection">
                <div class="title">
                    <h3>Filter</h3>
                </div>
                <div class="categories">
                    <h4>Categories</h4>
                    <ul>
                        <li><input type="checkbox"> Vintage Items & Antiques</li>
                        <li><input type="checkbox"> Automobiles</li>
                        <li><input type="checkbox"> Decorative items & Gifts</li>
                        <li><input type="checkbox"> Arts</li>
                        <li><input type="checkbox"> Jewellery</li>
                        <li><input type="checkbox"> Furniture</li>
                    </ul>
                </div>
                <hr>
                <div class="dateSection">
                    <h4>Dates</h4>
                    <ul>
                        <li><input type="checkbox"> All Dates</li>
                        <li><input type="checkbox"> Next 5 days</li>
                        <li><input type="checkbox"> Next 10 days</li>
                        <li><input type="checkbox"> Next 15 days</li>
                        <li><input type="checkbox"> Next 30 days</li>
                    </ul>
                </div>
                <hr>
                <div class="locationSection">
                    <h4>Sale Location</h4>
                    <label for="Location">Select Location:</label>
                    <select name="saleLocation" id="">
                        <option value="None">None</option>
                        <option value="">United State</option>
                        <option value="">Australia</option>
                        <option value="">United Kingdom</option>
                        <option value="">Canada</option>
                        <option value="">Nepal</option>
                        <option value="">Germany</option>
                        <option value="">France</option>
                    </select>
                </div>
                <hr>
                <div class="startingSection">
                    <h4>Price range</h4>
                    <div class="price">
                        <label for="filter Price">Minimum Price:</label>
                        <input type="text" min="0" maxlength="10">
                    </div>
                    <div class="price">
                        <label for="filter Price">Maximum Price:</label>
                        <input type="text" min="0" maxlength="10">
                    </div>

                </div>
            </div>
        </div>
        <div class="rightSection">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <div class="ItemCard">
                    <div class="itemImage">
                        <div class="imageCard">
                            <img src="../../../uploads/<?php echo $row['image_path']; ?>">
                        </div>
                    </div>
                    <div class="itemRight">
                        <div class="itemDetails">
                            <div class="itemTitle">
                                <h3><?php echo $row['item_title']; ?></h3>
                            </div>
                            <div class="item-Bottom">
                                <div class="itemDescription">
                                    <p>Seller: Thaman@123</p><br>
                                    <p>Location: Pokhara, kaski</p><br>
                                    <p>December 13, 2024 | 22:22</p><br>
                                    <p>Est: $15-$25</p><br>
                                </div>
                                <div class="itemLinks">
                                    <a href="">View item</a>
                                    <a href="../Register/bidRegister"><button>Register to bid</button></a>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <hr>
            <?php
            }
            ?>


        </div>
    </div>
    </div>

    <?php
    include_once("../../../php/footer.php")

    ?>
</body>

</html>