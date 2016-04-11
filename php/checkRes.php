<?php
echo "<script type='text/javascript' src='../script/reservations.js'></script>";

try {
    //connect to db with pdo
    $pdo = getPDO('flash');

    //get input values
    $id = $_POST['id'];

    //query to run
    $sql = "SELECT `id`, `res_id`, `diners`, `dayof`, `timeof` FROM `reservations` WHERE id = $id";

    //run the query
    $queryResult = $pdo->query($sql);

    //build the table
    $queryData = "    <table id='checkRes'>
                      <th>Reservation ID</th>
                      <th>Reservation Day</th>
                      <th>Reservation Time</th>
                      <th>Diners</th>
                      </table>";

    while ( $row = $queryResult->fetch(PDO::FETCH_ASSOC) ) {
        //add the table values
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
    }
}

?>



    <!DOCTYPE html>
    <html>
    <head lang="en">
        <meta charset="UTF-8">
        <title>Active Reservations</title>
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
        