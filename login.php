<?php

session_start();
require_once 'config.php';

$gebruikersnaam = $_POST['gebruikersnaam'];
$wachtwoord = $_POST['wachtwoord'];

if (strlen($gebruikersnaam) > 0 && strlen($wachtwoord) > 0) {

	$wachtwoord = SHA1($wachtwoord);
	$query = "SELECT * FROM users WHERE gebruikersnaam = '$gebruikersnaam' AND wachtwoord = '$wachtwoord'";
	$result = mysqli_query($mysqli, $query);
	$rijtje = mysqli_fetch_array($result); 

	if (mysqli_num_rows($result) == 1) {

		$_SESSION['gebruikersnaam'] = $gebruikersnaam;
		$_SESSION['id'] = $rijtje['id'];
		$_SESSION['voornaam'] = $rijtje['voornaam'];
		$_SESSION['achternaam'] = $rijtje['achternaam'];
		$_SESSION['wachtwoord'] = $rijtje['wachtwoord'];
        $_SESSION['email'] = $rijtje['email'];
		$_SESSION['rol'] = $rijtje['rol'];
		$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];

		header("Location:dashboard.php");
	} 
	
	else {
		header("Location:dashboard.php");
		exit;
	}

} 

else {
	header("Location:login-fout.php");
	exit;
}

?>