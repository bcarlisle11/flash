<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'pageNav.php';

//echo(getDateOfDay('Monday', true));

function getDateOfDay($day, $full) {


    // I feel like there's probably a better way to do this... :/
    if (date("l") == "Saturday") { // if today is saturday
        if ($day == "Monday") { // and the day you're looking for is monday
            $modifier = 2; // add two days to the date
        } elseif ($day == "Tuesday") {
            $modifier = 3;
        } elseif ($day == "Wednesday") {
            $modifier = 4;
        } elseif ($day == "Thursday") {
            $modifier = 5;
        } else {
            $modifier = 6;
        }
    } elseif (date("l") == "Sunday") {
        if ($day == "Monday") {
            $modifier = 1;
        } elseif ($day == "Tuesday") {
            $modifier = 2;
        } elseif ($day == "Wednesday") {
            $modifier = 3;
        } elseif ($day == "Thursday") {
            $modifier = 4;
        } else {
            $modifier = 5;
        }
    } elseif (date("l") == "Monday") {
        if ($day == "Monday") {
            $modifier = 0;
        } elseif ($day == "Tuesday") {
            $modifier = 1;
        } elseif ($day == "Wednesday") {
            $modifier = 2;
        } elseif ($day == "Thursday") {
            $modifier = 3;
        } else {
            $modifier = 4;
        }
    } elseif (date("l") == "Tuesday") {
        if ($day == "Monday") {
            $modifier = -1;
        } elseif ($day == "Tuesday") {
            $modifier = 0;
        } elseif ($day == "Wednesday") {
            $modifier = 1;
        } elseif ($day == "Thursday") {
            $modifier = 2;
        } else {
            $modifier = 3;
        }
    } elseif (date("l") == "Wednesday") {
        if ($day == "Monday") {
            $modifier = -2;
        } elseif ($day == "Tuesday") {
            $modifier = -1;
        } elseif ($day == "Wednesday") {
            $modifier = 0;
        } elseif ($day == "Thursday") {
            $modifier = 1;
        } else {
            $modifier = 2;
        }
    } elseif (date("l") == "Thursday") {
        if ($day == "Monday") {
            $modifier = -3;
        } elseif ($day == "Tuesday") {
            $modifier = -2;
        } elseif ($day == "Wednesday") {
            $modifier = -1;
        } elseif ($day == "Thursday") {
            $modifier = 0;
        } else {
            $modifier = 1;
        }
    } else { // friday
        if ($day == "Monday") {
            $modifier = -4;
        } elseif ($day == "Tuesday") {
            $modifier = -3;
        } elseif ($day == "Wednesday") {
            $modifier = -2;
        } elseif ($day == "Thursday") {
            $modifier = -1;
        } else {
            $modifier = 0;
        }
    }

if(isset($_POST['week'])){
        $next = $_POST['week'];
        //echo($_POST['week'] + "<br>");
    } else {
        $next = 0;
    }
    
    $modifier += $next * 7;


    if($full){
        $date = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") + $modifier, date("Y")));
    }else{
        $date = date("m/d", mktime(0, 0, 0, date("m"), date("d") + $modifier, date("Y")));
    }

    
//
//    if (date("l") == "Saturday") {
//        $monday = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") + $modifier, date("Y"))); // day after tomorrow
//    } elseif (date("l") == "Sunday") {
//        $monday = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") + $modifier, date("Y"))); // tomorrow
//    } elseif (date("l") == "Tuesday") {
//        $monday = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") + $modifier, date("Y"))); // yesterday
//    } elseif (date("l") == "Wednesday") {
//        $monday = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") + $modifier, date("Y"))); // ..
//    } elseif (date("l") == "Thursday") {
//        $monday = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") + $modifier, date("Y"))); // ...
//    } elseif (date("l") == "Friday") {
//        $monday = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") + $modifier, date("Y"))); // ....
//    } else {
//        $monday = date("Y-m-d"); //today
//    }

    return $date;
}

