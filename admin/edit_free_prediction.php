<?php
include 'connection.php';



$League = "";
$Teams = "";
$Tips = "";
$Result = "";
$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["id"])) {
        header("location:free_predictions.php");
        exit;
    }
    $id = $_GET["id"];
    $sql = "SELECT * FROM free_predictions WHERE id = $id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location:free_predictions.php");
        exit;
    }
    $League = $row["League"];
    $Teams = $row["Teams"];
    $Tips = $row["Tips"];
    $Result = $row["Result"];
} else {
    if (!isset($_POST["id"])) {
        header("location:free_predictions.php");
        exit;
    }
    $id = $_POST["id"];
    $League = $_POST["League"];
    $Teams = $_POST["Teams"];
    $Tips = $_POST["Tips"];
    $Result = $_POST["Result"];

    do {
        if (empty($League) || empty($Teams) || empty($Tips) || empty($Result)) {
            $errorMessage = "All Fields are required";
            break;
        }
        $sql = "UPDATE free_predictions " .
            "SET League = '$League', Teams = '$Teams', Tips = '$Tips', Result = '$Result' " .
            "WHERE id = $id";


        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid Query: " . $connection->error;
            break;
        }
        $successMessage = "Prediction Updated Successfully";
        header("location:free_predictions.php");
        exit;
    } while (true);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEW-FREE-PRE</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css
">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container my-5">
        <h2 class="h2 text-center">NEW PREDICTIONS</h2>
        <?php
        if (!empty($errorMessage)) {
            echo "
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>$errorMessage</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
        </div>
        ";
        }
        ?>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">League</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="League" value="<?php echo $League ?>"
                        placeholder="Enter the Leaugue e.g Premier Leaugue etc...">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Teams</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Teams" value="<?php echo $Teams ?>"
                        placeholder="Enter the Teams e.g Livpool Vs Mancity">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Tips</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Tips" value="<?php echo $Tips ?>"
                        placeholder="Enter the Tips e.g HOME ,DRAW, AWAY, Over 2.5, Under 0.5">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Result</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Result" value="<?php echo $Result ?>"
                        placeholder="Enter the Result Win or Lose">
                </div>
            </div>
            <?php
            if (!empty($successMessage)) {
                echo "
            <div class='row mb-3'>
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>$successMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
            </div>
            </div>
            ";
            }
            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3  d-grid ">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-danger" href="free_predictions.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>

</body>

</html>
