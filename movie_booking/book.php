 \<?php
include 'db.php';

// Check if all POST data is set
if (isset($_POST['movie_id'], $_POST['name'], $_POST['seats'])) {
    $movie_id = (int)$_POST['movie_id'];
    $customer_name = $conn->real_escape_string($_POST['name']);
    $seats = (int)$_POST['seats'];

    // Check available seats
    $check = $conn->query("SELECT available_seats FROM movies WHERE id = $movie_id");
    if ($check && $row = $check->fetch_assoc()) {
        if ($row['available_seats'] >= $seats) {
            // Insert booking
            $conn->query("INSERT INTO bookings (movie_id, customer_name, seats) VALUES ($movie_id, '$customer_name', $seats)");
            // Update seat count
            $conn->query("UPDATE movies SET available_seats = available_seats - $seats WHERE id = $movie_id");
            echo "Booking successful!";
        } else {
            echo "Not enough seats available.";
        }
    } else {
        echo "Movie not found.";
    }
} else {
    echo "Please fill all required fields.";
}
?>
