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

<div id="header">
    <h1>Flash Food Court</h1>
    <img class="top-right" src="../flash.jpg" alt="flash" style="width:304px;height:228px;">
</div>

<div id="section">
    <br>
    You have successfully logged out.
    <br>

    <button formaction="menu.php">OK</button>
</div>

<div id="footer">
    Team Flash
</div>
</body>
</html>
