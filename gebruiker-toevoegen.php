<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require_once 'config.php';

?>

<!doctype html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nieuwe gebruiker</title>
  <?php include 'include/head.php';?>
</head>
<body>

<div id="viewport">
  <div class="uppernav2">
    <div class="uppernav2left">
      <span class='badge badge-secondary'><i class="fas fa-plus-square"></i> Nieuwe gebruiker</span>
    </div>
    <div class="uppernav2right">
      <?php echo "<a><span class='badge badge-secondary'>Welkom " . htmlspecialchars($_SESSION['voornaam'], ENT_QUOTES, 'UTF-8') . "</span></a>"; ?>
      <a href="logout.php" onclick="return confirm('Weet je zeker dat je uit wilt loggen?');"><span class='badge badge-secondary'><i class='fas fa-sign-out-alt'></i></span></a>
    </div>
  </div>

  <?php include 'include/nav.php';?>

  <!-- Content -->
  <div class="uppernav">
    <div class="uppernavleft">
      <span class='badge badge-secondary'><i class="fas fa-plus-square"></i> Nieuwe gebruiker</span>
    </div>
    <div class="uppernavright">
      <?php echo "<a><span class='badge badge-secondary'>Welkom " . htmlspecialchars($_SESSION['voornaam'], ENT_QUOTES, 'UTF-8') . "</span></a>"; ?>
      <a href="logout.php" onclick="return confirm('Weet je zeker dat je uit wilt loggen?');"><span class='badge badge-secondary'><i class='fas fa-sign-out-alt'></i></span></a>
    </div>
  </div>

  <div class="container-fluid">
    <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] == "user") { ?>
      <div class="alert alert-danger" role="alert">
        <i class="fas fa-exclamation-triangle"></i> Uw account is niet bevoegd om een gebruiker toe te voegen.
      </div>
    <?php } ?>

    <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] == "admin") { ?>
      <form method="post">
        <p>
          <label for="voornaam">Voornaam:</label>
          <input type="text" name="voornaam" id="voornaam" required>
        </p>

        <p>
          <label for="achternaam">Achternaam:</label>
          <input type="text" name="achternaam" id="achternaam" required>
        </p>

        <p>
          <label for="email">Email:</label>
          <input type="email" name="email" id="email" required>
        </p>

        <p>
          <label for="gebruikersnaam">Gebruikersnaam:</label>
          <input type="text" name="gebruikersnaam" id="gebruikersnaam" required>
        </p>

        <p>
          <label for="wachtwoord">Wachtwoord:</label>
          <input type="password" name="wachtwoord" id="wachtwoord" required>
        </p>

        <hr>

        <p>
          <label for="rol">Rol:</label>
          <select name="rol" id="rol">
            <option value="admin">admin</option>
            <option value="user">user</option>
          </select>
        </p>

        <p>
          <input type="submit" name="submit" id="submit" value="Toevoegen">
          <button class="cancel" onclick="history.back();return false;">Annuleren</button>
        </p>
      </form>
    <?php } ?>

    <br>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
      require 'config.php'; 

      $gebruikersnaam = $_POST['gebruikersnaam'];
      $voornaam = $_POST['voornaam'];
      $achternaam = $_POST['achternaam'];
      $email = $_POST['email'];
      $wachtwoord = $_POST['wachtwoord'];
      $wachtwoord_hashed = SHA1($wachtwoord);
      $rol = $_POST['rol'];

      $query = "INSERT INTO users (voornaam, achternaam, email, gebruikersnaam, wachtwoord, rol) 
                VALUES (?, ?, ?, ?, ?, ?)";

      $stmt = $mysqli->prepare($query);
      $stmt->bind_param("ssssss", $voornaam, $achternaam, $email, $gebruikersnaam, $wachtwoord_hashed, $rol);

      if ($stmt->execute()) {
        echo "<div class='alert alert-success' role='alert'><p><i class='fas fa-check-circle'></i> Gebruiker is toegevoegd!</p></div>";
      } else {
        echo "<div class='alert alert-danger' role='alert'><p><i class='fas fa-exclamation-triangle'></i> Fout bij toevoegen van de gebruiker!</p></div>";
      }

      $stmt->close();
      $mysqli->close();
    }
    ?>

  </div>
</div>

</body>
</html>
