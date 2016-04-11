<base href="/flash/php/manageItems.php"/> <!-- hax -->
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'pageNav.php'; // change to manager facing pageNav
$item = "";

$name;
$price;
$cals;
if (isset($_GET['item'])) {
    displayItem();
} elseif (isset($_POST['typeSelect'])) {
//    echo($_POST['typeSelect']);
    displayTable();
} elseif(isset($_POST['name'])){ 
    addItemToDb();
    displayButtons();
}elseif(isset($_POST['addItem'])){
    //echo($_POST['addItem']);
    addItemForm();
} else{
    displayButtons();
}

function addItemToDb(){
    
    try {
        $pdo = getPDO('flash');

        //echo($_FILES['itemPicture']['error']);
        
        $type = $_POST['type'];
        $name = $_POST['name'];
        $cals = $_POST['cals'];
        $price = $_POST['price'];
        $desc = $_POST['desc'];
        $picture = addslashes(file_get_contents($_FILES['itemPicture']['tmp_name']));
        $pictureType = $_FILES['itemPicture']['type'];
        unset($_POST);
    $_POST = array();
        

        $sql = "INSERT INTO `items` (`itemName`, `itemType`, `itemPrice`, `itemCal`, `itemDesc`) VALUES ('$name', '$type', '$price', '$cals', '$desc')";

        $queryResult = $pdo->query($sql);
        
        $sql = "INSERT INTO `itemPicture` (`itemName`, `itemPicture`, `pictureType`) VALUES ('$name', '$picture','$pictureType')";
        
        $queryResult = $pdo->query($sql);

    } catch (PDOException $e) {
        
    }
    
    
    
    
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
                        <td onclick=\"itemSelect(this);\">\${$priceFormatted}</td>
                        <td onclick=\"itemSelect(this);\">{$row['itemCal']}</td>
                      
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
        window.open("manageItems.php/?item=" + td.innerHTML, "_self");
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

function addItemForm(){

echo("<div id=\"form\" class=\"center\">
    
    <h1>Add an item to the database:</h1>
    <form  enctype=\"multipart/form-data\" method=\"post\" action=\"manageItems.php\" id=\"addItemForm\">
        <label for=\"name\">Item name:</label> <input type=\"text\" name=\"name\" size=\"50\" value=\"\" required><br><br>
        <label for=\"cals\">Item calories:</label> <input type=\"number\" name=\"cals\" min=\"0\" step=\"1\" value=\"\" required><br><br>
        <label for=\"price\">Item price:</label> <input type=\"number\" name=\"price\" min=\"0\" step=\".01\" value=\"\" required><br><br>
        <label for=\"desc\">Item Description:</label> <textarea rows=\"4\" cols=\"50\" form=\"addItemForm\" name=\"desc\" size=\"500\" value=\"\" required></textarea><br><br>
        <input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"3000000\" />
        <label for=\"itemPicture\">Item Picture:</label> <input type=\"file\" name=\"itemPicture\" id=\"itemPicture\"><br><br>
        <input type=\"text\" name=\"type\" value=\"{$_POST['addItem']}\" style=\"display:none;\">
        <input type=\"submit\">
    </form>
    
</div>");
    
    
}

function displayButtons() {
    echo("<div id=\"itemSelect\">
                <h1>Select Which items to view:</h1>
                <form action=\"manageItems.php\" method=\"post\">
                    <button type=\"submit\" name=\"typeSelect\" value=\"entree\">View Entrees</button>
                    <button type=\"submit\" name=\"typeSelect\" value=\"special\">View Specials</button>
                    <button type=\"submit\" name=\"typeSelect\" value=\"side\">View Sides</button>
                    <br><br>
                    <button type=\"submit\" name=\"addItem\" value=\"entree\">Add Entree</button>
                    <button type=\"submit\" name=\"addItem\" value=\"special\">Add Special</button>
                    <button type=\"submit\" name=\"addItem\" value=\"side\">Add Side</button>
                </form>
                ");
}

function displayTable() {
    // output item select page
    echo("<div id=\"itemSelect\">

                ");
    displayButtons();
                
              echo("  <div id=\"itemTableDiv\">
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

