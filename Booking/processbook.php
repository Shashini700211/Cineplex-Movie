<?php
// Include the database connection
include 'connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $yourName = $_POST["yourName"];
    $title = $_POST["title"];
    $booking_date = $_POST["booking_date"];
    $time = $_POST["time"];
    $seats = $_POST["seats"];
    $selectedSeats = $_POST["selectedSeats"];

    // Insert booking information into the 'bookings' table
    $insertSql = "INSERT INTO bookings (yourName, title, booking_date, time, seats, selectedSeats) 
                  VALUES ('$yourName', '$title', '$booking_date', '$time', $seats, '$selectedSeats')";

    if ($conn->query($insertSql) === TRUE) {
        // Retrieve the last inserted ID (Booking ID)
        $bookingId = $conn->insert_id;

        // Display a thank-you message with booking details including Booking ID
        echo '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="booknow.css">
                <title>Booking Successful - Cineplex</title>
            </head>
            <body>
                <div class="container1">
                    <h1>Booking Successful!</h1>
                    <br><br>
                    <table class="booking-table">
                        <tr>
                            <th colspan="2">Thank you, ' . $yourName . ', for booking with Cineplex!</th>
                        </tr>
                        <tr>
                            <td>Booking ID:</td>
                            <td>' . $bookingId . '</td>
                        </tr>
                        <tr>
                            <td>Movie:</td>
                            <td>' . $title . '</td>
                        </tr>
                        <tr>
                            <td>Date:</td>
                            <td>' . $booking_date . '</td>
                        </tr>
                        <tr>
                            <td>Time:</td>
                            <td>' . $time . '</td>
                        </tr>
                        <tr>
                            <td>Selected Seats:</td>
                            <td>' . $selectedSeats . '</td>
                        </tr>
                    </table>
                    <br><br>
                    <section class="confirmation-section">
                        <div class="confirmation-message">
                            <p> Dear ' . $yourName . ',</p>
                            <p> Your movie ticket booking at Cineplex is confirmed! </p> 
                            <p> Your Booking ID is: ' . $bookingId . '</p>
                            <p> Ready for an amazing cinematic experience.</p>
                            <p> Please check your email for the booking details. If you have any questions or need assistance, feel free to <a href="../Contactus.html">contact us</a>.</p>
                            <p> Enjoy the show, and thank you for choosing Cineplex!</p>
                        </div>
                        <br>
                        <div class="action-buttons">
                            <a href="../home.php" class="cta-button">Home Page</a>
                            <a href="booking.html" class="cta-button">Book Movies</a>
                            <a href="../Contactus.html" class="cta-button">Contact Us</a>
                        </div>
                    </section>
                </div>
            </body>
            </html>';
    } else {
        echo "Error: " . $insertSql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
