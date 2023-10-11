<?php
include 'connection.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM free_predictions WHERE id = $id";
    $connection->query($sql);

    // Redirect to the appropriate page after deleting the record
    header("location: free_predictions.php");
    exit;
}

?>