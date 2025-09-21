<?php
// Include the database connection
include 'connection.php';

// Fetch movie titles from the 'movies' table
$sql = "SELECT title FROM movies";
$result = $conn->query($sql);

// Check if there are any rows in the result
if ($result->num_rows > 0) {
    // Start the HTML form
    echo '<!DOCTYPE html>
          <html lang="en">
          <head>
              <meta charset="UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <link rel="icon" type="images/x-icon" href="../images/cineplex.png">
              <link rel="stylesheet" href="booknow.css">
              <title>Cineplex - Book Now</title>
          </head>
          <body>
              <header>
                  <div class="logo">
                      <img src="../images/cineplex.png" alt="Cineplex Logo">
                      <h1>Cineplex</h1>
                  </div>
                  <nav>
                      <ul>
                          <li><a href="../home.php">Home</a></li>
                          <li><a href="../movie.php">Movies</a></li>
                          <li><a href="../theaterinfo.php">Theater Info</a></li>
                          <li><a href="../login/login.html">Login</a></li>
                          <li><a href="../Contactus.html">Contact US</a></li>
                      </ul>
                  </nav>
                  <div class="search-bar">
                      <form action="search.php" method="GET">
                          <input type="text" name="query" placeholder="Search movies...">
                          <button type="submit">Search</button>
                      </form>
                  </div>
              </header>
              <br><br>
              <section class="book-now">
                  <h2>Book Now</h2>
                  <br>
                  <form id="bookingForm" action="processbook.php" method="POST">
                      <label for="yourName">Your Name:</label>
                      <input type="text" name="yourName" id="yourName" required>

                      <label for="title">Select Movie:</label>
                      <select id="title" name="title" required>';

    // Output each movie title as an option in the dropdown
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['title'] . '">' . $row['title'] . '</option>';
    }

    // Close the HTML form
    echo '</select>
          <label for="booking_date">Booking Date:</label>
          <input type="date" id="booking_date" name="booking_date" required>
          <label for="time">Select Time:</label>
            <input type="time" name="time" required>

            <label for="seats">Number of Seats:</label>
            <input type="number" name="seats" min="1" required>

            <br>

            <div class="container">
                <h2>Select Your Seats</h2>
                <div class="seats-container">
                    <div class="seat" id="seat-1">1</div>
                    <div class="seat" id="seat-2">2</div>
                    <div class="seat" id="seat-3">3</div>
                    <div class="seat" id="seat-4">4</div>
                    <div class="seat" id="seat-5">5</div>
                    <div class="seat" id="seat-6">6</div>
                    <div class="seat" id="seat-7">7</div>
                    <div class="seat" id="seat-8">8</div>
                    <div class="seat" id="seat-9">9</div>
                    <div class="seat" id="seat-10">10</div>
                    <div class="seat" id="seat-11">11</div>
                    <div class="seat" id="seat-12">12</div>
                    <div class="seat" id="seat-13">13</div>
                    <div class="seat" id="seat-14">14</div>
                    <div class="seat" id="seat-15">15</div>
                    <div class="seat" id="seat-16">16</div>
                    <div class="seat" id="seat-17">17</div>
                    <div class="seat" id="seat-18">18</div>
                    <div class="seat" id="seat-19">19</div>
                    <div class="seat" id="seat-20">20</div>
                    <div class="seat" id="seat-21">21</div>
                    <div class="seat" id="seat-22">22</div>
                    <div class="seat" id="seat-23">23</div>
                    <div class="seat" id="seat-24">24</div>
                    <div class="seat" id="seat-25">25</div>
                    <div class="seat" id="seat-26">26</div>
                    <div class="seat" id="seat-27">27</div>
                    <div class="seat" id="seat-28">28</div>
                    <div class="seat" id="seat-29">29</div>
                    <div class="seat" id="seat-30">30</div>
                </div>
                <br>
                <div class="screen">
                    <h1>Movie Screen Here</h1>
                </div>
            </div>
            <input type="hidden" name="selectedSeats" id="selectedSeatsInput" value="">
            <button type="button" onclick="confirmBooking()"><strong>Confirm Booking</strong></button>

            <br></form>
  </section>
  <footer>
      <p>&copy; 2024 Cineplex. All rights reserved.</p>
  </footer>
  <script src="script.js"></script>
</body>
</html>';

} else {
    // Display an error if no movies are found
    echo "No movies found in the database.";
}

// Close the database connection
$conn->close();
?>
