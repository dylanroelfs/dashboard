<?php

// Set error reporting to show all errors and display them
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Database connection parameters
$db_hostname = 'localhost';
$db_username = '#';
$db_password = '#';
$db_database = '#';

// Establish a database connection using MySQLi
$mysqli = new mysqli($db_hostname, $db_username, $db_password, $db_database);

// Check for connection errors
if ($mysqli->connect_error) {
    echo "FOUT: geen connectie naar database. <br>";
    echo "Errno " . $mysqli->connect_errno . "<br/>";
    echo "Error " . $mysqli->connect_error . "<br/>";
    exit;
}

?>
