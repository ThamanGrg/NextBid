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

.dropDownCategory{
    display: none;
}

.navList li:hover .dropDownCategory{
    position: absolute;
    display: flex;
    width: 350px;
    height: 300px;
    padding: 40px;
    padding-left: 30px;
    background-color: #758BFD;
    z-index: 20;
    border-top-right-radius: 20px;
    border-bottom-left-radius: 20px;
    border-bottom-right-radius: 20px;
}

.dropDownCategory ul {
    list-style: none;
}

.dropDownCategory ul li {
    margin-bottom: 16px;
    font-weight: 400;
    font-size: 18px;
}

.dropDownCategory ul li:hover{
    background-color: #758BFD;
    color: #758BFD;
}

.dropDownCategory a{
    color: white;
    font-size: 19px;
    font-weight: 600;
    transition: font-size 0.2s, transform 0.2s;
}

.dropDownCategory a:hover{
    font-size: 19.5px;

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
    </div>
</header>