<?php
/**
 * Created by PhpStorm.
 * User: bcarlisle11
 * Date: 4/9/16
 * Time: 4:39 PM
 */
echo "<script type='text/javascript' src='../script/reservations.js'></script>";
try {
    $pdo = getPDO('flash');

    $res_id = $_POST['res_id'];
    $time = $_POST['time'];
    $day = $_POST['day'];
    $diners = $_POST['diner'];

    $sql = "UPDATE `reservations` 
            SET `diners` = '$diners', `dayof` = '$day', `timeof` = '$time'
            WHERE `res_id` = $res_id";

    $pdo->exec($sql);
    $pdo = null;

    $queryData = "You have successfully reserved a table on $day at $time for $diners diners!
                      The reservation id is $res_id.  Please note this for your records.";


} catch (PDOException $e){
    $queryData = "Edit unsuccessful.  Please try again.";
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
    <title>Reservations</title>
    <link rel="stylesheet" href="../css/flash.css">
</head>
<body>
<main id="reservation_home">
    <?php
    include_once"pageNav.php"
    ?>
    <div id="res_section">
        <div id="form" class="center">
            <?php echo $id?>:<br><br>
            <form method ="post" action="updateRes.php">
                <?php echo $queryData?>
            </form>
        </div>
    </div>
    <div id="footer">
        Team Flash
    </div>
</body>
</html>

