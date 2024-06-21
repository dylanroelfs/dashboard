<?php

error_reporting(E_All);
ini_set('display_errors', '1');

$db_hostname = 'localhost';
$db_username = 'u72381p270346_admin';
$db_password = 'jykfUv-tecse1-dozfiq';
$db_database =  'u72381p270346_DB';

$mysqli = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

if (!mysqli) {

	echo "FOUT: geen conectie naar database. <br>";
	echo "Errno " . mysqli_connect_error() . "<br/>";
	echo "Error " . mysqli_connect_error() . "<br/>";
	exit;
}

?>