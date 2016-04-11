<?php
echo "<script type='text/javascript' src='../script/reservations.js'></script>";
try {
    $pdo = getPDO('flash');

    $res_id = $_POST['editDrop'];
    $time = $_POST['timeof'];
    $day = $_POST['dayof'];
    $diners = $_POST['diners'];

    echo $res_id;

    $sql = "DELETE
            FROM `reservations`
            WHERE res_id = $res_id";

    $pdo->exec($sql);
    $pdo = null;

    $queryData = "You have successfully canceled your reservation with reservation id: $res_id.";

} catch (PDOException $e){
    $queryData = "Cancel unsuccessful.  Please try again.";
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
