<base href="/flash/php/items.php"/> <!-- hax -->
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'pageNav.php';
$item = "";
if (! is_null($_GET)) {
    $item = $_GET['item'];
}
?>

<!DOCTYPE html>

<html>
    <head>

        <meta charset="UTF-8">
        <link rel="stylesheet" href="/flash/css/flash.css">
        <title>Flash Food Court</title>
    </head>
    <body>

        <main>

            <div id="item">

                <?php
                echo $item;
                ?> 

            </div>


        </main>

        <div id="footer">
            Team Flash
        </div>
    </body>
</html>
