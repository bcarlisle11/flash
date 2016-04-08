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
            <select id="time" name="time">
                <option value="choose">Select Time</option>
                <option value="12:00">12:00 P.M.</option>
                <option value="12:15">12:15 P.M.</option>
                <option value="12:30">12:30 P.M.</option>
                <option value="12:45">12:45 P.M.</option>
                <option value="1:00">1:00 P.M.</option>
                <option value="1:15">1:15 P.M.</option>
                <option value="1:30">1:30 P.M.</option>
                <option value="1:45">1:45 P.M.</option>
                <option value="2:00">2:00 P.M.</option>
                <option value="2:15">2:15 P.M.</option>
                <option value="2:30">2:30 P.M.</option>
                <option value="2:45">2:45 P.M.</option>
                <option value="3:00">3:00 P.M.</option>
                <option value="3:15">3:15 P.M.</option>
                <option value="3:30">3:30 P.M.</option>
                <option value="3:45">3:45 P.M.</option>
                <option value="4:00">4:00 P.M.</option>
            </select>
            <?php
            //gets the time from the drop box
            if($_POST['submit'] && $_POST['submit'] !=0){
                $time = $_POST['time'];
            } ?>
            <br><br>
            <label for "diners">Number of Diners:</label>
            <select>
                <option value="choose">Select # of Diners</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
            </select>
            <?php
            //gets the number of diners from the dropbox
            if($_POST['submit'] && $_POST['submit'] !=0){
                $diners = $_POST['diners'];
            }
            ?>
            <br><br>
            <input id="submit" name ="submit" type ="submit">
        </form>
    </div>
</div>