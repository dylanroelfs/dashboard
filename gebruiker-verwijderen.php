<!doctype html>
<html>
<head>
    <title>Gebruiker verwijderen</title>
<meta charset="utf-8">
<?php include 'include/head.php';?>
</head>
<?php
require_once 'config.php';

$id = $_GET['id'];

    $query = "DELETE FROM users WHERE id = $id";

	
    if(mysqli_query($mysqli, $query))
    {
        echo "<div class='alert alert-success' role='alert'><p><i class='fas fa-check-circle'></i> Gebruiker is verwijderd! Klik <a href='gebruikers.php'>hier</a> om terug te gaan.</p></div>";
    }
    else
    {
        echo "<div class='alert alert-danger' role='alert'><p><i class='fas fa-exclamation-triangle'></i> Fout bij verwijderen van de gebruiker! Klik <a href='gebruikers.php''>hier</a> om terug te gaan.</p></div>";
        echo mysqli_error($mysqli);
    }
?>
</body>
</html>