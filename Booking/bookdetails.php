<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="booknow.css">
    <title>All Booking Details</title>
</head>

<body>

    <div class="container1">
        <h1>All Booking Details</h1>
        <br><br>

        <?php
        // Include the database connection
        include 'connection.php';

        // Fetch all booking details from the database
        $sql = "SELECT * FROM bookings ORDER BY id DESC"; // Assuming you have a primary key 'id'
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Display booking details
            echo '<table class="booking-table">
                    <tr>
                        <th>Name</th>
                        <th>Movie</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Seats</th>
                        <th>Selected Seats</th>
                    </tr>';

            while ($row = $result->fetch_assoc()) {
                echo '<tr>
                        <td>' . $row['yourName'] . '</td>
                        <td>' . $row['title'] . '</td>
                        <td>' . $row['booking_date'] . '</td>
                        <td>' . $row['time'] . '</td>
                        <td>' . $row['seats'] . '</td>
                        <td>' . $row['selectedSeats'] . '</td>
                    </tr>';
            }

            echo '</table>';
        } else {
            // No booking details found
            echo '<p>No booking details available.</p>';
        }

        // Close the database connection
        $conn->close();
        ?>

        <br><br>

        <!-- Add any additional content or links as needed -->

    </div>

</body>

</html>
