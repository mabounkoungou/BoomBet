<?php
if ($_GET['status'] !== "success") {
    header("location:javascript://history.go(-1)");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <title>premium predictions</title>
    <link rel="shortcut icon" href="/images1/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css
">
</head>

<body>
    <div class="container my-5">
        <h2 class="h2 text-center">PREMIUM PREDICTIONS</h2>

        <br>
        <table class="table">
            <thead>
                <tr>

                    <th>League</th>
                    <th>Teams</th>
                    <th>Tips</th>
                    <th>Result</th>
                    <td>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'connection.php';
                $sql = "SELECT * FROM `premium_predictions`";
                $result = $con->query($sql);
                if (!$result) {
                    die("Invalid query: " . $con->error);
                }
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                    <td>$row[League]</td>
                    <td>$row[Teams]</td>
                    <td>$row[Tips]</td>
                    <td>$row[Result]</td>
                </tr>
                    ";
                }
                ?>

            </tbody>

        </table>
    </div>
    <script>
        <?php
        // premium.php
        
        // Check if the user has a "paymentStatus" cookie
        if (isset($_COOKIE['paymentStatus'])) {
            $paymentStatus = $_COOKIE['paymentStatus'];

            if ($paymentStatus === 'completed') {
                // The user has completed the payment, continue to premium content or display a message
                echo "You have access to premium content.";
            } else {
                // The payment was not completed, display a message or take appropriate action
                echo "Payment not completed. Please make a payment to access premium content.";
            }
        } else {
            // No "paymentStatus" cookie found, handle accordingly (e.g., display an error message)
            echo "No payment status found. Please make a payment to access premium content.";
        }
        ?>

    </script>
</body>

</html>