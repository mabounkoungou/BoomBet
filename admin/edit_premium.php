<?php
include 'connection.php';


$Sporty = "";
$Betway = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["id"])) {
        header("location:code.php");
        exit;
    }
    $id = $_GET["id"];
    $sql = "SELECT * FROM betting_code WHERE id = $id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location:code.php");
        exit;
    }
    $League = $row["Sporty"];
    $Betway = $row["Betway"];

} else {
    if (!isset($_POST["id"])) {
        header("location:code.php");
        exit;
    }
    $id = $_POST["id"];
    $League = $_POST["Sporty"];
    $Betway = $_POST["Betway"];


    do {
        if (empty($Sporty) || empty($Betway)) {
            $errorMessage = "All Fields are required";
            break;
        }
        $sql = "UPDATE premium_predictions " .
            "SET Sporty = '$Sporty', Betway = '$Betway'" .
            "WHERE id = $id";


        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid Query: " . $connection->error;
            break;
        }
        $successMessage = "Prediction Updated Successfully";
        header("location:code.php");
        exit;
    } while (true);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>codes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css
">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container my-5">
        <h2 class="h2 text-center">NEW CODES</h2>
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
                <label class="col-sm-3 col-form-label">SportyBet codes</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Sporty" value="<?php echo $Sporty ?>"
                        placeholder="Enter the code e.g H25HEB4 etc...">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">BETWAY CODES</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Betway" value="<?php echo $Betway ?>"
                        placeholder="Enter the code e.g 3G563UE">
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
                    <a class="btn btn-danger" href="code.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>

</body>

</html>