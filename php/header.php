<style>
    .header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 5px;
    }

    .logo {
        width: 150px;
    }

    .logo img {
        width: 100%;
    }

    .nav {
        font-size: 18px;
        color: #655C5C;
        display: flex;
        position: relative;
    }

    .nav .navList {
        display: flex;
        list-style: none;
    }

    .nav .navList li {
        padding: 0 20px;
        font-weight: 700;
    }

    a {
        color: #655C5C;
        text-decoration: none;
    }

    a:active {
        color: #758BFD;
    }

    .notification img {
        width: 30px;
    }

    .loginSignup button {
        background-color: #758BFD;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 50px;
        width: 230px;
        border: none;
        border-radius: 40px;
        padding-right: 10px;
        color: white;
        font-weight: 600;
    }

    .loginSignup button img {
        height: 50%;
        margin-left: 16px;
        margin-right: 20px;
    }

    .dropDownCategory {
        display: none;
    }

    .nav ul li:hover .dropDownCategory {
        display: block;
        position: absolute;
        left: 0;
        top: 100%;
        width: 400px;
        height: 300px;
        background-color: #758BFD;
        color: white;
        padding: 40px;
        border-radius: 20px;
        border-top-left-radius: 0;
        z-index: 10;
    }

    .dropDownCategory ul {
        display: block;
        list-style: none;
    }

    .dropDownCategory ul li {
        margin-bottom: 16px;
        font-weight: 400;
        font-size: 18px;
    }

    .dropDownCategory ul li a {
        color: white;
    }

    .dropDownCategory ul li:hover {
        font-weight: 600;
    }
</style>
<header>
    <div class="header">
        <div class="logo">
            <img src="../assets/logo.png" alt="logo">
        </div>
        <div class="nav">
            <ul class="navList">
                <li><a href="../index.php">Home</a></li>
                <li><a href="../Browse/browse.php">Browse Auction</a></li>
                <li class="categoryDD">Category
                    <div class="dropDownCategory">
                        <ul>
                            <li><a href="">Vintage Items & antiques</a></li>
                            <li><a href="">Automobiles</a></li>
                            <li><a href="">Decorative items & gifts</a></li>
                            <li><a href="">Arts</a></li>
                            <li><a href="">Jewellery</a></li>
                            <li><a href="">Furnitures</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="../Create/create.php">Create Auction</a></li>
                <li><a href="#Contacts">Contacts</a></li>
            </ul>
        </div>
        <div class="notification">
            <img src="../assets/icons/bell.png" alt="">
        </div>
        <div class="loginSignup">
            <button class="btnLogin-popup" onclick="loginForm();"><img src="../assets/icons/user.png" alt="user">Login</button>
        </div>
</header>