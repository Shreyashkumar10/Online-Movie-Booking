<?php
include 'db.php';  // your database connection file
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Movie Booking</title>
    <link rel="stylesheet" href="css/style.css" />
    
</head>
<body>

<h1>🎬 Movie Booking</h1>

<form action="book.php" method="POST">
  <label for="movie">Choose Movie:</label><br>
  <select name="movie_id" id="movie" required>
    <?php
      $result = $conn->query("SELECT id, title FROM movies");
      if ($result && $result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo "<option value='{$row['id']}'>{$row['title']}</option>";
          }
      } else {
          echo "<option disabled>No movies available</option>";
      }
    ?>
  </select><br><br>

  <label for="name">Your Name:</label><br>
  <input type="text" id="name" name="name" required><br><br>

  <label for="age">Your Age:</label><br>
  <input type="number" id="age" name="age" required><br><br>

  <label for="seats">No. of Seats:</label><br>
  <input type="number" id="seats" name="seats" required><br><br>

  <button type="submit">Book Now</button>
</form>

</body>
</html>
