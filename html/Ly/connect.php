<?php
$servername = "localhost";
$username = "root";
$password = "qwertyuiop";
$dbname = "web";
$connect=mysqli_connect($servername, $username, $password, $dbname);//连接数据库
global $connect;
?>