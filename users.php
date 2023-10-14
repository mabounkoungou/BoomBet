<?php
include 'connection.php';

$name = "";
$email = "";
$password = "";
$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["id"])) {
        header("location: manage_user.php");
        exit;
    }

    $id = $_GET["id"];
    $sql = "SELECT * FROM usertable WHERE id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: manage_user.php");
        exit;
    }

    $name = $row["name"];
    $email = $row["email"];
    $password = $row["password"];
} else {
    if (!isset($_POST["id"])) {
        header("location: manage_user.php");
        exit;
    }

    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($name) || empty($email) || empty($password)) {
        $errorMessage = "All Fields are required";
    } else {
        $sql = "UPDATE usertable SET name = ?, email = ?, password = ? WHERE id = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("sssi", $name, $email, $password, $id);

        if ($stmt->execute()) {
            $successMessage = "User Details Updated Successfully";
            header("location: manage_user.php");
            exit;
        } else {
            $errorMessage = "Failed to update user details: " . $stmt->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ... (same as before) ... -->
</head>

<body>
    <div class="container my-5">
        <h2 class="h2 text-center">EDIT USER DETAILS</h2>
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
            <!-- ... (same as before) ... -->
        </form>
        <!-- ... (same as before) ... -->
    </div>
    <!-- ... (same as before) ... -->
</body>

</html>