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
  <title>Gebruikers</title>
  <?php include 'include/head.php';?>
</head>
<body>

<?php
  $result = mysqli_query($mysqli, "SELECT COUNT(id) AS count FROM `users`"); 
  $row = mysqli_fetch_assoc($result); 
?>

<div id="viewport">
  <div class="uppernav2">
    <div class="uppernav2left">
      <span class='badge badge-secondary'><i class="fas fa-user-friends"></i> Gebruikers</span> 
      <span class='badge badge-secondary'>Aantal: <?php echo htmlspecialchars($row['count'], ENT_QUOTES, 'UTF-8'); ?></span>
    </div>
    <div class="uppernav2right">
      <?php echo "<a><span class='badge badge-secondary'>Welkom " . htmlspecialchars($_SESSION['voornaam'], ENT_QUOTES, 'UTF-8') . "</span></a>"; ?>
      <a href="logout.php" onclick="return confirm('Weet je zeker dat je uit wilt loggen?');"><span class='badge badge-secondary'><i class='fas fa-sign-out-alt'></i></span></a>
      <a href="gebruiker-toevoegen.php"><span class='badge badge-secondary'><i class="fas fa-plus-square"></i> Gebruiker toevoegen</span></a>
    </div>
  </div>

  <?php include 'include/nav.php';?>

  <div class="uppernav">
    <div class="uppernavleft">
      <span class='badge badge-secondary'><i class="fas fa-user-friends"></i> Alle gebruikers</span> 
      <a href="gebruiker-toevoegen.php"><span class='badge badge-secondary'><i class="fas fa-plus-square"></i> Gebruiker toevoegen</span></a>
    </div>
    <div class="uppernavright">
      <?php echo "<a><span class='badge badge-secondary'>Welkom " . htmlspecialchars($_SESSION['voornaam'], ENT_QUOTES, 'UTF-8') . "</span></a>"; ?>
      <a href="logout.php" onclick="return confirm('Weet je zeker dat je uit wilt loggen?');"><span class='badge badge-secondary'><i class='fas fa-sign-out-alt'></i></span></a>
    </div>
  </div>

  <div class="container-fluid">

    <?php
      $result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id ASC");

      if (isset($_SESSION['rol']) && $_SESSION['rol'] == "user") {
    ?>
      <div class="alert alert-danger" role="alert">
        <i class="fas fa-exclamation-triangle"></i> Uw account is niet bevoegd om deze pagina te bekijken.
      </div>
    <?php 
      } elseif (isset($_SESSION['rol']) && $_SESSION['rol'] == "admin") { 
    ?>
      <table id="customers">
        <tr>
          <th>ID</th>
          <th>Voornaam</th>
          <th>Achternaam</th>
          <th>Email</th>
          <th>Gebruikersnaam</th>
          <th>Rol</th>
          <th>Verwijder</th>
        </tr>
    
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td><?php echo htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlspecialchars($row['voornaam'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlspecialchars($row['achternaam'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlspecialchars($row['gebruikersnaam'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlspecialchars($row['rol'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo "<a href='gebruiker-verwijderen.php?id=".$row['id']."'> <span class='badge badge-secondary'> <i class='fas fa-trash'></i> Verwijderen</a></span></a>";?></td>
          </tr>
        <?php } ?>
      </table>
    <?php 
      } 
    ?>

  </div>
</div>

</body>
</html>
