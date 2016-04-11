<?php
/**
 * Created by PhpStorm.
 * User: bcarlisle11
 * Date: 4/4/16
 * Time: 1:28 PM
 */
echo "<script type='text/javascript' src='../script/reservations.js'></script>";

    try {
        //connect to db using pdo
        $pdo = getPDO('flash');

        //get the input values
        $id = $_POST['id'];
        $time = $_POST['time'];
        $day = $_POST['day'];
        $diners = $_POST['diner'];
        $res_id = rand(1,500);

        //sql to query
        $sql = "SELECT `id` FROM employee WHERE id = $id";

        //run the query
        $queryResult = $pdo->query($sql);

        //if the id exists do this
        if($row = $queryResult->fetch(PDO::FETCH_ASSOC)){

            //sql to execute
            $sql = "INSERT INTO reservations
                    (id,res_id,diners,dayof,timeof)
                    VALUES
                    ('$id','$res_id','$diners','$day','$time')";

            //execute sql
            $pdo->exec($sql);
            $pdo = null;

            $queryResult = "You have successfully reserved a table on $day at $time for $diners diners! 
                            The reservation id is $res_id.  Please note this for your records.";
        } else {
            $queryResult = "Our records indicate that employee id: $id does not exist.  Please try again with a valid employee id or contact support
                            by e-mail at tech-support@flashfoods.com or by phone at (618)-333-4444.";
        }

    } catch (PDOException $e) {
        $queryResult = "An error has occurred.  Please try again.";
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
    <title>Make Reservations</title>
    <link rel="stylesheet" href="../css/flash.css">
</head>
<body>
<main id="reservation_home">
    <?php
    include_once"pageNav.php"
    ?>
    <div method="post" id="res_section">
        <div id="form" class="center">
            <form method ="post" action="">
                <?php echo $queryResult?>
            </form>
        </div>
    </div>
    <div id="footer">
        Team Flash
    </div>
</body>
</html>