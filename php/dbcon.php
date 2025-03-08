<?php 

define('DB_server',"localhost");
define('DB_username',"nextbid");
define('DB_password',"BibekThamanPrachanda");
define('DB_database',"nextbid");

$conn = mysqli_connect(DB_server,DB_username,DB_password,DB_database);

if(!$conn){
    die("connection Failed: ".mysqli_connect_error());
}


?>