function outputTableHeader() {

    $mon = getDateOfDay("Monday", false);
    $tues = getDateOfDay("Tuesday", false);
    $wed = getDateOfDay("Wednesday", false);
    $thurs = getDateOfDay("Thursday", false);
    $fri = getDateOfDay("Friday", false);


    
    
    
    echo("<tr>
<th colspan = \"2\">Monday <br>{$mon}</th>
<th colspan = \"2\">Tuesday <br>{$tues}</th>
<th colspan = \"2\">Wednesday <br>{$wed}</th>
<th colspan = \"2\">Thursday <br>{$thurs}</th>
<th colspan = \"2\">Friday <br>{$fri}</th>
</tr>");
}

function outputTableRows() {

    try {
        $date = getDateOfDay("Monday", true);
        $pdo = getPDO('flash');
        $sql = "SELECT `menuEntree`, `menuSide1`, `menuSide2`, `menuSpecial` FROM `menu` WHERE menuDate = '$date'";
        $queryResult = $pdo->query($sql);
        $mon = $queryResult->fetch(PDO::FETCH_ASSOC);

        $sql = "SELECT `itemName`, `itemCal`, `itemPrice`, `itemDesc` FROM `items` WHERE itemName = '{$mon['menuEntree']}'";
        $queryResult = $pdo->query($sql);
        $monEntree = $queryResult->fetch(PDO::FETCH_ASSOC);
        
        $sql = "SELECT `itemName`, `itemCal`, `itemPrice`, `itemDesc` FROM `items` WHERE itemName = '{$mon['menuSide1']}'";
        $queryResult = $pdo->query($sql);
        $monSide1 = $queryResult->fetch(PDO::FETCH_ASSOC);
        
        $sql = "SELECT `itemName`, `itemCal`, `itemPrice`, `itemDesc` FROM `items` WHERE itemName = '{$mon['menuSide2']}'";
        $queryResult = $pdo->query($sql);
        $monSide2 = $queryResult->fetch(PDO::FETCH_ASSOC);
        
        $sql = "SELECT `itemName`, `itemCal`, `itemPrice`, `itemDesc` FROM `items` WHERE itemName = '{$mon['menuSpecial']}'";
        $queryResult = $pdo->query($sql);
        $monSpecial = $queryResult->fetch(PDO::FETCH_ASSOC);
        
        
        $date = getDateOfDay("Tuesday", true);
        $sql = "SELECT `menuEntree`, `menuSide1`, `menuSide2`, `menuSpecial` FROM `menu` WHERE menuDate = '$date'";
        $queryResult = $pdo->query($sql);
        $tue = $queryResult->fetch(PDO::FETCH_ASSOC);
        
        $sql = "SELECT `itemName`, `itemCal`, `itemPrice`, `itemDesc` FROM `items` WHERE itemName = '{$tue['menuEntree']}'";
        $queryResult = $pdo->query($sql);
        $tueEntree = $queryResult->fetch(PDO::FETCH_ASSOC);
        
        $sql = "SELECT `itemName`, `itemCal`, `itemPrice`, `itemDesc` FROM `items` WHERE itemName = '{$tue['menuSide1']}'";
        $queryResult = $pdo->query($sql);
        $tueSide1 = $queryResult->fetch(PDO::FETCH_ASSOC);
        
        $sql = "SELECT `itemName`, `itemCal`, `itemPrice`, `itemDesc` FROM `items` WHERE itemName = '{$tue['menuSide2']}'";
        $queryResult = $pdo->query($sql);
        $tueSide2 = $queryResult->fetch(PDO::FETCH_ASSOC);
        
        $sql = "SELECT `itemName`, `itemCal`, `itemPrice`, `itemDesc` FROM `items` WHERE itemName = '{$tue['menuSpecial']}'";
        $queryResult = $pdo->query($sql);
        $tueSpecial = $queryResult->fetch(PDO::FETCH_ASSOC);

        $date = getDateOfDay("Wednesday", true);
        $sql = "SELECT `menuEntree`, `menuSide1`, `menuSide2`, `menuSpecial` FROM `menu` WHERE menuDate = '$date'";
        $queryResult = $pdo->query($sql);
        $wed = $queryResult->fetch(PDO::FETCH_ASSOC);
        
        $sql = "SELECT `itemName`, `itemCal`, `itemPrice`, `itemDesc` FROM `items` WHERE itemName = '{$wed['menuEntree']}'";
        $queryResult = $pdo->query($sql);
        $wedEntree = $queryResult->fetch(PDO::FETCH_ASSOC);
        
        $sql = "SELECT `itemName`, `itemCal`, `itemPrice`, `itemDesc` FROM `items` WHERE itemName = '{$wed['menuSide1']}'";
        $queryResult = $pdo->query($sql);
        $wedSide1 = $queryResult->fetch(PDO::FETCH_ASSOC);
        
        $sql = "SELECT `itemName`, `itemCal`, `itemPrice`, `itemDesc` FROM `items` WHERE itemName = '{$wed['menuSide2']}'";
        $queryResult = $pdo->query($sql);
        $wedSide2 = $queryResult->fetch(PDO::FETCH_ASSOC);
        
        $sql = "SELECT `itemName`, `itemCal`, `itemPrice`, `itemDesc` FROM `items` WHERE itemName = '{$wed['menuSpecial']}'";
        $queryResult = $pdo->query($sql);
        $wedSpecial = $queryResult->fetch(PDO::FETCH_ASSOC);

        $date = getDateOfDay("Thursday", true);
        $sql = "SELECT `menuEntree`, `menuSide1`, `menuSide2`, `menuSpecial` FROM `menu` WHERE menuDate = '$date'";
        $queryResult = $pdo->query($sql);
        $thu = $queryResult->fetch(PDO::FETCH_ASSOC);
        
        $sql = "SELECT `itemName`, `itemCal`, `itemPrice`, `itemDesc` FROM `items` WHERE itemName = '{$thu['menuEntree']}'";
        $queryResult = $pdo->query($sql);
        $thuEntree = $queryResult->fetch(PDO::FETCH_ASSOC);
        
        $sql = "SELECT `itemName`, `itemCal`, `itemPrice`, `itemDesc` FROM `items` WHERE itemName = '{$thu['menuSide1']}'";
        $queryResult = $pdo->query($sql);
        $thuSide1 = $queryResult->fetch(PDO::FETCH_ASSOC);
        
        $sql = "SELECT `itemName`, `itemCal`, `itemPrice`, `itemDesc` FROM `items` WHERE itemName = '{$thu['menuSide2']}'";
        $queryResult = $pdo->query($sql);
        $thuSide2 = $queryResult->fetch(PDO::FETCH_ASSOC);
        
        $sql = "SELECT `itemName`, `itemCal`, `itemPrice`, `itemDesc` FROM `items` WHERE itemName = '{$thu['menuSpecial']}'";
        $queryResult = $pdo->query($sql);
        $thuSpecial = $queryResult->fetch(PDO::FETCH_ASSOC);

        $date = getDateOfDay("Friday", true);
        $sql = "SELECT `menuEntree`, `menuSide1`, `menuSide2`, `menuSpecial` FROM `menu` WHERE menuDate = '$date'";
        $queryResult = $pdo->query($sql);
        $fri = $queryResult->fetch(PDO::FETCH_ASSOC);
        
        $sql = "SELECT `itemName`, `itemCal`, `itemPrice`, `itemDesc` FROM `items` WHERE itemName = '{$fri['menuEntree']}'";
        $queryResult = $pdo->query($sql);
        $friEntree = $queryResult->fetch(PDO::FETCH_ASSOC);
        
        $sql = "SELECT `itemName`, `itemCal`, `itemPrice`, `itemDesc` FROM `items` WHERE itemName = '{$fri['menuSide1']}'";
        $queryResult = $pdo->query($sql);
        $friSide1 = $queryResult->fetch(PDO::FETCH_ASSOC);
        
        $sql = "SELECT `itemName`, `itemCal`, `itemPrice`, `itemDesc` FROM `items` WHERE itemName = '{$fri['menuSide2']}'";
        $queryResult = $pdo->query($sql);
        $friSide2 = $queryResult->fetch(PDO::FETCH_ASSOC);
        
        $sql = "SELECT `itemName`, `itemCal`, `itemPrice`, `itemDesc` FROM `items` WHERE itemName = '{$fri['menuSpecial']}'";
        $queryResult = $pdo->query($sql);
        $friSpecial = $queryResult->fetch(PDO::FETCH_ASSOC);
        
    } catch (PDOException $e) {
        
    }





    echo("<tr>
    <td id = \"entreeRow\" colspan = \"2\">Entree</td>
    <td id = \"entreeRow\" colspan = \"2\">Entree</td>
    <td id = \"entreeRow\" colspan = \"2\">Entree</td>
    <td id = \"entreeRow\" colspan = \"2\">Entree</td>
    <td id = \"entreeRow\" colspan = \"2\">Entree</td>

    </tr>
    <tr>
    <td class = \"menuItem\" onclick = \"itemSelect(this);\">{$monEntree['itemName']}</td>
    <td>Cal: {$monEntree['itemCal']}<br>\$" . sprintf('%.02f', $monEntree['itemPrice']) . "</td>
    <td class = \"menuItem\" onclick = \"itemSelect(this);\">{$tueEntree['itemName']}</td>
    <td>Cal: {$tueEntree['itemCal']}<br> $" . sprintf('%.02f', $tueEntree['itemPrice']) . "</td>
    <td class = \"menuItem\" onclick = \"itemSelect(this);\">{$wedEntree['itemName']}</td>
    <td>Cal: {$wedEntree['itemCal']}<br> $" . sprintf('%.02f', $wedEntree['itemPrice']) . "</td>
    <td class = \"menuItem\" onclick = \"itemSelect(this);\">{$thuEntree['itemName']}</td>
    <td>Cal: {$thuEntree['itemCal']}<br> $" . sprintf('%.02f', $thuEntree['itemPrice']) . "</td>
    <td class = \"menuItem\" onclick = \"itemSelect(this);\">{$friEntree['itemName']}</td>
    <td>Cal: {$friEntree['itemCal']}<br> $" . sprintf('%.02f', $friEntree['itemPrice']) . "</td>
    </tr>
    <tr>
    <td id = \"sideRow\" colspan = \"2\">Sides</td>
    <td id = \"sideRow\" colspan = \"2\">Sides</td>
    <td id = \"sideRow\" colspan = \"2\">Sides</td>
    <td id = \"sideRow\" colspan = \"2\">Sides</td>
    <td id = \"sideRow\" colspan = \"2\">Sides</td>

    </tr>
    <tr>
    <td class = \"menuItem\" onclick = \"itemSelect(this);\">{$monSide1['itemName']}</td>
    <td>Cal: {$monSide1['itemCal']}<br> $" . sprintf('%.02f', $monSide1['itemPrice']) . "</td>
    <td class = \"menuItem\" onclick = \"itemSelect(this);\">{$tueSide1['itemName']}</td>
    <td>Cal: {$tueSide1['itemCal']}<br> $" . sprintf('%.02f', $tueSide1['itemPrice']) . "</td>
    <td class = \"menuItem\" onclick = \"itemSelect(this);\">{$wedSide1['itemName']}</td>
    <td>Cal: {$wedSide1['itemCal']}<br> $" . sprintf('%.02f', $wedSide1['itemPrice']) . "</td>
    <td class = \"menuItem\" onclick = \"itemSelect(this);\">{$thuSide1['itemName']}</td>
    <td>Cal: {$thuSide1['itemCal']}<br> $" . sprintf('%.02f', $thuSide1['itemPrice']) . "</td>
    <td class = \"menuItem\" onclick = \"itemSelect(this);\">{$friSide1['itemName']}</td>
    <td>Cal: {$friSide1['itemCal']}<br> $" . sprintf('%.02f', $friSide1['itemPrice']) . "</td>
    </tr>
    <tr>
    <td class = \"menuItem\" onclick = \"itemSelect(this);\">{$monSide2['itemName']}</td>
    <td>Cal: {$monSide2['itemCal']}<br> $" . sprintf('%.02f', $monSide2['itemPrice']) . "</td>
    <td class = \"menuItem\" onclick = \"itemSelect(this);\">{$tueSide2['itemName']}</td>
    <td>Cal: {$tueSide2['itemCal']}<br> $" . sprintf('%.02f', $tueSide2['itemPrice']) . "</td>
    <td class = \"menuItem\" onclick = \"itemSelect(this);\">{$wedSide2['itemName']}</td>
    <td>Cal: {$wedSide2['itemCal']}<br> $" . sprintf('%.02f', $wedSide2['itemPrice']) . "</td>
    <td class = \"menuItem\" onclick = \"itemSelect(this);\">{$thuSide2['itemName']}</td>
    <td>Cal: {$thuSide2['itemCal']}<br> $" . sprintf('%.02f', $thuSide2['itemPrice']) . "</td>
    <td class = \"menuItem\" onclick = \"itemSelect(this);\">{$friSide2['itemName']}</td>
    <td>Cal: {$friSide2['itemCal']}<br> $" . sprintf('%.02f', $friSide2['itemPrice']) . "</td>
    </tr>
    <tr>
    <td id = \"specialRow\" colspan = \"2\">Special</td>
    <td id = \"specialRow\" colspan = \"2\">Special</td>
    <td id = \"specialRow\" colspan = \"2\">Special</td>
    <td id = \"specialRow\" colspan = \"2\">Special</td>
    <td id = \"specialRow\" colspan = \"2\">Special</td>

    </tr>
    <tr>
    <td class = \"menuItem\" onclick = \"itemSelect(this);\">{$monSpecial['itemName']}</td>
    <td>Cal: {$monSpecial['itemCal']} <br> $" . sprintf('%.02f', $monSpecial['itemPrice']) . "</td>
    <td class = \"menuItem\" onclick = \"itemSelect(this);\">{$tueSpecial['itemName']}</td>
    <td>Cal: {$tueSpecial['itemCal']} <br> $" . sprintf('%.02f', $tueSpecial['itemPrice']) . "</td>
    <td class = \"menuItem\" onclick = \"itemSelect(this);\">{$wedSpecial['itemName']}</td>
    <td>Cal: {$wedSpecial['itemCal']} <br> $" . sprintf('%.02f', $wedSpecial['itemPrice']) . "</td>
    <td class = \"menuItem\" onclick = \"itemSelect(this);\">{$wedSpecial['itemName']}</td>
    <td>Cal: {$thuSpecial['itemCal']} <br> $" . sprintf('%.02f', $thuSpecial['itemPrice']) . "</td>
    <td class = \"menuItem\" onclick = \"itemSelect(this);\">{$friSpecial['itemName']}</td>
    <td>Cal: {$friSpecial['itemCal']} <br> $" . sprintf('%.02f', $friSpecial['itemPrice']) . "</td>
    </tr>");
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
<script>
    function itemSelect(td) {
        window.open("items.php/?item=" + td.innerHTML);
    }
</script>
<!DOCTYPE html>
<html>

    <head>

        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/flash.css">
        <title>Flash Food Court</title>
    </head>
    <body>
        <main id="menu">

                <?php
            
            if(isset($_POST['week'])){
                $nextWeekValue = $_POST['week'] + 1;
                $prevWeekValue = $_POST['week'] - 1;
            } else{
                $nextWeekValue = 1;
                $prevWeekValue = -1;
            }
            
            
            echo("<div id=\"section\">
                <form action=\"menu.php\" method=\"post\">
                    Select Week:
                    <button type=\"submit\" name=\"week\" value=\"{$prevWeekValue}\">Previous Week</button>
                    <button type=\"submit\" name=\"week\" value=\"{$nextWeekValue}\">Next Week</button>
                </form>");
            
?>


                <table id="menu" align="center">
                    <colgroup>
                        <col span="2" style="background-color:lightcoral;">
                        <col span="2" style="background-color:lightgrey;">
                        <col span="2" style="background-color:lightcoral;">
                        <col span="2" style="background-color:lightgrey;">
                        <col span="2" style="background-color:lightcoral;">
                    </colgroup>

<?php
outputTableHeader();
outputTableRows();
?>
                </table>



            </div>
        </main>

        <div id="footer">
            Team Flash
        </div>
    </body>
</html>