<?php
$hostname = "127.0.0.1";
$user = "root";
$password = "";
$database = "impl_github";
$db = mysqli_connect($hostname,$user,$password,$database);
mysqli_set_charset($db,"UTF8");
?>