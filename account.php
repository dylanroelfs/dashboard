<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require_once 'config.php';

?>

<!doctype html>
<html>
<head>
  <title>Mijn account</title>
  <?php include 'include/head.php';?>
</head>
<body>
<div id="viewport">
  <div class="uppernav2">
    <div class="uppernav2left">
      <span class='badge badge-secondary'><i class="fas fa-user-circle"></i> Mijn account</span>
      <a href="wijzig.php"><span class='badge badge-secondary'><i class="fas fa-edit"></i> Wachtwoord wijzigen</span></a>
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
      <span class='badge badge-secondary'><i class="fas fa-user-circle"></i> Mijn account</span>
      <a href="wijzig.php"><span class='badge badge-secondary'><i class="fas fa-edit"></i> Wachtwoord wijzigen</span></a>
    </div>
    <div class="uppernavright">
      <?php echo "<a><span class='badge badge-secondary'>Welkom " . htmlspecialchars($_SESSION['voornaam'], ENT_QUOTES, 'UTF-8') . "</span></a>"; ?>
      <a href="logout.php" onclick="return confirm('Weet je zeker dat je uit wilt loggen?');"><span class='badge badge-secondary'><i class='fas fa-sign-out-alt'></i></span></a>
    </div>
  </div>
  <div class="container-fluid">
    <table id="customers">
      <tr>
        <th>Mijn gegevens</th>
        <th></th>
      </tr>
      <tr>
        <td>Account ID</td>
        <td><?php echo htmlspecialchars($_SESSION['id'], ENT_QUOTES, 'UTF-8'); ?></td> 
      </tr>
      <tr>
        <td>Voornaam</td>
        <td><?php echo htmlspecialchars($_SESSION['voornaam'], ENT_QUOTES, 'UTF-8'); ?></td>
      </tr>
      <tr>
        <td>Achternaam</td>
        <td><?php echo htmlspecialchars($_SESSION['achternaam'], ENT_QUOTES, 'UTF-8'); ?></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><?php echo htmlspecialchars($_SESSION['email'], ENT_QUOTES, 'UTF-8'); ?></td>
      </tr>
      <tr>
        <td>Gebruikersnaam</td>
        <td><?php echo htmlspecialchars($_SESSION['gebruikersnaam'], ENT_QUOTES, 'UTF-8'); ?></td> 
      </tr>
      <tr>
        <td>Rol</td>
        <td><?php echo htmlspecialchars($_SESSION['rol'], ENT_QUOTES, 'UTF-8'); ?></td>
      </tr>
    </table>
  </div>
</div>
</body>
</html>
