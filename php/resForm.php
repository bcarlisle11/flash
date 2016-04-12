<?php
/**
 * Created by PhpStorm.
 * User: bcarlisle11
 * Date: 4/4/16
 * Time: 2:40 PM
 */
echo "<script type='text/javascript' src='../script/reservations.js'></script>";
?>
<div id="res_section">
    <div id="form" class="center">
        Please fill in all required fields to reserve a table:<br><br>
        <form method ="post" action="addRes.php">
            <label for="id">Employee ID:</label> <input type="text" name="id" value=""><br><br>
            <label for="dayof"> Reservation Day:</label>
            <select id="day" name="day">
                <option value="0">Select Day</option>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
            </select>
            <?php
            //gets the selected day
            if($_POST['submit'] && $_POST['submit'] !=0){
                $day = $_POST['day'];
            }
            ?>
            <br><br>
            <label for="timeof">Reservation Time:</label>
            <select id="time" name="time">
                <option value="0">Select Time</option>
                <option value="12:00 P.M.">12:00 P.M.</option>
                <option value="12:15 P.M.">12:15 P.M.</option>
                <option value="12:30 P.M.">12:30 P.M.</option>
                <option value="12:45 P.M.">12:45 P.M.</option>
                <option value="1:00 P.M.">1:00 P.M.</option>
                <option value="1:15 P.M.">1:15 P.M.</option>
                <option value="1:30 P.M.">1:30 P.M.</option>
                <option value="1:45 P.M.">1:45 P.M.</option>
                <option value="2:00 P.M.">2:00 P.M.</option>
                <option value="2:15 P.M.">2:15 P.M.</option>
                <option value="2:30 P.M.">2:30 P.M.</option>
                <option value="2:45 P.M.">2:45 P.M.</option>
                <option value="3:00 P.M.">3:00 P.M.</option>
                <option value="3:15 P.M.">3:15 P.M.</option>
                <option value="3:30 P.M.">3:30 P.M.</option>
                <option value="3:45 P.M.">3:45 P.M.</option>
                <option value="4:00 P.M.">4:00 P.M.</option>
                <option value="4:15 P.M.">4:15 P.M.</option>
                <option value="4:30 P.M.">4:30 P.M.</option>
            </select>
            <?php
            //gets the time from the drop box
            if($_POST['submit'] && $_POST['submit'] != 0){
               $time = $_POST['time'];
            } ?>
            <br><br>
            <label for="diners">Number of Diners:</label>
            <select id="diner" name="diner">
                <option value="0">Select # of Diners</option>
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
                $diners = $_POST['diner'];
            }
            ?>
            <br><br>
            <input id="submit" name ="submit" type ="submit">
        </form>
    </div>
</div>