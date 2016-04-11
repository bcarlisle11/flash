<?php
/**
 * Created by PhpStorm.
 * User: bcarlisle11
 * Date: 4/7/16
 * Time: 2:33 PM
 */

try {
    //connect to db using pdo
    $pdo = getPDO('flash');

    //get the res_id value
    $res_id = $_POST['editDrop'];

    //query to run
    $sql = "SELECT `id`, `diners`, `dayof`, `timeof` FROM `reservations` WHERE res_id = $res_id";

    //run query
    $queryResult = $pdo->query($sql);

    while ($row = $queryResult->fetch(PDO::FETCH_ASSOC) ) {
        //build the form
        $queryData = "
                <label for='id'>Employee ID: </label><input type='text' name='id' value='{$row['id']}' readonly><br><br>
                <label for='res_id'>Reservation ID:</label><input type='text' name='res_id' value='$res_id' readonly><br><br>
                <label for='dayof'>Reservation Day: </label>
                <select id='day' name='day'>
                    <option value={$row['dayof']}>{$row['dayof']}</option>
                    <option value='Monday'>Monday</option>
                    <option value='Tuesday'>Tuesday</option>
                    <option value='Wednesday'>Wednesday</option>
                    <option value='Thursday'>Thursday</option>
                    <option value='Friday'>Friday</option>
                </select>
                <br><br>
                <label for=\"timeof\">Reservation Time:</label>
                <select id='time' name='time'>
                    <option value={$row['timeof']}>{$row['timeof']}</option>
                    <option value=\"12:00 P.M.\">12:00 P.M.</option>
                    <option value=\"12:15 P.M.\">12:15 P.M.</option>
                    <option value=\"12:30 P.M.\">12:30 P.M.</option>
                    <option value=\"12:45 P.M.\">12:45 P.M.</option>
                    <option value=\"1:00 P.M.\">1:00 P.M.</option>
                    <option value=\"1:15 P.M.\">1:15 P.M.</option>
                    <option value=\"1:30 P.M.\">1:30 P.M.</option>
                    <option value=\"1:45 P.M.\">1:45 P.M.</option>
                    <option value=\"2:00 P.M.\">2:00 P.M.</option>
                    <option value=\"2:15 P.M.\">2:15 P.M.</option>
                    <option value=\"2:30 P.M.\">2:30 P.M.</option>
                    <option value=\"2:45 P.M.\">2:45 P.M.</option>
                    <option value=\"3:00 P.M.\">3:00 P.M.</option>
                    <option value=\"3:15 P.M.\">3:15 P.M.</option>
                    <option value=\"3:30 P.M.\">3:30 P.M.</option>
                    <option value=\"3:45 P.M.\">3:45 P.M.</option>
                    <option value=\"4:00 P.M.\">4:00 P.M.</option>
                    <option value=\"4:15 P.M.\">4:15 P.M.</option>
                    <option value=\"4:30 P.M.\">4:30 P.M.</option>
                </select>
                <br><br>
                <label for='diners'>Diners: </label>
                <select id='diner' name='diner'>
                    <option value='{$row['diners']}'>{$row['diners']}</option>
                    <option value=\"1\">1</option>
                    <option value=\"2\">2</option>
                    <option value=\"3\">3</option>
                    <option value=\"4\">4</option>
                    <option value=\"5\">5</option>
                    <option value=\"6\">6</option>
                    <option value=\"7\">7</option>
                    <option value=\"8\">8</option>
                </select>
                <br><br>";
    }

    
} catch(PDOException $e){
    $queryData = "An error has occured.  Please Try again.";
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
    return $pdo;
}

?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Edit Reservation</title>
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
            Edit reservation for reservation id <?php echo $res_id?>:<br><br>
            <form method ='post' action="updateRes.php">
                <?php echo $queryData?>
                <?php
                    if($_POST['submit'] && $_POST['submit'] !=0){
                        $time = $_POST['time'];
                        $day = $_POST['day'];
                        $diners =$_POST['diner'];
                    } ?>
                <input id='submit' name ='submit' type ='submit'>
            </form>
        </div>
    </div>
    <div id='footer'>
        Team Flash
    </div>
</body>
</html>
