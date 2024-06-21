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

    <?php echo "<a><span class='badge badge-secondary'>Welkom " . $_SESSION['voornaam'] . "</span></a>";?></li>
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

          <?php echo "<a><span class='badge badge-secondary'>Welkom " . $_SESSION['voornaam'] . "</span></a>";?></li>
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
    <td>ID</td>
    <td><?php echo $_SESSION['id']?></td> 
  </tr>

  <tr>
    <td>Voornaam</td>
    <td><?php echo $_SESSION['voornaam']?></td>
  </tr>

  <tr>
    <td>Achternaam</td>
    <td><?php echo $_SESSION['achternaam']?></td>
  </tr>

  <tr>
    <td>Email</td>
    <td><?php echo $_SESSION['email']?></td>
  </tr>

  <tr>
    <td>Gebruikersnaam</td>
    <td><?php echo $_SESSION['gebruikersnaam']?></td> 
  </tr>

  <tr>
    <td>Rol</td>
    <td><?php echo $_SESSION['rol']?></td>
  </tr>

</table>

</div>
</div>
</div>

</body>