<?php
/**
 * Created by PhpStorm.
 * User: Clay
 * Date: 4/10/2016
 * Time: 11:09 PM
 */

/*** begin session ***/
session_start();

/*** first check that both the employeeID, password and form token have been sent ***/
if(!isset( $_POST['employeeID'], $_POST['password'], $_POST['form_token']))
{
    $message = 'Please enter a valid employeeID and password';
}
/*** check the form token is valid ***/
elseif( $_POST['form_token'] != $_SESSION['form_token'])
{
    $message = 'Invalid form submission';
}
/*** check the employeeID is the correct length ***/
elseif (strlen( $_POST['employeeID']) > 20 || strlen($_POST['employeeID']) < 4)
{
    $message = 'Incorrect Length for employeeID';
}
/*** check the password is the correct length ***/
elseif (strlen( $_POST['password']) > 20 || strlen($_POST['password']) < 4)
{
    $message = 'Incorrect Length for Password';
}
else
{
    /*** if we are here the data is valid and we can insert it into database ***/
    $employeeID = filter_var($_POST['employeeID'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);


    /*** connect to database ***/
    /*** mysql hostname ***/
    $mysql_hostname = 'localhost';

    /*** mysql employeeID ***/
    $mysql_employeeID = 'root';

    /*** mysql password ***/
    $mysql_password = 'root';

    /*** database name ***/
    $mysql_dbname = 'flash';

    try
    {
        $dbh = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_dbname", $mysql_employeeID, $mysql_password);
        /*** $message = a message saying we have connected ***/

        /*** set the error mode to excptions ***/
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*** prepare the insert ***/
        $stmt = $dbh->prepare("INSERT INTO manager (id, password ) VALUES (:employeeID, :password )");

        /*** bind the parameters ***/
        $stmt->bindParam(':employeeID', $employeeID, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR, 40);

        /*** execute the prepared statement ***/
        $stmt->execute();

        /*** unset the form token session variable ***/
        unset( $_SESSION['form_token'] );

        /*** if all is done, say thanks ***/
        $message = 'New user added';
    }
    catch(Exception $e)
    {
        /*** check if the employeeID already exists ***/
        if( $e->getCode() == 23000)
        {
            $message = 'employeeID already exists';
        }
        else
        {
            /*** if we are here, something has gone wrong with the database ***/
            $message = 'We are unable to process your request. Please try again later';
        }
    }
}
?>

<html>
<head>
    <meta charset="ISO-8859-1">
    <link rel="stylesheet" href="../css/flash.css">
    <title>Add User</title>
</head>

<body>
<div id="header">
    <h1>Flash Food Court</h1>
    <img class ="top-right" src="../flash.jpg" alt="flash" style="width:304px;height:228px;">
</div>

<div id="section"><?php echo $message; ?>
    <br>
    <a href="login.php"><button type="button">OK</button></a>
</div>

<div id="footer">
    Team Flash
</div>
</body>
</html>