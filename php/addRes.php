<?php
/**
 * Created by PhpStorm.
 * User: bcarlisle11
 * Date: 4/4/16
 * Time: 1:28 PM
 */

    try {
        $pdo = getPDO('flash');

        $id = $_POST['id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $time = $_POST['time'];
        $day = $_POST['day'];
        $diners = $_POST['diners'];

        $sql = "INSERT INTO reservations
              (id,fname,lname,diners,dayof,timeof)
            VALUES
              ('$id','$fname','$lname','$diners','$day','$time')";

        $pdo->exec($sql);
        $pdo = null;

    } catch (PDOException $e) {
        echo($e->getMessage());
    }
//}

    function getPDO($dbname)
    {
        include('../db/flashDB.php');

        try {
            $pdo = new PDO(DB_CONNECTION_STRING . ";dbname=$dbname", DB_USER, DB_PWD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;

        } catch (PDOException $e) {
            $GLOBALS['ConfirmationMessage'] = $e->getMessage();
        }
    }



//function validateForm($input) {
    //$input = trim($input);
    //$input = stripslashes($input);
    //$input = htmlspecialchars($input);
  //  return $input;
//}

?>