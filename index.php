<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home-Page</title>
    <link rel="stylesheet" href="css1/style.css">
    <link rel="shortcut icon" href="images1/favicon.ico" type="image/x-icon">
    <script src="js1/script.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        /* Disable horizontal scrolling on mobile */
        body {
            overflow-x: hidden;
        }

        /* Mobile-friendly styles */
        body {
            animation: theme 21s linear infinite;

            &:after,
            &:before {
                content: '';
                display: block;
                position: fixed;
                z-index: -1;
                top: 0;
                width: 100vw; // IE/Edge
                height: 100vh; // fallback
                width: 100vmax;
                height: 100vmax;
                background: rgba(0, 0, 0, 0.05);
                animation: background 90s linear infinite;
            }

            &:after {
                left: 15vw;
            }

            &:before {
                right: 15vw;
                animation-delay: -30s;
                animation-direction: reverse;
            }
        }

        @keyframes theme {
            0% {
                background: #74C390;
            }

            16% {
                background: #5DBDB6;
            }

            33% {
                background: #59D4E1;
            }

            50% {
                background: #51BCE8;
            }

            66% {
                background: #FA5374;
            }

            83% {
                background: #E46653;
            }

            100% {
                background: #74C390;
            }
        }

        @keyframes background {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .navbar {
            background-color: #222222;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .navbar-brand {
            color: #ffffff;
        }

        .navbar-nav {
            margin-top: 10px;
            margin-right: 0;
        }

        .navbar-nav li {
            margin: 5px;
        }

        .container {
            padding: 5px;
        }

        .welcome {
            font-size: 28px;
            font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
        }

        .datetime {
            font-size: 14px;
            padding: 8px;
            color: #ffffff;
            background: #444444;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.25);
            border-radius: 5px;
            border-right: 10px #009578 solid;
            font-weight: 500;
            font-family: "Inter", sans-serif;
            margin-top: 10px;
        }

        .time {
            font-size: 2em;
            color: #00ffcc;
        }

        .date {
            margin-top: 12px;
            font-size: 1.5em;
        }

        p {
            font-size: 20px;
        }

        .join-btn {
            display: block;
            margin: 20px auto;
            text-align: center;
        }

        .join-btn a {
            font-size: 18px;
            text-transform: none;
            padding: 10px 20px;
            background-color: #009578;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease-in-out;
        }

        .join-btn a:hover {
            background-color: #00715c;
        }

        table {
            font-size: 14px;
        }



        /* Responsive styles */
        @media (max-width: 768px) {
            .navbar-nav {
                margin-top: 0;
            }

            .navbar-nav li {
                margin: 0;
            }

            .welcome {
                font-size: 24px;
            }

            .datetime {
                font-size: 12px;
            }

            p {
                font-size: 18px;
            }

            .join-btn a {
                font-size: 16px;
            }

            table {
                font-size: 12px;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" data-toggle="tooltip" title="Elevate Your Game"
                    data-placement="bottom">BoomBet Tips</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php" data-toggle="tooltip" title="Home-Page"
                            data-placement="bottom">Home</a></li>
                    <li><a href="#" data-toggle="tooltip" title="Free odds" data-placement="bottom">Free Daily
                            odds</a></li>
                    <li><a href="#" data-toggle="tooltip" title="Winning is Guaranteed" data-placement="bottom">Premium
                            Odds</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" data-placement="bottom">
                            Rollover
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#" data-toggle="tooltip" title="Daily Predictions">Daily odds</a></li>
                            <li><a href="#" data-toggle="tooltip"
                                    title="Weekly Predictions 7 days without a loss">Weekly
                                    odds</a></li>
                            <li><a href="#" data-toggle="tooltip" title="Yearly Rollover">365 odds</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="signup-user.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="login-user.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="welcome"><span class="boom">Welcome to Boombet</span></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="datetime">
                    <div class="time"></div>
                    <div class="date"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <p>Where Sports Predictions Meet Fortune: Get in the Game</p>
                <div class="join-btn">
                    <a href="signup-user.php" title="Join our website">Join Us</a>
                </div>

            </div>
        </div>
    </div>

    <div class="container my-5">
        <h2 class="h2 text-center">FREE PREDICTIONS</h2>
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
</body>

</html>