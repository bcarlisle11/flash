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
        
        $date = getDateOfDay("Tuesday", true);
        $sql = "SELECT `menuEntree`, `menuSide1`, `menuSide2`, `menuSpecial` FROM `menu` WHERE menuDate = '$date'";
        $queryResult = $pdo->query($sql);
        $tue = $queryResult->fetch(PDO::FETCH_ASSOC);
        
        $date = getDateOfDay("Wednesday", true);
        $sql = "SELECT `menuEntree`, `menuSide1`, `menuSide2`, `menuSpecial` FROM `menu` WHERE menuDate = '$date'";
        $queryResult = $pdo->query($sql);
        $wed = $queryResult->fetch(PDO::FETCH_ASSOC);
        
        $date = getDateOfDay("Thursday", true);
        $sql = "SELECT `menuEntree`, `menuSide1`, `menuSide2`, `menuSpecial` FROM `menu` WHERE menuDate = '$date'";
        $queryResult = $pdo->query($sql);
        $thu = $queryResult->fetch(PDO::FETCH_ASSOC);
        
        $date = getDateOfDay("Friday", true);
        $sql = "SELECT `menuEntree`, `menuSide1`, `menuSide2`, `menuSpecial` FROM `menu` WHERE menuDate = '$date'";
        $queryResult = $pdo->query($sql);
        $fri = $queryResult->fetch(PDO::FETCH_ASSOC);
    
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
    <td class = \"menuItem\" onclick = \"itemSelect(this);\">{$mon['menuEntree']}</td>
    <td>Cal: 400 <br> $5.00</td>
    <td class = \"menuItem\" onclick = \"itemSelect(this);\">{$tue['menuEntree']}</td>
    <td>Cal: 400 <br> $5.00</td>
    <td class = \"menuItem\" onclick = \"itemSelect(this);\">{$wed['menuEntree']}</td>
    <td>Cal: 400 <br> $5.00</td>
    <td class = \"menuItem\" onclick = \"itemSelect(this);\">{$thu['menuEntree']}</td>
    <td>Cal: 400 <br> $5.00</td>
    <td class = \"menuItem\" onclick = \"itemSelect(this);\">{$fri['menuEntree']}</td>
    <td>Cal: 400 <br> $5.00</td>
    </tr>
    <tr>
    <td id = \"sideRow\" colspan = \"2\">Sides</td>
    <td id = \"sideRow\" colspan = \"2\">Sides</td>
    <td id = \"sideRow\" colspan = \"2\">Sides</td>
    <td id = \"sideRow\" colspan = \"2\">Sides</td>
    <td id = \"sideRow\" colspan = \"2\">Sides</td>

    </tr>
    <tr>
    <td class = \"menuItem\" onclick = \"itemSelect(this);\">{$mon['menuSide1']}</td>
    <td>Cal: 150 <br> $1.00</td>
    <td class = \"menuItem\" onclick = \"itemSelect(this);\">{$tue['menuSide1']}</td>
    <td>Cal: 150 <br> $1.00</td>
    <td class = \"menuItem\" onclick = \"itemSelect(this);\">{$wed['menuSide1']}</td>
    <td>Cal: 150 <br> $1.00</td>
    <td class = \"menuItem\" onclick = \"itemSelect(this);\">{$thu['menuSide1']}</td>
    <td>Cal: 150 <br> $1.00</td>
    <td class = \"menuItem\" onclick = \"itemSelect(this);\">{$fri['menuSide1']}</td>
    <td>Cal: 150 <br> $1.00</td>
    </tr>
    <tr>
    <td class = \"menuItem\" onclick = \"itemSelect(this);\">{$mon['menuSide2']}</td>
    <td>Cal: 150 <br> $1.00</td>
    <td class = \"menuItem\" onclick = \"itemSelect(this);\">{$tue['menuSide2']}</td>
    <td>Cal: 150 <br> $1.00</td>
    <td class = \"menuItem\" onclick = \"itemSelect(this);\">{$wed['menuSide2']}</td>
    <td>Cal: 150 <br> $1.00</td>
    <td class = \"menuItem\" onclick = \"itemSelect(this);\">{$thu['menuSide2']}</td>
    <td>Cal: 150 <br> $1.00</td>
    <td class = \"menuItem\" onclick = \"itemSelect(this);\">{$fri['menuSide2']}</td>
    <td>Cal: 150 <br> $1.00</td>
    </tr>
    <tr>
    <td id = \"specialRow\" colspan = \"2\">Special</td>
    <td id = \"specialRow\" colspan = \"2\">Special</td>
    <td id = \"specialRow\" colspan = \"2\">Special</td>
    <td id = \"specialRow\" colspan = \"2\">Special</td>
    <td id = \"specialRow\" colspan = \"2\">Special</td>

    </tr>
    <tr>
    <td class = \"menuItem\" onclick = \"itemSelect(this);\">{$mon['menuSpecial']}</td>
    <td>Cal: 350 <br> $3.50</td>
    <td class = \"menuItem\" onclick = \"itemSelect(this);\">{$tue['menuSpecial']}</td>
    <td>Cal: 350 <br> $3.50</td>
    <td class = \"menuItem\" onclick = \"itemSelect(this);\">{$wed['menuSpecial']}</td>
    <td>Cal: 350 <br> $3.50</td>
    <td class = \"menuItem\" onclick = \"itemSelect(this);\">{$thu['menuSpecial']}</td>
    <td>Cal: 350 <br> $3.50</td>
    <td class = \"menuItem\" onclick = \"itemSelect(this);\">{$fri['menuSpecial']}</td>
    <td>Cal: 350 <br> $3.50</td>
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


            <div id="section">
                <button>Previous Week</button>
                <button>Select Week</button>
                <button>Next Week</button>


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
