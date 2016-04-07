<?php
/**
 * Created by PhpStorm.
 * User: bcarlisle11
 * Date: 4/4/16
 * Time: 2:40 PM
 */
?>
<div method="post" id="res_section">
    <div id="form" class="center">
        <br><br>
        Please fill in all required fields to reserve a table:<br><br>
        <form method ="post" action="addRes.php">
            <label for "emp_id">Employee ID: </label><input type="text" name="id" value=""><br><br>
            <label for "dayof">Reservation Day:</label>
            <?php
            $name = 'dropResDay';
            $myArr = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday");
            //$chosen = 0;

            echo dropPhp($name, $myArr, $chosen);
            $selected = myArr[$chosen];
            //echo $selected;
            ?>
            <br><br>
            <label for "timeof">Reservation Time:</label>
            <?php
            $name = 'dropResTime';
            $myArr = array('12:00 P.M.', '12:15 P.M.', '12:30 P.M.', '12:45 P.M.',
                '1:00 P.M.', '1:30 P.M.', '1:45 P.M.', '2:00 P.M.',
                '2:15 P.M.', '2:30 P.M.', '2:45 P.M.', '3:00 P.M.',
                '3:15 P.M.', '3:30 P.M.', '3:45 P.M.', '4:00 P.M.');
            //$chosen = 0;

            echo dropPhp($name, $myArr, $chosen);
            ?>
            <br><br>
            <label for "diners">Number of Diners:</label>
            <?php
            $name = 'dropDiners';
            $myArr = array('1', '2', '3', '4', '5', '6', '7', '8');
            //$chosen = 0;

            echo dropPhp($name, $myArr, $chosen);
            ?>
            <br><br>
            <input id="submit" name ="submit" type ="submit">
        </form>
    </div>
</div>