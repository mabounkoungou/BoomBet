<?php
$servername = "fdb34.awardspace.net";
$username = "4072335_boombet";
$password = "Gr5XYRMj@7TEDRr";
$database = "4072335_boombet";

// Create a connection
$connection = new mysqli($servername, $username, $password, $database);

// Check if the connection is successful
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

?>