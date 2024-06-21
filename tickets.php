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
  <title>Tickets</title>
  <?php include 'include/head.php';?>
</head>

<body>
<div id="viewport">
  <div class="uppernav2">
  <div class="uppernav2left">
  <span class='badge badge-secondary'><i class="fas fa-search"></i> Uitgebreid zoeken</span>
</div>

  <div class="uppernav2right">
    <?php echo "<a><span class='badge badge-secondary'>Welkom " . $_SESSION['voornaam'] . "</span></a>";?></li>
    <a href="logout.php" onclick="return confirm('Weet je zeker dat je uit wilt loggen?');"><span class='badge badge-secondary'><i class='fas fa-sign-out-alt'></i></span></a>
  </div>
</div>

<?php include 'include/nav.php';?>

  <div class="uppernav">

      <div class="uppernavleft">
        <span class='badge badge-secondary'><i class="fas fa-search"></i> Uitgebreid zoeken </span>
      </div>

        <div class="uppernavright">
          <?php echo "<a><span class='badge badge-secondary'>Welkom " . $_SESSION['voornaam'] . "</span></a>";?></li>
          <a href="logout.php" onclick="return confirm('Weet je zeker dat je uit wilt loggen?');"><span class='badge badge-secondary'><i class='fas fa-sign-out-alt'></i></span></a>
        </div>

</div>

<div class="container-fluid">

<form action="" method="post">
  <h4>Zoeken</h4>
  <br>
  <input type="text" name="search" placeholder="Zoekopdracht..."><hr>
  <input type="submit" name="submit" value="Zoeken...">
</form>



<?php

$search = $_POST['search'];

require 'config.php'; 

$conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "SELECT * FROM `tickets` 
WHERE `id` LIKE '%$search%' 
OR `voornaam` LIKE '%$search%'  
OR `achternaam` LIKE '%$search%' 
OR `email` LIKE '%$search%' 
OR `ticket` LIKE '%$search%' 
ORDER BY id DESC";

$result = $conn->query($sql);

if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
    echo "<div class='cards1'>";
    echo "<div class='card card-1'>";
    echo "<h4>Ticket ID: " . $row['id'] . "</h4><hr>";
    echo "<p>Voornaam: " . $row['voornaam'] . "</p>";
    echo "<p>Achternaam: " . $row['achternaam'] . "</p>";
    echo "<p>Email: " . $row['email'] . "</p><hr>";
    echo "<p>Ticket:<br><br> " . $row['ticket'] . "</p>";
    echo "</div>";
    echo "</div>";
}
}

 else {
  echo '<hr>';
	echo "Geen zoekresultaten";
}

$conn->close();

?>

</div>
</div>
</div>
</div>

</body>