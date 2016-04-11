<?php
/**
 * Created by PhpStorm.
 * User: Clay
 * Date: 4/10/2016
 * Time: 11:25 PM
 */

/*** begin our session ***/
session_start();

/*** check if the users is already logged in ***/
if(isset( $_SESSION['user_id'] ))
{
    $message = 'Users is already logged in';
}
/*** check that both the username, password have been submitted ***/
if(!isset($_POST['employeeID'], $_POST['password']))
{
    $message = 'Please enter a valid username and password';
}
/*** check the username is the correct length ***/
elseif (strlen( $_POST['employeeID']) > 20)
{
    $message = 'Incorrect Length for Username';
}
/*** check the password is the correct length ***/
elseif (strlen( $_POST['password']) > 20)
{
    $message = 'Incorrect Length for Password';
}
else
{
    /*** if we are here the data is valid and we can insert it into database ***/
    $employeeID = filter_var($_POST['employeeID
       '], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    /*** connect to database ***/
    /*** mysql hostname ***/
    $mysql_hostname = 'localhost';

    /*** mysql username ***/
    $mysql_username = 'mysql_username';

    /*** mysql password ***/
    $mysql_password = 'mysql_password';

    /*** database name ***/
    $mysql_dbname = 'flash';

    try
    {
        $dbh = new PDO("mysql:host=$mysql_hostname; dbname=$mysql_dbname", $mysql_username, $mysql_password);
        /*** $message = a message saying we have connected ***/

        /*** set the error mode to exceptions ***/
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*** prepare the select statement ***/
        $stmt = $dbh->prepare("SELECT id, password FROM manager 
                    WHERE id
                    = :employeeID
                    AND password = :password");

        /*** bind the parameters ***/
        $stmt->bindParam(':employeeID
       ', $employeeID, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR, 40);

        /*** execute the prepared statement ***/
        $stmt->execute();

        /*** check for a result ***/
        $user_id = $stmt->fetchColumn();

        /*** if we have no result then fail boat ***/
        if($user_id == false)
        {
            $message = 'Login Failed';
        }
        /*** if we do have a result, all is well ***/
        else
        {
            /*** set the session user_id variable ***/
            $_SESSION['user_id'] = $user_id;

            /*** tell the user we are logged in ***/
            $message = 'You are now logged in';
        }


    }
    catch(Exception $e)
    {
        /*** if we are here, something has gone wrong with the database ***/
        $message = 'We are unable to process your request. Please try again later"';
    }
}
?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="ISO-8859-1">
        <link rel="stylesheet" href="../css/flash.css">
        <title>Login</title>
    </head>

    <body>
    <?php include_once"pageNav.php"?>

<!--    <div id="header">
        <h1>Flash Food Court</h1>
        <img class ="top-right" src="../flash.jpg" alt="flash" style="width:304px;height:228px;">
    </div>-->
    <div id="res_section">
        <div id="form" class ="center">
            <form>
                <p><?php echo $message; ?></p>
                <a href="login.php"><button type="button">OK</button></a>
            </form>
    </div>
    </div>

    <div id="footer">
        Team Flash
    </div>
    </body>
    </html>
