<base href="/flash/php/manageItems.php"/> <!-- hax -->
<?php 
include_once 'pageNav.php';


if(isset($_POST['date'])){
    insertMenu();
    outputSuccess();
    unset($_POST);
    $_POST = array();
}
function outputSuccess(){
            echo("<p style=\"text-align:center;\">Menu successfully input!</p>");
        }
        

function insertMenu(){
    
    
    
    
     try {
        $pdo = getPDO('flash');

        $date = $_POST['date'];
        $entree = $_POST['entree'];
        $side1 = $_POST['side1'];
        $side2 = $_POST['side2'];
        $special = $_POST['special'];
        
        $sql = "SELECT `menuDate` FROM `menu` WHERE menuDate = '$date'";

        $queryResult = $pdo->query($sql);
        
        $row = $queryResult->fetch(PDO::FETCH_ASSOC);
        
        if(isset($row['menuDate'])){
            $sql = "DELETE FROM `menu` WHERE `menu`.`menuDate` = '{$row['menuDate']}';";

            $queryResult = $pdo->query($sql);
        }
        

        $sql = "INSERT INTO `menu` (`menuDate`, `menuEntree`, `menuSide1`, `menuSide2`, `menuSpecial`) VALUES ('$date', '$entree', '$side1', '$side2', '$special')";

        $queryResult = $pdo->query($sql);

    } catch (PDOException $e) {
        
    }
    
    
}


function populateOptions($type) {
    try {
        $pdo = getPDO('flash');

        $sql = "SELECT `itemName`, `itemPrice`, `itemCal` FROM `items` WHERE itemType = '$type'";

        $queryResult = $pdo->query($sql);




        while ($row = $queryResult->fetch(PDO::FETCH_ASSOC)) {

            echo("
                      <option value=\"{$row['itemName']}\">{$row['itemName']}</option>
                          ");
        }
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
<html>

    <head>

        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/flash.css">
        <title>Flash Food Court</title>
    </head>
    <body>

<div id="addMenu">
    <div id="form" class="center">
        Select items for the Menu<br><br>
        <form method ="post" action="createMenu.php">
            <label for="date">Date:</label>
            <input type="date" name="date" value="" required> <br><br>
            
            
            <label for="entree">Entree:</label>
            <select name="entree" required>
                <option value=""></option>
                <?php populateOptions("entree"); ?>
            </select> <br><br>
            <label for="side1">Side One:</label>
            <select name="side1" required>
                <option></option>
                <?php populateOptions("side"); ?>
            </select><br><br>
            <label for="side2">Side Two:</label>
            <select name="side2" required>
                <option></option>
                <?php populateOptions("side"); ?>
            </select><br><br>
            <label for="special">Special:</label>
            <select name="special" required>
                <option></option>
                <?php populateOptions("special"); ?>
            </select><br><br>

            <input type="submit">
        </form>
        
    </div>
</div>
</div>
<div id="footer">
    Team Flash
</div>
</body>
</html>