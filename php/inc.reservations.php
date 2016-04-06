<?php
/**
 * Team Flash
 * CS 321
 * inc.reservations.php
 * Used to add extra php methods to reservations.php
 */

$idErr = $emailErr = $genderErr = $websiteErr = "";
$id = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["id"])) {
        $idErr = "First Name is required";
    } else {
        $id = validateForm($_POST["id"]);
    }
}

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
    echo $drop;
}

function validateForm($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}
?>