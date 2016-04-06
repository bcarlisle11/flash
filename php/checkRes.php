<?php
include ('inc.reservations.php');
echo "<script type='text/javascript' src='../script/reservations.js'></script>";

try {
    $pdo = getPDO('flash');

    $id = $_POST['id'];

    $sql = "SELECT `id`, `fname`, `lname`, `diners`, `dayof`, `timeof` FROM `reservations` WHERE id = $id";

    $queryResult = $pdo->query($sql);

    while ( $row = $queryResult->fetch(PDO::FETCH_ASSOC) ) {
        $queryData = "
                <tr>
                <label for 'id'>Employee ID: </label><input type='text' name='id' value={$row['id']} readonly><br><br>
                <label for 'fname'>First Name: </label><input type='text' name='fname' value={$row['fname']} readonly><br><br>
                <label for 'lname'>Last Name: </label><input type='text' name='lname' value={$row['lname']} readonly><br><br>
                <label for 'id'>Reservation Day: </label><input type='text' name='id' value={$row['dayof']} readonly><br><br>
                <label for 'fname'>Reservation Time: </label><input type='text' name='fname' value={$row['timeof']} readonly><br><br>
                <label for 'lname'>Diners: </label><input type='text' name='lname' value={$row['diners']} readonly><br><br>
                ";
    }

} catch (PDOException $e) {
    //echo($e->getMessage());
}

function getPDO($dbname)
{
    include('../db/flashDB.php');

    try {
        $pdo = new PDO(DB_CONNECTION_STRING . ";dbname=$dbname", DB_USER, DB_PWD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;

    } catch (PDOException $e) {
        //$GLOBALS['ConfirmationMessage'] = $e->getMessage();
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
        <div method="post" id="res_section">
            <div id="form" class="center">
                Active reservations for employee id <?php echo $id?>:<br><br>
                <form method ="post" action="">
                   <?php echo $queryData?>
                </form>
            </div>
        </div>
        <div id="footer">
            Team Flash
        </div>
    </body>
</html>
        