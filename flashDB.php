<?php
DEFINE ('DB_HOST', 'localhost:8889');
DEFINE ('DB_NAME', 'flash');
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PWD', 'root');

/* Define the constant for PDO use. */
$_conString = 'mysql:host=' . DB_HOST; // . ';dbname=' . DB_NAME;

DEFINE ('DB_CONNECTION_STRING', $_conString);