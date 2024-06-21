<?php

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting('E_ALL');
require_once 'session.php';
require_once 'config.php';

?>

<!doctype html>

<html>

<head>

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

    <?php echo "<a><span class='badge badge-secondary'>Welkom " . $_SESSION['voornaam'] . "</span></a>";?></li>
    <a href="logout.php" onclick="return confirm('Weet je zeker dat je uit wilt loggen?');"><span class='badge badge-secondary'><i class='fas fa-sign-out-alt'></i></span></a>

  </div>



</div>

<?php include 'include/nav.php';?>

  <!-- Content -->


  <div class="uppernav">

      <div class="uppernavleft">

      <span class='badge badge-secondary'><i class="fas fa-tachometer-alt"></i> Dashboard</spam>

      </div>

        <div class="uppernavright">

          <?php echo "<a><span class='badge badge-secondary'>Welkom " . $_SESSION['voornaam'] . "</span></a>";?></li>
          <a href="logout.php" onclick="return confirm('Weet je zeker dat je uit wilt loggen?');"><span class='badge badge-secondary'><i class='fas fa-sign-out-alt'></i></span></a>

        </div>



</div>



    <div class="container-fluid">

    <div class="alert alert-success" role="alert">

    <?php echo "<p><i class='fas fa-check-circle'></i> U bent ingelogd als " . $_SESSION['voornaam'] . "</p>"; ?>

    </div>



    <div class="alert alert-info" role="alert">

    <?php echo "<p><i class='fas fa-info-circle'></i> De datum van vandaag is " . date("d-m-Y") ."</p>"; ?>

    </div>



    <div class="alert alert-info" role="alert">

    <?php if($_SESSION['ip'] == $_SERVER['REMOTE_ADDR']) {echo("<p><i class='fas fa-info-circle'></i> Uw ip adres is: " . $_SESSION['ip']) . "</p>";} ?>

    </div>

    </div>

  </div>

</div>





</body>
