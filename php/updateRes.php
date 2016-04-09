<?php
/**
 * Created by PhpStorm.
 * User: bcarlisle11
 * Date: 4/7/16
 * Time: 2:33 PM
 */

try {
    $pdo = getPDO('flash');

    $res_id = $_POST['res_id'];
    $time = $_POST['timeof'];
    $day = $_POST['dayof'];
    $diners = $_POST['diners'];

    $sql = "SELECT `res_id`, `diners`, `dayof`, `timeof` FROM `reservations` WHERE res_id = $res_id";

    $queryResult = $pdo->exec($sql);

    while ($row = $queryResult->fetch(PDO::FETCH_ASSOC) ) {
        $queryData = "
                <label for 'id'>Employee ID: </label><input type='text' name='id' value={$row['id']} readonly><br><br>
                <label for 'res_id>Reservation ID:</label>
                <label for 'id'>Reservation Day: </label><input type='text' name='id' value={$row['dayof']} ><br><br>
                <label for 'fname'>Reservation Time: </label><input type='text' name='fname' value={$row['timeof']}><br><br>
                <label for 'lname'>Diners: </label><input type='text' name='lname' value={$row['diners']}><br><br>
                ";
    }
    
} catch(PDOException $e){

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