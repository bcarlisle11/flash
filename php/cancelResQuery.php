<?php
/**
 * Created by PhpStorm.
 * User: bcarlisle11
 * Date: 4/10/16
 * Time: 7:30 PM
 */

try {
    //connect to db with pdo
    $pdo = getPDO('flash');

    //get the input values
    $id = $_POST['id'];

    //query to run
    $sql = "SELECT `id`, `res_id`, `diners`, `dayof`, `timeof` FROM `reservations` WHERE id = $id";

    //run the query
    $queryResult = $pdo->query($sql);

    //begin drop list
    $queryData = '<select id="editDrop" name="editDrop">';

    while ( $row = $queryResult->fetch(PDO::FETCH_ASSOC) ) {
        //add the drop list values
        $queryData .= '<option value="' . $row['res_id'] . '">' . $row['res_id'] . '</option>';
    }

    //close the drop list
    $queryData .='</select>';

    //get the res_id chosen value out of drop list
    if($_POST['submit'] && $_POST['submit'] != 0)
    {
        $res_id=$_POST['editDrop'];
    }

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
        <div id="form" class="center">
            Active Reservations for employee id: <?php echo $id?><br><br>
            Please choose the reservation id of the reservation you would like to cancel:<br><br>
            <form method ='post' action="deleteRes.php">
                Reservation ID:
                <?php echo $queryData?>
                <br><br>
                <input id='submit' name ='submit' type ='submit'>
            </form>
        </div>
    </div>
    <div id='footer'>
        Team Flash
    </div>
</body>
</html>
