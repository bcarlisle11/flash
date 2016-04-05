<?php
/**
 * Created by PhpStorm.
 * User: bcarlisle11
 * Date: 3/29/16
 * Time: 7:27 PM
 */

$task = $_GET['task'];
//populateReservations();

if ($task == populateReservations){
    populateReservations();
}

function getPDO($dbname) {
    include ('../db/flashDB.php');

    try {
        $pdo = new PDO(DB_CONNECTION_STRING . ";dbname=$dbname", DB_USER, DB_PWD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;

    } catch (PDOException $e) {
        $GLOBALS['ConfirmationMessage'] = $e->getMessage();
    }
}// end getPDO()

function dropPhp($name, array $myArr, $chosen=null)
{
    //open select html tag
    $drop = '<select name="'.$name.'" id="'.$name.'">'."\n";

    $chosen = $chosen;

    //runs through the array
    foreach($myArr as $key=>$option){
        $choose = $chosen==$key ? ' selected' : null;

        //add other choices to list
        $drop .= '<option value="'.$key.'"'.$choose.'>'.$option.'</option>'."\n";
    }
    //close the select html tag
    $drop .= '</select>'."\n";

    return $drop;
}

function populateReservations()
{
    try {

        $pdo = getPDO('flash');

        $sql = <<<EOSQL
        /* !40000 ALTER TABLE employee DISABLE KEYS */;
        INSERT INTO employee
        VALUES
            (1, 'Brendan','Carlisle');
            /*!40000 ALTER TABLE employee ENABLE KEYS */;
        
EOSQL;

        $pdo->exec($sql);
        $pdo = null;
    } catch (PDOException $e) {
    $GLOBALS['ConfirmationMessage'] = $e->getMessage();
}

    }
?>