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
    include_once"pageNav.php"
    ?>
    <div method="post" id="res_section">
        <div id="form" class="center">
            Please insert the id you would like to edit a reservation for:<br><br>
            <form method ="post" action="editResQuery.php">
                <label for "id">Employee ID: </label><input type="text" name="id" value=""><br><br>
                <input id="submit" name ="submit" type ="submit">
            </form>
        </div>
    </div>
    <div id="footer">
        Team Flash
    </div>
</body>
</html>