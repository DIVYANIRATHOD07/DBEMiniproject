<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "medischedu";
$port = 3307; // XAMPP default port for MariaDB (change if needed)
$conn = mysqli_connect($servername, $username, $password, $database, $port);
if (!$conn) {
die(" Connection failed: " . mysqli_connect_error());
}
?>