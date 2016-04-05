<?php
include ('inc.reservations.php');
<<<<<<< HEAD
<<<<<<< HEAD
=======
include ('flashDB.php');
>>>>>>> parent of 0c436a8... Replaced individual files with complete directory
=======
include ('flashDB.php');
>>>>>>> parent of 0c436a8... Replaced individual files with complete directory
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
<<<<<<< HEAD
<<<<<<< HEAD
        <?php
        include_once"pageNav.php"
        ?>
    <?php
    include_once "resForm.php"
    ?>
=======
=======
>>>>>>> parent of 0c436a8... Replaced individual files with complete directory
    <header id="header">
        <h1>Flash Food Court</h1>
        <img class ="top-right" src="../flash.jpg" alt="flash" style="...">
    </header>
        <ul>
            <li><a href="../home.html">Menu</a></li>
            <a href="#"></a>
            <li><a href="itemList.html">Items</a></li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropdown_btn" onclick="dropDownList()">Reservations</a>
                <div class="dropdown_class" id="drop_list">
                    <a href="#">Reservations Home</a>
                    <a href="#">Make Reservation</a>
                    <a href="#">Edit Reservation</a>
                    <a href="#">Check Active Reservations</a>
                </div>
            </li>
            <li><a href="login.html">Login</a></li>
            <li><a href="about.html">Hours and Contact Info</a></li>
        </ul>

    <div action="reservations.php" method="post" id="res_section">
    <div id="form" class="center">
        Please fill in all required fields to reserve a table:<br><br>
        <label>First Name: </label><input type="name" name="fname" value=""><br><br>
        <label>Last Name: </label><input type="name" name="lname" value=""><br><br>
        <label>Employee ID: </label><input type="text" name="eid" value=""><br><br>
        <form>
            <label>Reservation Day:</label>
            <?php
            $name = 'dropResDay';
            $myArr = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');
            $chosen = 0;

            echo dropPhp($name, $myArr, $chosen);
            ?>
        </form>
        <form>
        <label>Reservation Time:</label>
            <?php
            $name = 'dropResTime';
            $myArr = array('12:00 P.M.', '12:15 P.M.', '12:30 P.M.', '12:45 P.M.',
                            '1:00 P.M.', '1:30 P.M.', '1:45 P.M.', '2:00 P.M.',
                            '2:15 P.M.', '2:30 P.M.', '2:45 P.M.', '3:00 P.M.',
                            '3:15 P.M.', '3:30 P.M.', '3:45 P.M.', '4:00 P.M.');
            $chosen = 0;

            echo dropPhp($name, $myArr, $chosen);
            ?>
        </form>
        <form>
            <label>Number of Diners:</label>
            <?php
            $name = 'dropDiners';
            $myArr = array('1', '2', '3', '4', '5', '6', '7', '8');
            $chosen = 0;

            echo dropPhp($name, $myArr, $chosen);
            ?>
        </form>
        <button><a href="reservations.php?task=populateReservations">Submit</a></button>
    </div>
    </div>
<<<<<<< HEAD
>>>>>>> parent of 0c436a8... Replaced individual files with complete directory
=======
>>>>>>> parent of 0c436a8... Replaced individual files with complete directory
</main>
<div id="footer">
    Team Flash
</div>
</body>
</html>

