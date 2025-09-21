<?php
include 'connection.php';

if (isset($_GET['booking_id'])) {
    $booking_id = mysqli_real_escape_string($conn, $_GET['booking_id']);

    $deleteSql = "DELETE FROM bookings WHERE id = '$booking_id'";

    if ($conn->query($deleteSql) === TRUE) {
        echo "<script>
                alert('Booking deleted successfully.');
                window.location.href = 'bookdelete.php';
              </script>";
    } else {
        echo "<script>
                alert('Error deleting booking: " . $conn->error . "');
                window.location.href = '';
              </script>";
    }
} else {
    echo "Booking ID not provided.";
}

$conn->close();
?>
