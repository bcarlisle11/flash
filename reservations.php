<?php
//include ('inc.reservations.php');
echo "<script type='text/javascript' src='../script/reservations.js'></script>";
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Reservations Home</title>
    <link rel="stylesheet" href="../css/flash.css">
</head>
<body>
<main id="reservation_home">
    <header id="header">
        <h1>Flash Food Court</h1>
    </header>
        <ul>
            <li><a href="../home.html">Menu</a></li>
            <li><a href="itemList.html">Items</a></li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropdown_btn" onclick="dropDownList()">Reservations</a>
                <div class="dropdown_class" id="drop_list">
                    <a href="#">Reservations Home</a>
                    <a href="#">Make Reservation</a>
                    <a href="#">Edit Reservation</a>
                </div>
            </li>
            <li><a href="login.html">Login</a></li>
            <li><a href="about.html">Hours and Contact Info</a></li>
        </ul>

    <div id="arcade_task_confirmation">
        <p><?php echo $confirmationMessage; ?></p>
    </div>
</main>
</body>
</html>

