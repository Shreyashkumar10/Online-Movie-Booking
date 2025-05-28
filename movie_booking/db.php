<?php
$host = "localhost";          // or "127.0.0.1"
$port = 3307;                 // your custom MySQL port
$username = "root";           // default XAMPP MySQL user
$password = "";               // default XAMPP MySQL password (usually empty)
$database = "movie_booking";

$conn = new mysqli($host, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
