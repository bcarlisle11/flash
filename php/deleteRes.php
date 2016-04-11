<?php
echo "<script type='text/javascript' src='../script/reservations.js'></script>";

try {
    //connect to db with pdo
    $pdo = getPDO('flash');

    //get values
    $res_id = $_POST['editDrop'];
    $time = $_POST['timeof'];
    $day = $_POST['dayof'];
    $diners = $_POST['diners'];

    //sql query to run
    $sql = "DELETE
            FROM `reservations`
            WHERE res_id = $res_id";

    //execute the sql
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
    <title>Cancel Reservation</title>
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
    <div id="res_section">
        <?php

        //test to see if user is logged in as manager
        session_start();

        if(!isset($_SESSION['user_id']))
        {
            echo '<p>You must be logged in to access this page.</p>';
        }
        else
        {
            echo '<div id="form" class="center">
                       <form method ="post" action="updateRes.php">
                           <?php echo $queryData?>
                       </form>
                  </div>';
        }
        ?>

    </div>
    <div id="footer">
        Team Flash
    </div>
</body>
</html>
