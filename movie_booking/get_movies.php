

<?php
header('Content-Type: application/json');
include 'db.php';

$result = $conn->query("SELECT id, title, showtime, available_seats FROM movies ORDER BY showtime");

$movies = [];
while ($row = $result->fetch_assoc()) {
    $movies[] = $row;
}

echo json_encode($movies);
?>
