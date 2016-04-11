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
    //check if user is logged in
    session_start();
    if(isset($_SESSION['user_id']))
    {
        //if no, show login option
        include_once"pageNav.php";
    }else {
        //if yes, show logout option
        include_once "pageNavLoggedIn.php";
    }
    ?>
    <?php
    include_once "resForm.php"
    ?>
</main>
<div id="footer">
    Team Flash
</div>
</body>
</html>
