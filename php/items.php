<base href="/flash/php/items.php"/> <!-- hax -->
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//check if user is logged in
session_start();
//if(isset($_SESSION['user_id']))
//{
    //if no, show login option
    include_once"pageNav.php";
//}else {
//    //if yes, show logout option
//    include_once "pageNavLoggedIn.php";
//}
$item = "";

$name;
$price;
$cals;
if (isset($_GET['item'])) {
    displayItem();
} elseif (isset($_POST['typeSelect'])) {
//    echo($_POST['typeSelect']);
    displayTable();
} else {
    displayButtons();
}

function populateTableVars() {
    try {
        $pdo = getPDO('flash');

        $type = $_POST['typeSelect'];

        $sql = "SELECT `itemName`, `itemPrice`, `itemCal` FROM `items` WHERE itemType = '$type'";

        $queryResult = $pdo->query($sql);

        global $name, $price, $cals;



        while ($row = $queryResult->fetch(PDO::FETCH_ASSOC)) {

            $priceFormatted = sprintf('%.2f', $row['itemPrice']);
            echo("
                      <tr>
                        <td class=\"listItem\" onclick=\"itemSelect(this);\">{$row['itemName']}</td>
                        <td >\${$priceFormatted}</td>
                        <td >{$row['itemCal']}</td>
                      
                          </tr>
                      
                          ");
        }
    } catch (PDOException $e) {
        
    }
}

function outputRows() {

    populateTableVars();
//    
//    for($i = 0; $i <= count($name); $i++){
//        echo("
//            <tr>
//        <td>$name[i]</td>
//        <td>$$price[i]</td>
//        <td>$cals[i]</td>
//            </tr>
//                ");
//    }
}

function outputItem() {
    try {
        $pdo = getPDO('flash');

        $name = $_GET['item'];

        $sql = "SELECT `itemName`, `itemPrice`, `itemCal`, `itemDesc` FROM `items` WHERE itemName = '$name'";

        $queryResult = $pdo->query($sql);


        while ($row = $queryResult->fetch(PDO::FETCH_ASSOC)) {

            $priceFormatted = sprintf('%.2f', $row['itemPrice']);
            echo("
                    <div id=\"item\">
                        <h1>{$row['itemName']}</h1>
                        <p>\${$priceFormatted}, Calories: {$row['itemCal']}</p>
                        <p>{$row['itemDesc']}</p>
                    
                        ");
        }
        $sql = "SELECT `itemPicture`,`pictureType` FROM `itempicture` WHERE itemName = '$name'";

        $queryResult = $pdo->query($sql);
        
        $row = $queryResult->fetch(PDO::FETCH_ASSOC);
        
        echo("<img id=\"itemImage\" src=\"data:{$row['pictureType']};base64," . base64_encode($row['itemPicture']) . "\">");
        
    } catch (PDOException $e) {
        
    }
}

function getPDO($dbname) {
    include('../db/flashDB.php');

    try {
        $pdo = new PDO(DB_CONNECTION_STRING . ";dbname=$dbname", DB_USER, DB_PWD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    } catch (PDOException $e) {
        //$GLOBALS['ConfirmationMessage'] = $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<script>
    function itemSelect(td) {
        window.open("items.php/?item=" + td.innerHTML, "_self");
    }
</script>
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
                    <button type=\"submit\" name=\"typeSelect\" value=\"entree\">View Entrees</button>
                    <button type=\"submit\" name=\"typeSelect\" value=\"special\">View Specials</button>
                    <button type=\"submit\" name=\"typeSelect\" value=\"side\">View Sides</button>
                </form>
                ");
}

function displayTable() {
    // output item select page
    echo("<div id=\"itemSelect\">

                <h1>Select Which items to view:</h1>
                <form action=\"items.php\" method=\"post\">
                    <button type=\"submit\" name=\"typeSelect\" value=\"entree\">View Entrees</button>
                    <button type=\"submit\" name=\"typeSelect\" value=\"special\">View Specials</button>
                    <button type=\"submit\" name=\"typeSelect\" value=\"side\">View Sides</button>
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
    outputItem();
}
?>
        </main>

        <div id="footer">
            Team Flash
        </div>
    </body>
</html>
