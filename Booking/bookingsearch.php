<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="booknow.css">
    <title>Booking Details</title>
</head>

<body>

    <div class="container1">
        <h1>Search Booking History</h1>
        <br><br>

        <!-- Form to input booked IDs for searching -->
        <form method="post" action="">
            <label for="bookedIds">Enter Booked IDs (comma-separated):</label>
            <input type="text" id="bookedIds" name="bookedIds" required>
            <button type="submit">Search</button>
        </form>

        <?php
        // Include the database connection
        include 'connection.php';

        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bookedIds = $_POST['bookedIds'];

            // Sanitize the entered IDs to prevent SQL injection
            $idsArray = array_map('intval', explode(',', $bookedIds));

            // Fetch booking details based on multiple booked IDs
            $sqlSearch = "SELECT * FROM bookings WHERE id IN (" . implode(',', $idsArray) . ")";
            $resultSearch = $conn->query($sqlSearch);

            if ($resultSearch->num_rows > 0) {
                // Display booking details
                echo '<table class="booking-table">
                        <tr>
                            <th>Name</th>
                            <th>Movie</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Selected Seats</th>
                        </tr>';

                while ($row = $resultSearch->fetch_assoc()) {
                    echo '<tr>
                            <td>' . $row['yourName'] . '</td>
                            <td>' . $row['title'] . '</td>
                            <td>' . $row['booking_date'] . '</td>
                            <td>' . $row['time'] . '</td>
                            <td>' . $row['selectedSeats'] . '</td>
                        </tr>';
                }

                echo '</table>';
            } else {
                // No booking details found for the specified booked IDs
                echo '<p>No booking details found for the specified IDs.</p>';
            }
        }

        // Close the database connection
        $conn->close();
        ?>

        <br><br>

        <!-- Add any additional content or links as needed -->

    </div>

</body>

</html>
