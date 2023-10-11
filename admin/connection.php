<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "boombet";

// Create a connection
$connection = new mysqli($servername, $username, $password, $database);

// Check if the connection is successful
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

?>