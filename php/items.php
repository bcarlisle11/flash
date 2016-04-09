<base href="/flash/php/items.php"/> <!-- hax -->
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'pageNav.php';
$item = "";
if (!is_null($_GET)) {
    $item = $_GET['item'];
    $price = "pricevalue";
    $cals  = "calsvalue";
    $description = "describes the item perfectly!";
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


            <div id="itemSelect">

                <button>View Entrees</button>
                <button>View Specials</button>
                <button>View Sides</button>
                
            </div>
            <?php
            if (is_null($item)) {
                // output item select page
                
                
                
            } else {
                // output item description page
//                echo("
//                    <div id=\"item\">
//                        <h1>Item Name</h1>
//                        <p>$$price, Calories: $cals</p>
//                        <p>$description</p>
//                    </div>
//                        ");
            }
            ?>
        </main>

        <div id="footer">
            Team Flash
        </div>
    </body>
</html>
