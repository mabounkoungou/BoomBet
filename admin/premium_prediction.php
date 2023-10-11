<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <title>Free predictions</title>
    <link rel="shortcut icon" href="/images1/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css
">
</head>

<body>
    <div class="container my-5">
        <h2 class="h2 text-center">PREMIUM PREDICTIONS</h2>
        <a class="btn btn-primary" role="button" href="add_premium.php">NEW PREDICTION</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>League</th>
                    <th>Teams</th>
                    <th>Tips</th>
                    <th>Result</th>
                    <th>Action</th>
                    <td>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'connection.php';
                $sql = "SELECT * FROM `premium_predictions`";
                $result = $connection->query($sql);
                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[League]</td>
                    <td>$row[Teams]</td>
                    <td>$row[Tips]</td>
                    <td>$row[Result]</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='edit_premium.php?id=$row[id]'>Edit</a>
                        <a class='btn btn-danger btn-sm' href='delete_pre.php?id=$row[id]'>Delete</a>
                    </td>
                </tr>
                    ";
                }
                ?>

            </tbody>

        </table>
    </div>
</body>

</html>