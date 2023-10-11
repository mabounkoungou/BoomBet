<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "boombet";
$connection = new mysqli($servername, $username, $password, $database);


$name = "";
$email = "";
$password = "";
$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["id"])) {
        header("location:manage_user.php");
        exit;
    }
    $id = $_GET["id"];
    $sql = "SELECT * FROM usertable WHERE id = $id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location:manage_user.php");
        exit;
    }
    $name = $row["name"];
    $email = $row["email"];
    $password = $row["password"];
} else {
    if (!isset($_POST["id"])) {
        header("location:manage_user.php");
        exit;
    }
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $code = $_POST["code"];
    $status = $_POST["status"];
    $date = $_POST["date"];

    do {
        if (empty($name) || empty($email) || empty($password)) {
            $errorMessage = "All Fields are required";
            break;
        }
        $sql = "UPDATE usertable " .
            "SET name = '$name', email = '$email', password = '$password' " .
            "WHERE id = $id";


        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid Query: " . $connection->error;
            break;
        }
        $successMessage = "User Details Updated Successfully";
        header("location:manage_user.php");
        exit;
    } while (true);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>new users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css
">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container my-5">
        <h2 class="h2 text-center">NEW USERS</h2>
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
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name ?>"
                        placeholder="Enter the name">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email ?>"
                        placeholder="Enter the Email">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="password" value="<?php echo $password ?>"
                        placeholder="Enter the password">
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
                    <a class="btn btn-danger" href="manage_user.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>

</body>

</html>