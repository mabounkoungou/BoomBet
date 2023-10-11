<?php
include 'connection.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM usertable WHERE id = $id";
    $connection->query($sql);

    // Redirect to the appropriate page after deleting the record
    header("location: manage_user.php");
    exit;
}

?>