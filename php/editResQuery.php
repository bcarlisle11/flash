<?php
echo "<script type='text/javascript' src='../script/reservations.js'></script>";
try {
    //connect to the db with the pdo
    $pdo = getPDO('flash');

    //set id = to the input id
    $id = $_POST['id'];

    //the sql to query
    $sql = "SELECT `id`, `res_id`, `diners`, `dayof`, `timeof` FROM `reservations` WHERE id = $id";

    //run the query
    $queryResult = $pdo->query($sql);

    //begin the drop list
    $queryData = '<select id="editDrop" name="editDrop">';

    //add the values to the drop list while values still exist
    while ( $row = $queryResult->fetch(PDO::FETCH_ASSOC) ) {
        $queryData .= '<option value="' . $row['res_id'] . '">' . $row['res_id'] . '</option>';
    }

    //close drop list
    $queryData .='</select>';

    //get the res_id value out of the drop list
    if($_POST['submit'] && $_POST['submit'] != 0)
    {
        $res_id=$_POST['editDrop'];
    }

} catch (PDOException $e) {
    $queryData = "An error has occurred. Please try again.";
}

function getPDO($dbname)
{
    include('../db/flashDB.php');
    try {
        $pdo = new PDO(DB_CONNECTION_STRING . ";dbname=$dbname", DB_USER, DB_PWD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
    }
}
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
            Active Reservations for employee id: <?php echo $id?><br><br>
            Please choose the reservation id of the reservation you would like to edit:<br><br>
            <form method ='post' action="updateResForm.php">
                Reservation ID:
                <?php echo $queryData?>
                <br><br>
                <input id='edit' name ='edit' type ='submit' value='Edit'>
            </form>
        </div>
    </div>
    <div id='footer'>
        Team Flash
    </div>
</body>
</html>

        