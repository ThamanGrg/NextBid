<footer>
    <div class="footerMenus">
        <div class="Menu">
            <h1>Menu</h1>
            <a href="#">Home</a>
            <a href="../Browse/browse.php">Browse Auctions</a>
            <a href="#login">Login</a>
            <a href="#register">Register</a>
            <a href="../Create/create.php">Create an Auction</a>
        </div>
        <hr>
        <div class="supports">
            <h1>Supports</h1>
            <a href="#terms">Terms & conditions</a>
            <a href="#privacy">Privacy Policy</a>
        </div>
        <hr>
        <div class="aboutUs">
            <h1>About Us</h1>
            <a href="#">About Us</a>
            <a href="#">Contact Us</a>
            <a href="#">Partners</a>
        </div>
    </div>
    <div class="socialLinks">
        <div>
            <a href="#"><img src="../../assets/icons/facebook.png" alt=""></a>
            <a href="#"><img src="../../assets/icons/instagram (1).png" alt=""></a>
            <a href="#"><img src="../../assets/icons/twitter.png" alt=""></a>
        </div>
    </div>
    <style>
        footer {
            width: 100%;
            height: 500px;
            margin-top: 10%;
            background-color: #F8F8FA;
            border-radius: 20px;
            display: flex;
            justify-content: center;
            position: relative;
        }

        .socialLinks {
            background-color: #758BFD;
            width: 80%;
            height: 50px;
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translate(-50%, 50%);
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .socialLinks img {
            width: 30px;
            padding-left: 15px;
            padding-top: 5px;
        }

        .footerMenus {
            display: flex;
            justify-content: center;
            margin-top: 100px;
        }

        .footerMenus a {
            font-size: 18px;
            margin: 2px 0;
        }

        .footerMenus div {
            display: flex;
            flex-direction: column;
            margin: 0 100px;
            top: 0;
        }

        .footerMenus h1 {
            font-size: 50px;
            margin-bottom: 20px;
        }

        .footerMenus hr {
            transform: rotate(0deg);
            transform-origin: center;
            height: 300px;
            background-color: #D9D9D9;
        }
    </style>
</footer>