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

  <title>Alle gebruikers</title>
  <?php include 'include/head.php';?>

</head>
<body>

<?php
  $result = mysqli_query($mysqli, "SELECT COUNT(id) FROM `users`"); 
  $row = mysqli_fetch_array($result); 
?>

<div id="viewport">
<div class="uppernav2">
<div class="uppernav2left">
<span class='badge badge-secondary'><i class="fas fa-user-friends"></i> Alle gebruikers</span> <span class='badge badge-secondary'>Aantal: <?php echo ($row[0]);?></span>
</div>

  <div class="uppernav2right">

    <?php echo "<a><span class='badge badge-secondary'>Welkom " . $_SESSION['voornaam'] . "</span></a>";?></li>
    <a href="logout.php" onclick="return confirm('Weet je zeker dat je uit wilt loggen?');"><span class='badge badge-secondary'><i class='fas fa-sign-out-alt'></i></span></a>
    <a href="gebruiker-toevoegen.php"><span class='badge badge-secondary'><i class="fas fa-plus-square"></i> Gebruiker toevoegen</span></a>

  </div>



</div>

<?php include 'include/nav.php';?>

<?php
  $result = mysqli_query($mysqli, "SELECT COUNT(id) FROM `users`");
  $row = mysqli_fetch_array($result);
?>


<div class="uppernav">
    <div class="uppernavleft">
    <span class='badge badge-secondary'><i class="fas fa-user-friends"></i> Alle gebruikers</span> <span class='badge badge-secondary'>Aantal: <?php echo ($row[0]);?></span>
    <a href="gebruiker-toevoegen.php"><span class='badge badge-secondary'><i class="fas fa-plus-square"></i> Gebruiker toevoegen</span></a>
  </div>
  <div class="uppernavright">
    <?php echo "<a><span class='badge badge-secondary'>Welkom " . $_SESSION['voornaam'] . "</span></a>";?></li>
    <a href="logout.php" onclick="return confirm('Weet je zeker dat je uit wilt loggen?');"><span class='badge badge-secondary'><i class='fas fa-sign-out-alt'></i></span></a>
  </div>
</div>

<div class="container-fluid">

<?php $result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id ASC");	?>

<?php if (isset($_SESSION['rol']) && $_SESSION['rol'] == "user") { ?>

<div class="alert alert-danger" role="alert">

<i class="fas fa-exclamation-triangle"></i> Uw account is niet bevoegd om deze pagina te bekijken.

</div>

<?php }?>

<?php if (isset($_SESSION['rol']) && $_SESSION['rol'] == "admin") { ?>

    <table id="customers">

        <tr>
          <th>ID</th>
          <th>Voornaam</th>
          <th>Achternaam</th>
          <th>Email</th>
          <th>Gebruikersnaam</th>
          <th>Rol</th>
        </tr>
    
        <?php while ($row = mysqli_fetch_array($result)) {?>

        <tr>
          <td><?php echo $row['id']?></td>
          <td><?php echo $row['voornaam']?></td>
          <td><?php echo $row['achternaam']?></td>
          <td><?php echo $row['email']?></td>
          <td><?php echo $row['gebruikersnaam']?></td>
          <td><?php echo $row['rol']?></td>
        </tr>

        <?php }?>

      </table>

<?php } ?>

</div>

</div>

</div>

</body>