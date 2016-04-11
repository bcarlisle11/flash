<?php
/**
 * Created by PhpStorm.
 * User: bcarlisle11
 * Date: 4/10/16
 * Time: 7:28 PM
 */
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
    include_once"pageNav.php"
    ?>
    <div id="res_section">
        <div id="form" class="center">
            Please insert the id you would like to cancel a reservation for:<br><br>
            <form method ="post" action="cancelResQuery.php">
                <label for=id">Employee ID: </label><input type="text" name="id" value=""><br><br>
                <input id="submit" name ="cancel" type ="submit" value="Submit">
            </form>
        </div>
    </div>
    <div id="footer">
        Team Flash
    </div>
</body>
</html>
