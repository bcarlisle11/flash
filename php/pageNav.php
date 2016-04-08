<?php
/**
 * Created by PhpStorm.
 * User: bcarlisle11
 * Date: 4/3/16
 * Time: 10:05 PM
 */
?>
<header id="header">
    <h1>Flash Food Court</h1>
    <img class ="top-right" src="../flash.jpg" alt="flash" style="...">
    </header>
<ul>
    <li><a href="menu.php">Menu</a></li>
    <li><a href="itemList.html">Items</a></li>
    <li class="dropdown">
        <a href="javascript:void(0)" class="dropdown_btn" onclick="dropDownList()">Reservations</a>
        <div class="dropdown_class" id="drop_list">
            <a href="reservations.php">Reservations Home</a>
            <a href="makeRes.php">Make Reservation</a>
            <a href="editRes.php">Edit Reservation</a>
            <a href="activeRes.php">Check Active Reservations</a>
        </div>
    </li>
    <li><a href="login.html">Login</a></li>
    <li><a href="about.html">Hours and Contact Info</a></li>
</ul>