<?php
/**
 * Created by PhpStorm.
 * User: Clay
 * Date: 4/11/2016
 * Time: 12:06 AM
 */

//start session
session_start();

// Unset all of the session variables.
session_unset();

// Destroy the session.
session_destroy();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="ISO-8859-1">
    <link rel="stylesheet" href="../css/flash.css">
    <title>Logout</title>
</head>

<body>

<?php include_once"pageNav.php"?>

<div id="section">
    <br>
    You have successfully logged out.
    <br>

    <a href="menu.php"><button type="button">OK</button></a>
</div>

<div id="footer">
    Team Flash
</div>
</body>
</html>
