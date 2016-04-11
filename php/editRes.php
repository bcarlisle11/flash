<?php
echo "<script type='text/javascript' src='../script/reservations.js'></script>";
?>



<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Edit Reservation</title>
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
            Please insert the id you would like to edit a reservation for:<br><br>
            <form method ="post" action="editResQuery.php">
                <label for="id">Employee ID: </label><input type="text" name="id" value=""><br><br>
                <input id="submit" name ="submit" type ="submit">
            </form>
        </div>
    </div>
    <div id="footer">
        Team Flash <br>
    </div>
</body>
</html>