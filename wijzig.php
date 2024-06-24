<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require_once 'config.php';

?>

<!doctype html>
<html>

<head>
  <title>Analyse wijzigen</title>
  <?php include 'include/head.php';?>
</head>

<body>
  <div id="viewport">
    <div class="uppernav2">
      <div class="uppernav2left">
        <span class='badge badge-secondary'><i class="fas fa-edit"></i> Wachtwoord wijzigen van <?php echo htmlspecialchars($_SESSION['voornaam']); ?></span>
      </div>
      <div class="uppernav2right">
        <?php echo "<a><span class='badge badge-secondary'>Welkom " . htmlspecialchars($_SESSION['voornaam']) . "</span></a>"; ?>
        <a href="logout.php" onclick="return confirm('Weet je zeker dat je uit wilt loggen?');"><span class='badge badge-secondary'><i class='fas fa-sign-out-alt'></i></span></a>
      </div>
    </div>

    <?php include 'include/nav.php';?>

    <!-- Content -->

    <div class="uppernav">
      <div class="uppernavleft">
        <span class='badge badge-secondary'><i class="fas fa-edit"></i> Wachtwoord wijzigen van <?php echo htmlspecialchars($_SESSION['voornaam']); ?></span>
      </div>
      <div class="uppernavright">
        <?php echo "<a><span class='badge badge-secondary'>Welkom " . htmlspecialchars($_SESSION['voornaam']) . "</span></a>"; ?>
        <a href="logout.php" onclick="return confirm('Weet je zeker dat je uit wilt loggen?');"><span class='badge badge-secondary'><i class='fas fa-sign-out-alt'></i></span></a>
      </div>
    </div>

    <div class="container-fluid">
      <form method="post">
        <p>
          <input type="hidden" name="id" id="id" required="required" value="<?php echo htmlspecialchars($_SESSION['id']); ?>">
        </p>
        <p>
          <label for="wachtwoord">Wachtwoord:</label>
          <input type="password" name="wachtwoord" id="wachtwoord" required="required">
        </p>
        <p>
          <input type="submit" onclick="return confirm('Weet je zeker dat je het wachtwoord wilt wijzigen?');" name="submit" id="submit" value="Wijzigen">
          <button class="cancel" onclick="history.back();return false;">Annuleren</button>
        </p>
      </form>

      <?php
      if (isset($_POST['submit'])) {
        require 'config.php';
        
        $wachtwoord = $_POST['wachtwoord'];
        $wachtwoord = sha1($wachtwoord); // Hash the password using SHA1
        $id = $_POST['id']; // Post ID

        $query = "UPDATE `users` SET `wachtwoord` = ? WHERE `id` = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('si', $wachtwoord, $id);

        if ($stmt->execute()) {
          echo "<script>window.location.href='account.php';</script>";
        } else {
          echo "<div class='alert alert-danger' role='alert'><p><i class='fas fa-exclamation-triangle'></i> Fout bij wijzigen van wachtwoord!</p></div>";
        }
        $stmt->close();
        $mysqli->close();
      }
      ?>
    </div>
  </div>
</body>
</html>
