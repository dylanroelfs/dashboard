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
  <title>Dashboard</title>
  <?php include 'include/head.php';?>
</head>
<body>

<div id="viewport">
  <div class="uppernav2">
    <div class="uppernav2left">
      <span class='badge badge-secondary'><i class="fas fa-tachometer-alt"></i> Dashboard</span>
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
      <span class='badge badge-secondary'><i class="fas fa-tachometer-alt"></i> Dashboard</span>
    </div>
    <div class="uppernavright">
      <?php echo "<a><span class='badge badge-secondary'>Welkom " . htmlspecialchars($_SESSION['voornaam'], ENT_QUOTES, 'UTF-8') . "</span></a>"; ?>
      <a href="logout.php" onclick="return confirm('Weet je zeker dat je uit wilt loggen?');"><span class='badge badge-secondary'><i class='fas fa-sign-out-alt'></i></span></a>
    </div>
  </div>

  <div class="container-fluid">
    <div class="alert alert-success" role="alert">
      <?php echo "<p><i class='fas fa-check-circle'></i> U bent ingelogd als " . htmlspecialchars($_SESSION['voornaam'], ENT_QUOTES, 'UTF-8') . "</p>"; ?>
    </div>

    <div class="alert alert-info" role="alert">
      <?php echo "<p><i class='fas fa-info-circle'></i> De datum van vandaag is " . date("d-m-Y") ."</p>"; ?>
    </div>

    <div class="alert alert-info" role="alert">
      <?php if ($_SESSION['ip'] == $_SERVER['REMOTE_ADDR']) {
        echo "<p><i class='fas fa-info-circle'></i> Uw ip adres is: " . htmlspecialchars($_SESSION['ip'], ENT_QUOTES, 'UTF-8') . "</p>";
      } ?>
    </div>
  </div>
</div>

</body>
</html>
