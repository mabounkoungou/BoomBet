<?php require_once "controllerUserData.php"; ?>
<?php
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if ($email != false && $password != false) {
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if ($run_Sql) {
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if ($status == "verified") {
            if ($code != 0) {
                header('Location: reset-code.php');
            }
        } else {
            header('Location: user-otp.php');
        }
    }
} else {
    header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

        body {
            overflow-x: hidden;
            /* Prevent horizontal scrolling */
        }

        nav {
            background: burlywood;
            font-family: 'Poppins', sans-serif;
        }

        nav a.navbar-brand {
            color: #fff;
            font-size: 30px !important;
            font-weight: 500;
        }

        button a {
            color: burlywood;
            font-weight: 500;
        }

        button a:hover {
            text-decoration: none;
        }

        h1 {
            position: absolute;
            top: 20%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 15px;
            font-weight: 600;
            animation: glowing 3s infinite;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
        }

        @keyframes glowing {
            0% {
                text-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
            }

            50% {
                text-shadow: 0 0 20px rgba(255, 255, 255, 0.8);
            }

            100% {
                text-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
            }
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <a class="navbar-brand" href="#">BoomBet</a>
        <button type="button" class="btn btn-light"><a href="logout-user.php">Logout</a></button>
    </nav><br>
    <h1>Welcome
        <?php echo $fetch_info['name'] ?>!
    </h1>

    <br><br>
    <div class="container">
        <div class="row text-center">
            <div class="col-12 col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Free Predictions</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Free Predictions</h6>
                        <p class="card-text">Embrace uncertainty, follow your intuition, and let your heart guide you
                            toward your dreams.</p>
                        <a href="free_pre.php" class="btn btn-primary">Free Prediction</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4 ml-0.5">
                <div class="card ">
                    <div class="card-body">
                        <h5 class="card-title">Premium Predictions</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Premium Predictions</h6>
                        <p class="card-text">Invest wisely in accurate forecasts to make informed decisions and secure a
                            brighter future. content.</p>
                        <a href="payment.php" class="btn btn-primary">Premium Prediction</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">User - details</h5>
                        <h6 class="card-subtitle mb-2 text-muted">User - details</h6>
                        <p class="card-text">Essential data for customization, security, and personalized digital
                            experiences.</p>
                        <a href="#" class="btn btn-primary">User - details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Function to hide the <h1> element after 10 seconds
        setTimeout(function () {
            var h1Element = document.querySelector("h1");
            if (h1Element) {
                h1Element.style.display = "none";
            }
        }, 10000);
    </script>
</body>

</html>