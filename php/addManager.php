<?php
/**
 * Created by PhpStorm.
 * User: Clay
 * Date: 4/10/2016
 * Time: 10:51 PM
 */


/*** start session ***/
session_start();

/*** set form token ***/
$form_token = md5( uniqid('auth', true) );

/*** set session form token ***/
$_SESSION['form_token'] = $form_token;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="ISO-8859-1">
    <link rel="stylesheet" href="../css/flash.css">
    <title>Add User</title>
</head>

<body>

<?php include_once"pageNav.php"?>
<!--<div id="header">
    <h1>Flash Food Court</h1>
    <img class ="top-right" src="../flash.jpg" alt="flash" style="width:304px;height:228px;">
</div>-->

<div id="section" align="center">
    <form action="addManager_submit.php" method="post">
        <fieldset>
            <p>
                Employee ID: <input type="text" id="employeeID" name="employeeID" value="" maxlength="20" /><br>
                Password: <input type="text" id="password" name="password" value="" maxlength="20" /><br>
                First Name: <input type="text" id="fname" name="fname" value="" maxLength="20"><br>
                Last Name: <input type="text" id="lname" name="lname" value="" maxLength="20"><br>
            </p>
            <p>
                <input type="hidden" name="form_token" value="<?php echo $form_token; ?>" />
                <input type="submit" value="Add Manager" />
            </p>
        </fieldset>
    </form>
</div>

<div id="footer">
    Team Flash
</div>
</body>
</html>