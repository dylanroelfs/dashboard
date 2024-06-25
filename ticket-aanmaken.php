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
  <title>Nieuw Ticket</title>
  <?php include 'include/head.php';?>
</head>
<body>

<div id="viewport">
  <div class="uppernav2">
    <div class="uppernav2left">
      <span class='badge badge-secondary'><i class="fas fa-plus-square"></i> Nieuw Ticket</span>
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
      <span class='badge badge-secondary'><i class="fas fa-plus-square"></i> Nieuw Ticket</span>
    </div>
    <div class="uppernavright">
      <?php echo "<a><span class='badge badge-secondary'>Welkom " . htmlspecialchars($_SESSION['voornaam'], ENT_QUOTES, 'UTF-8') . "</span></a>"; ?>
      <a href="logout.php" onclick="return confirm('Weet je zeker dat je uit wilt loggen?');"><span class='badge badge-secondary'><i class='fas fa-sign-out-alt'></i></span></a>
    </div>
  </div>

  <div class="container-fluid">
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
        <label for="ticket">Ticket:</label>
        <textarea name="ticket" id="ticket" required></textarea>
      </p>

      <hr>

      <p>
        <input type="submit" name="submit" id="submit" value="Aanmaken">
        <button class="cancel" onclick="history.back();return false;">Annuleren</button>
      </p>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
      $voornaam = $_POST['voornaam'];
      $achternaam = $_POST['achternaam'];
      $email = $_POST['email'];
      $ticket = $_POST['ticket'];

      $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);

      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $query = "INSERT INTO tickets (voornaam, achternaam, email, ticket) 
                VALUES (?, ?, ?, ?)";

      $stmt = $conn->prepare($query);
      $stmt->bind_param("ssss", $voornaam, $achternaam, $email, $ticket);

      if ($stmt->execute()) {
        echo "<div class='alert alert-success' role='alert'><p><i class='fas fa-check-circle'></i> Ticket is aangemaakt!</p></div>";
      } else {
        echo "<div class='alert alert-danger' role='alert'><p><i class='fas fa-exclamation-triangle'></i> Fout bij aanmaken van het ticket!</p></div>";
      }

      $stmt->close();
      $conn->close();
    }
    ?>

  </div>
</div>

</body>
</html>
