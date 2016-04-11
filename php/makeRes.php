<?php
echo "<script type='text/javascript' src='../script/reservations.js'></script>";

?>



<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Make Reservations</title>
    <link rel="stylesheet" href="../css/flash.css">
</head>
<body>
<main id="reservation_home">
    <?php
    include_once"pageNav.php"
    ?>
    <?php
    include_once "resForm.php"
    ?>
</main>
<div id="footer">
    Team Flash <br>
    Our cafeteria is open from 7:00 AM to 5:00 PM when our offices close.<br>
    Reservations for certain seating arrangements can be made by either using
    the "Reservations" tab on this site, or by calling the kitchen at (217)-555-1940.<br>
    Please make reservations at least 24 hours in advance.
</div>
</body>
</html>
