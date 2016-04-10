<?php
echo "<script type='text/javascript' src='../script/reservations.js'></script>";

try {
    $pdo = getPDO('flash');

    $id = $_POST['id'];

    $sql = "SELECT `id`, `res_id`, `diners`, `dayof`, `timeof` FROM `reservations` WHERE id = $id";

    $queryResult = $pdo->query($sql);

    $queryData = "    <table id='checkRes'>
                      <th>Reservation ID</th>
                      <th>Reservation Day</th>
                      <th>Reservation Time</th>
                      <th>Diners</th>
                      </table>";

    while ( $row = $queryResult->fetch(PDO::FETCH_ASSOC) ) {
        $queryData .= "
                      <table id='checkRes'>
                      <th>{$row['res_id']}</th>
                      <th>{$row['dayof']}</th>
                      <th>{$row['timeof']}</th>
                      <th>{$row['diners']}</th>
                      </table>";
    }

} catch (PDOException $e) {
    $queryData = "Our records indicate that employee id: $id does not exist.  Please try again.";
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
        