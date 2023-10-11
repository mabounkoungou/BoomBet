<?php
$host = "sql301.infinityfree.com";
$username = "if0_35122151_boombet";
$password = "rrbfKXLmBIJI";
$database = "if0_35211532_boombet";

$con = mysqli_connect($host, $username, $password, $database);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>