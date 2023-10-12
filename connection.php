<?php
$host = "st";
$username = "root";
$password = "";
$database = "boombet";

$con = mysqli_connect($host, $username, $password, $database);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>