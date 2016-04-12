<?php
echo "<script type='text/javascript' src='../script/reservations.js'></script>";
?>



<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Reservations</title>
    <link rel="stylesheet" href="../css/flash.css">
</head>
<body>
<main id="reservation_home">
        <?php
        //check if user is logged in
        session_start();
        if(!isset($_SESSION['user_id']))
        {
            //if no, show login option
            include_once"pageNav.php";
        }else {
            //if yes, show logout option
            include_once "pageNavLoggedIn.php";
        }
        ?>
    <div id="res_section">
    <div id="form" class="center">
        Reservations Home Page
        <br><br>
        <a href ="makeRes.php"><button type="button">Make A Reservation</button></a><br><br>
        <a href="editRes.php"><button type="button">Edit A Reservation</button></a><br><br>
        <a href="cancelRes.php"><button type="button">Cancel A Reservation</button></a><br><br>
        <a href="activeRes.php"><button type="button">Check Active Reservations</button></a><br><br>
    </div>
    </div>
</main>
<div id="footer">
    Team Flash
</div>
</body>
</html>

