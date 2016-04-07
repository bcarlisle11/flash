<?php
/**
 * Created by PhpStorm.
 * User: bcarlisle11
 * Date: 4/7/16
 * Time: 2:33 PM
 */

try {
    $pdo = getPDO('flash');

    $id = $_POST['id'];
    $time = $_POST['timeof'];
    $day = $_POST['dayof'];
    $diners = $_POST['diners'];

    $sql2 = "UPDATE `reservations` 
            SET `diners`=[$diners],`dayof`=[$day],`timeof`=[$time] 
            WHERE emp_id=$id";

    $queryResult = $pdo->query($sql2);

    while ( $row = $queryResult->fetch(PDO::FETCH_ASSOC) ) {
        $queryData = "
                <label for 'id'>Employee ID: </label><input type='text' name='id' value={$row['id']} readonly><br><br>
                <label for 'fname'>First Name: </label><input type='text' name='fname' value={$row['fname']} readonly><br><br>
                <label for 'lname'>Last Name: </label><input type='text' name='lname' value={$row['lname']}><br><br>
                <label for 'id'>Reservation Day: </label><input type='text' name='id' value={$row['dayof']} ><br><br>
                <label for 'fname'>Reservation Time: </label><input type='text' name='fname' value={$row['timeof']}><br><br>
                <label for 'lname'>Diners: </label><input type='text' name='lname' value={$row['diners']}><br><br>
                ";
    }
    //return $queryData;
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