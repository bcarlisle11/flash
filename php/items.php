<base href="/flash/php/items.php"/> <!-- hax -->
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'pageNav.php';
$item = "";
if (isset($_GET['name'])) {
    displayItem();
} elseif ($_POST) {
    displayTable();
//    if (isset($_POST['entreeSelect'])) {
//        echo "you selected entreebutton";
//    } elseif (isset($_POST['specialSelect'])) {
//        echo "you selected specialbutton";
//    } elseif (isset($_POST['sideSelect'])) {
//        echo "you selected sidebutton";
//    }
} else {
    displayButtons();
}

function populateTableVars($name, $price, $cals) {
    
    
    
}

function outputRows() {
    
    populateTableVars($name, $price, $cals);
    
    for($i = 0; $i <= count($name); $i++){
        echo("
        <td>$name[i]</td>
        <td>$$price[i]</td>
        <td>$cals[i]</td>
                ");
    }
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





            <?php

            function displayButtons() {
                echo("<div id=\"itemSelect\">
                <h1>Select Which items to view:</h1>
                <form action=\"items.php\" method=\"post\">
                    <button type=\"submit\" name=\"entreeSelect\" value=\"selected\">View Entrees</button>
                    <button type=\"submit\" name=\"specialSelect\" value=\"selected\">View Specials</button>
                    <button type=\"submit\" name=\"sideSelect\" value=\"selected\">View Sides</button>
                </form>
                ");
            }

            function displayTable() {
                // output item select page
                echo("<div id=\"itemSelect\">

                <h1>Select Which items to view:</h1>
                <form action=\"items.php\" method=\"post\">
                    <button type=\"submit\" name=\"entreeSelect\" value=\"selected\">View Entrees</button>
                    <button type=\"submit\" name=\"specialSelect\" value=\"selected\">View Specials</button>
                    <button type=\"submit\" name=\"sideSelect\" value=\"selected\">View Sides</button>
                </form>
                
                <div id=\"itemTableDiv\">
                    <table id=\"itemTable\">
                        <colgroup>
                            <col id=\"nameColumn\">
                            <col id =\"priceColumn\">
                            <col id =\"calColumn\">
                        </colgroup>
                        <tr>
                            <th>Item Name</th>
                            <th>Price</th>
                            <th>Calories</th>
                        </tr>
                        <tr>");

                outputRows();

                echo("</tr>
                    </table>

                </div>
                </div>
            ");
            }

            function displayItem() {
                // output item description page
                $item = $_GET['item'];
                $price = "pricevalue";
                $cals = "calsvalue";
                $description = "describes the item perfectly!";
                echo("
                    <div id=\"item\">
                        <h1>Item Name</h1>
                        <p>$$price, Calories: $cals</p>
                        <p>$description</p>
                    </div>
                        ");
            }
            ?>
        </main>

        <div id="footer">
            Team Flash
        </div>
    </body>
</html>
