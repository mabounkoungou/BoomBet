<!DOCTYPE html>

<head>

    <html lang="en" dir="ltr">

    </html>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="/images1/favicon.ico" type="image/x-icon">
    <script src="script.js" defer></script>

</head>

<body>
    <div class="sidebar_menu">


        <div class="Logo">
            <i class='bx bxl-slack icon'></i>
            <div class="Text_Logo">Boombet</div>
            <i class='bx bx-menu' id="Button"></i>
        </div>


        <ul class="Nav_Item">
            <li>
                <i class='bx bx-search'></i>
                <input type="text" placeholder="Search....">
                <span class="Menu_btn">Search</span>
            </li>

            <li>
                <a href="#">
                    <i class='bx bx-grid-alt'></i>
                    <span class="Item_Name">Admin - Dashboard</span>
                </a>
                <span class="Menu_btn">Admin - Dashboard</span>
            </li>

            <li>
                <a href="manage_user.php">
                    <i class='bx bx-user'></i>
                    <span class="Item_Name">Users</span>
                </a>
                <span class="Menu_btn">Users</span>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class='bx bxs-star-half'></i>
                    <span class="Item_Name">Predictions</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="free_predictions.php">Freemium</a></li>
                    <li><a href="premium_prediction.php">Premium</a></li>
                </ul>
                <span class="Menu_btn">Predictions</span>
            </li>

            <li>
                <a href="#">
                    <i class='bx bx-trip'></i>
                    <span class="Item_Name">Workflows</span>
                </a>
                <span class="Menu_btn">Workflows</span>
            </li>

            <li>
                <a href="#">
                    <i class='bx bx-volume-low'></i>
                    <span class="Item_Name">Updates</span>
                </a>
                <span class="Menu_btn">Updates</span>
            </li>



            <li>
                <a href="#">
                    <i class='bx bx-bell'></i>
                    <span class="Item_Name">Notifications</span>
                </a>
                <span class="Menu_btn">Notifications</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-bell'></i>
                    <span class="Item_Name">Messages</span>
                </a>
                <span class="Menu_btn">Messages</span>
            </li>

            <li class="Details">
                <div class="Child_Details">
                    <img src="back.jpg" alt="">
                    <div class="Name_Roll">
                        <div class="Name">Djali</div>
                        <div class="Roll">Predictor</div>
                    </div>
                </div>
                <i class='bx bxs-info-circle' id="log_out"></i>
            </li>
        </ul>

    </div>

    <section class="Dashboard_Text">
        <div class="Child_Text">Dashboard</div>
    </section>
    <?php include 'add_dash.php'; ?>

</body>

</html>