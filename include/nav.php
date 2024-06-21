<?php

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting('E_ALL');
require_once 'session.php';
require_once 'config.php';

?>
  
  <div id="sidebar">

    <header><img class="toplogo" src="image/logo-orange.png" width="25%" alt="logo"></header>

    <ul class="nav">

    <li><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>

    <?php $result = mysqli_query($mysqli, "SELECT COUNT(id) FROM `tickets`"); $row = mysqli_fetch_array($result); ?>
    <li><a href="tickets.php"><i class="fas fa-user-friends"></i> Tickets  <span class='badge badge-secondary nomargin'><?php echo ($row[0]);?></span></a></li>

    <?php $result = mysqli_query($mysqli, "SELECT COUNT(id) FROM `users`"); $row = mysqli_fetch_array($result); ?>
    <li><a href="gebruikers.php"><i class="fas fa-user-friends"></i> Gebruikers  <span class='badge badge-secondary nomargin'><?php echo ($row[0]);?></span></a></li>

    <li><a href="account.php"><i class="fas fa-user-circle"></i> Mijn account</a></li>

    </ul>

  </div>

  <div class="topnav" id="myTopnav">
  <a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
  <a href="tickets.php"><i class="fas fa-search"></i> Tickets</a>
  <a href="gebruikers.php"><i class="fas fa-user-friends"></i> Gebruikers</a>
  <a href="mijn-account.php"><i class="fas fa-user-circle"></i> Mijn account</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>

</div>

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
  
