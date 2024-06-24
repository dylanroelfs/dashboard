<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require_once 'config.php';

?>

<!doctype html>
<html>

<head>
    <title>Tickets</title>
    <?php include 'include/head.php'; ?>
</head>

<body>
    <div id="viewport">
        <div class="uppernav2">
            <div class="uppernav2left">
                <span class='badge badge-secondary'><i class="fas fa-search"></i> Uitgebreid zoeken</span>
            </div>
            <div class="uppernav2right">
                <a><span class='badge badge-secondary'>Welkom <?php echo htmlspecialchars($_SESSION['voornaam']); ?></span></a>
                <a href="logout.php" onclick="return confirm('Weet je zeker dat je uit wilt loggen?');"><span class='badge badge-secondary'><i class='fas fa-sign-out-alt'></i></span></a>
            </div>
        </div>

        <?php include 'include/nav.php'; ?>

        <div class="uppernav">
            <div class="uppernavleft">
                <span class='badge badge-secondary'><i class="fas fa-search"></i> Tickets </span>
            </div>
            <div class="uppernavright">
                <a><span class='badge badge-secondary'>Welkom <?php echo htmlspecialchars($_SESSION['voornaam']); ?></span></a>
                <a href="logout.php" onclick="return confirm('Weet je zeker dat je uit wilt loggen?');"><span class='badge badge-secondary'><i class='fas fa-sign-out-alt'></i></span></a>
            </div>
        </div>

        <div class="container-fluid">
            <form action="" method="post">
                <h4>Zoeken</h4>
                <br>
                <input type="text" name="search" placeholder="Zoekopdracht...">
                <hr>
                <input type="submit" name="submit" value="Zoeken...">
            </form>

            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $search = $_POST['search'] ?? '';

                $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $search = $conn->real_escape_string($search);
                $sql = "SELECT * FROM `tickets` 
                        WHERE `id` LIKE '%$search%' 
                        OR `voornaam` LIKE '%$search%'  
                        OR `achternaam` LIKE '%$search%' 
                        OR `email` LIKE '%$search%' 
                        OR `ticket` LIKE '%$search%' 
                        ORDER BY id DESC";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='cards1'>";
                        echo "<div class='card card-1'>";
                        echo "<h4>Ticket ID: " . htmlspecialchars($row['id']) . "</h4><hr>";
                        echo "<p>Voornaam: " . htmlspecialchars($row['voornaam']) . "</p>";
                        echo "<p>Achternaam: " . htmlspecialchars($row['achternaam']) . "</p>";
                        echo "<p>Email: " . htmlspecialchars($row['email']) . "</p><hr>";
                        echo "<p>Ticket:<br><br> " . htmlspecialchars($row['ticket']) . "</p>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo '<hr>';
                    echo "Geen zoekresultaten";
                }

                $conn->close();
            }
            ?>
        </div>
    </div>
</body>

</html>
