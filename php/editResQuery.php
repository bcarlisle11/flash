<?php
echo "<script type='text/javascript' src='../script/reservations.js'></script>";
try {
    $pdo = getPDO('flash');
    $id = $_POST['id'];
    $sql = "SELECT `id`, `res_id`, `diners`, `dayof`, `timeof` FROM `reservations` WHERE id = $id";
    $queryResult = $pdo->query($sql);
    $queryData = '<select id="editDrop" name="editDrop">';
    while ( $row = $queryResult->fetch(PDO::FETCH_ASSOC) ) {
        $queryData .= '<option value="' . $row['res_id'] . '">' . $row['res_id'] . '</option>';
    }
    $queryData .='</select>';
    if($_POST['submit'] && $_POST['submit'] != 0)
    {
        $res_id=$_POST['editDrop'];
    }
    /*    $queryData = "
                          <table>
                          <th>Reservation ID</th>
                          <th>Reservation Day</th>
                          <th>Reservation Time</th>
                          <th>Diners</th>
                          </table>";
        while ( $row = $queryResult->fetch(PDO::FETCH_ASSOC) ) {
            $queryData .= "
                          <table>
                          <th>{$row['res_id']}</th>
                          <th>{$row['dayof']}</th>
                          <th>{$row['timeof']}</th>
                          <th>{$row['diners']}</th>
                          </table>
                          <input id='editRes' type='submit' value='Edit' align='center'>";
        }*/
    /*    $pdo = getPDO('flash');
        $id = $_POST['id'];
        $sql="SELECT `id` FROM employee WHERE id = $id";
        $queryResult = $pdo->query($sql);

        if($row = $queryResult->fetch(PDO::FETCH_ASSOC)) {
            $sql = "SELECT `id`, `diners`, `dayof`, `timeof` FROM `reservations` WHERE id = $id";
            $queryResult = $pdo->query($sql);
            while ($row = $queryResult->fetch(PDO::FETCH_ASSOC)) {
                $queryData = "
                    <label for 'id'>Employee ID: </label><input type='text' name='id' value={$row['id']} readonly><br><br>
                    <label for 'dayof'>Reservation Day: </label><input type='text' name='id' value={$row['dayof']} ><br><br>
                    <label for 'timeof'>Reservation Time: </label><input type='text' name='fname' value={$row['timeof']}><br><br>
                    <label for 'diners'>Diners: </label><input type='text' name='lname' value={$row['diners']}><br><br>
                    ";
            }
            $pdo = null;
        } else {
            $queryData = "Our records indicate that employee id: $id does not exist.  Please try again with a valid employee id or contact support
                                by e-mail at tech-support@flashfoods.com or by phone at (618)-333-4444.";
        }*/
} catch (PDOException $e) {

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
            Active Reservations for employee id: <?php echo $id?><br><br>
            Please choose the reservation id of the reservation you would like to edit:<br><br>
            <form method ='post' action="updateResForm.php">
                Reservation Id:
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

        