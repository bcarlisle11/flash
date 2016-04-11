<?php
/**
 * Created by PhpStorm.
 * User: Clay
 * Date: 4/10/2016
 * Time: 10:46 PM
 */



?>



<!DOCTYPE html>
<html>

<head>
<meta charset="ISO-8859-1">
<link rel="stylesheet" href="../css/flash.css">
<title>Login</title>
</head>

<body>

<div id="header">
<h1>Flash Food Court</h1>
<img class ="top-right" src="../flash.jpg" alt="flash" style="width:304px;height:228px;">
</div>

<div id="section" align="center">
	<form action="login_submit.php" method="post">
		Employee ID: <input type="text" id="employeeID" name="employeeID" value="" maxlength="20" /><br>
		<input type="text" id="phpro_password" name="phpro_password" value="" maxlength="20" /><br><br>
		<button type="submit">Login</button>
		<button formaction="addManager.php">Add new manager</button>
	</form>
</div>

<div id="footer">
    Team Flash
</div>
</body>
</html>