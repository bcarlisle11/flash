<?php
include ('inc.reservations.php');
echo "<script type='text/javascript' src='../script/reservations.js'></script>";

try {
    $pdo = getPDO('flash');

    $id = $_POST['emp_id'];

    echo $id;

    $sql ="SELECT `id` FROM employee WHERE id = $id";

    $queryResult = $pdo->query($sql);

    if($row = $queryResult->fetch(PDO::FETCH_ASSOC)) {

        $sql="SELECT `emp_id`, `dayof`, `timeof`, `diners` FROM reservations WHERE emp_id = $id";

        $queryResult = $pdo->query($sql);

        while ($row = $queryResult->fetch(PDO::FETCH_ASSOC)) {
            $queryData = "
                <label for 'emp_id'>Employee ID: </label><input type='text' name='id' value={$row['id']} readonly><br><br>
                <label for 'dayof'>Reservation Day: </label><input type='text' name='id' value={$row['dayof']} ><br><br>
                <label for 'timeof'>Reservation Time: </label><input type='text' name='fname' value={$row['timeof']}><br><br>
                <label for 'diners'>Diners: </label><input type='text' name='lname' value={$row['diners']}><br><br>
                ";
        }
    }

    $pdo = null;

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
                <form method ='post' action="">
                    <?php $queryData?>
                    <input id='submit' name ='submit' type ='submit'>
                </form>
            </div>
        </div>
        <div id='footer'>
            Team Flash
        </div>
    </body>
</html>

        