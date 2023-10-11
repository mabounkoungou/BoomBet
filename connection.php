<?php
$host = "sql209.infinityfree.com";
$username = "if0_35211532";
$password = "JqF6lDOwVdc";
$database = "if0_35211532_boombet";

$con = mysqli_connect($host, $username, $password, $database);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>