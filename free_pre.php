<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Free predictions</title>
    <link rel="shortcut icon" href="/images1/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            font-size: 16px;
        }

        h2 {
            font-size: 24px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <h2 class="h2 text-center">FREE PREDICTIONS</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>League</th>
                        <th>Teams</th>
                        <th>Tips</th>
                        <th>Result</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'connection.php';
                    $sql = "SELECT * FROM `free_predictions`";
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
    </div>
</body>

</html>