<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'pageNav.php';
?>
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
                    <tr>
                        <th colspan="2">Monday</th>
                        <th colspan="2">Tuesday</th>
                        <th colspan="2">Wednesday</th>
                        <th colspan="2">Thursday</th>
                        <th colspan="2">Friday</th>
                    </tr>
                    <tr>
                        <td id="entreeRow" colspan="2">Entree</td>
                        <td id="entreeRow" colspan="2">Entree</td>
                        <td id="entreeRow" colspan="2">Entree</td>
                        <td id="entreeRow" colspan="2">Entree</td>
                        <td id="entreeRow" colspan="2">Entree</td>

                    </tr>
                    <tr>
                        <td class="menuItem">Baked Chicken</td>
                        <td>Cal: 400 <br> $5.00</td>
                        <td class="menuItem">Tacos</td>
                        <td>Cal: 400 <br> $5.00</td>
                        <td class="menuItem">Tuna Sandwich</td>
                        <td>Cal: 400 <br> $5.00</td>
                        <td class="menuItem">Hamburger</td>
                        <td>Cal: 400 <br> $5.00</td>
                        <td class="menuItem">Baked Potato</td>
                        <td>Cal: 400 <br> $5.00</td>	
                    </tr>
                    <tr>
                        <td id="sideRow" colspan="2">Sides</td>
                        <td id="sideRow" colspan="2">Sides</td>
                        <td id="sideRow" colspan="2">Sides</td>
                        <td id="sideRow" colspan="2">Sides</td>
                        <td id="sideRow" colspan="2">Sides</td>

                    </tr>
                    <tr>
                        <td class="menuItem">Celery</td>
                        <td>Cal: 150 <br> $1.00</td>
                        <td class="menuItem">Carrot</td>
                        <td>Cal: 150 <br> $1.00</td>
                        <td class="menuItem">Banana</td>
                        <td>Cal: 150 <br> $1.00</td>
                        <td class="menuItem">Apple</td>
                        <td>Cal: 150 <br> $1.00</td>
                        <td class="menuItem">Bacon</td>
                        <td>Cal: 150 <br> $1.00</td>	
                    </tr>
                    <tr>
                        <td class="menuItem">Cherry Tomatoes</td>
                        <td>Cal: 150 <br> $1.00</td>
                        <td class="menuItem">Brocolli</td>
                        <td>Cal: 150 <br> $1.00</td>
                        <td class="menuItem">Peas</td>
                        <td>Cal: 150 <br> $1.00</td>
                        <td class="menuItem">Spinach</td>
                        <td>Cal: 150 <br> $1.00</td>
                        <td class="menuItem">Cucumber</td>
                        <td>Cal: 150 <br> $1.00</td>	
                    </tr>
                    <tr>
                        <td id="specialRow" colspan="2">Special</td>
                        <td id="specialRow" colspan="2">Special</td>
                        <td id="specialRow" colspan="2">Special</td>
                        <td id="specialRow" colspan="2">Special</td>
                        <td id="specialRow" colspan="2">Special</td>

                    </tr>
                    <tr>
                        <td class="menuItem">Omelette</td>
                        <td>Cal: 350 <br> $3.50</td>
                        <td class="menuItem">Nachos</td>
                        <td>Cal: 350 <br> $3.50</td>
                        <td class="menuItem">Fruit Salad</td>
                        <td>Cal: 350 <br> $3.50</td>
                        <td class="menuItem">Cesear Salad</td>
                        <td>Cal: 350 <br> $3.50</td>
                        <td class="menuItem">Ratatouille</td>
                        <td>Cal: 350 <br> $3.50</td>	
                    </tr>

                </table>
            </div>
        </main>

        <div id="footer">
            Team Flash
        </div>
    </body>
</html>
