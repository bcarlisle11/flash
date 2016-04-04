<?php
/**
 * Team Flash
 * CS 321
 * inc.reservations.php
 * Used to add extra php methods to reservations.php
 */

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
?>