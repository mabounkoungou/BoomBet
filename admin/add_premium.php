<?php
include 'connection.php';

$Sporty = "";
$Betway = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Sporty = $_POST["Sporty"];
    $Betway = $_POST["Betway"];
    do {
        if (empty($Sporty) || empty($Betway)) {
            $errorMessage = "All Fields are required";
            break;
        }

        // Construct the SQL query with placeholders
        $sql = "INSERT INTO betting_code (Sporty, Betway) VALUES (?, ?)";

        // Prepare the statement
        $stmt = $connection->prepare($sql);

        // Bind parameters and values
        $stmt->bind_param("ss", $Sporty, $Betway);

        // Execute the prepared statement
        if ($stmt->execute()) {
            // Query executed successfully
            $successMessage = "Predictions have been successfully added!";
        } else {
            // Query execution failed
            $errorMessage = "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();

        // Clear input fields
        $Sporty = "";
        $Betway = "";


        // Redirect to the specified page
        header("location: code.php");
    } while (false);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>code</title>
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
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Sporty</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Sporty" value="<?php echo $Sporty ?>"
                        placeholder="Enter the Leaugue e.g 63G6E78 etc...">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Betway</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Betway" value="<?php echo $Betway ?>"
                        placeholder="Enter the Betway e.g GE645HR">
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