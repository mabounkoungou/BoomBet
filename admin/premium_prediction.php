<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <title>CODES</title>
    <link rel="shortcut icon" href="/images1/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css
">
</head>

<body>
    <div class="container my-5">
        <h2 class="h2 text-center">BETTING CODES</h2>
        <a class="btn btn-primary" role="button" href="add_code.php">NEW CODES</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Sporty</th>
                    <th>Betway</th>

                    <td>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'connection.php';
                $sql = "SELECT * FROM `betting_code`";
                $result = $connection->query($sql);
                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[Sporty]</td>
                    <td>$row[Betway]</td>
                    
                    <td>
                        <a class='btn btn-primary btn-sm' href='edit_code.php?id=$row[id]'>Edit</a>
                        <a class='btn btn-danger btn-sm' href='delete_code.php?id=$row[id]'>Delete</a>
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