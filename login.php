<?php

session_start();
require_once 'config.php';

// Fetch and validate POST data
$gebruikersnaam = isset($_POST['gebruikersnaam']) ? trim($_POST['gebruikersnaam']) : '';
$wachtwoord = isset($_POST['wachtwoord']) ? trim($_POST['wachtwoord']) : '';

if (!empty($gebruikersnaam) && !empty($wachtwoord)) {

    // Use prepared statements to prevent SQL injection
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE gebruikersnaam = ? AND wachtwoord = ?");
    $hashed_wachtwoord = SHA1($wachtwoord);
    $stmt->bind_param('ss', $gebruikersnaam, $hashed_wachtwoord);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the query returned a result
    if ($result && $result->num_rows === 1) {
        $rijtje = $result->fetch_assoc();
        
        $_SESSION['gebruikersnaam'] = $gebruikersnaam;
        $_SESSION['id'] = $rijtje['id'];
        $_SESSION['voornaam'] = $rijtje['voornaam'];
        $_SESSION['achternaam'] = $rijtje['achternaam'];
        $_SESSION['wachtwoord'] = $rijtje['wachtwoord'];
        $_SESSION['email'] = $rijtje['email'];
        $_SESSION['rol'] = $rijtje['rol'];
        $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];

        header("Location:dashboard.php");
    } else {
        // Invalid login attempt
        header("Location:login-fout.html");
        exit;
    }

    $stmt->close();
} else {
    // Missing username or password
    header("Location:login-fout.php");
    exit;
}

?>
