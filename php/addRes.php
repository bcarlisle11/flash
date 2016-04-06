<?php
/**
 * Created by PhpStorm.
 * User: bcarlisle11
 * Date: 4/4/16
 * Time: 1:28 PM
 */
include ('inc.reservations.php');
echo "<script type='text/javascript' src='../script/reservations.js'></script>";

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
        //echo($e->getMessage());
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
   
