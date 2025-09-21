<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="booknow.css">
    <link rel="icon" type="images/x-icon" href="../images/cineplex.png">
    <title>Booking Details</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .container1 {
            max-width: 1000px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
           
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        td {
            background-color: #f5f5f5;
        }

        a.delete-btn {
            background-color: #ff4500;
            color: #fff;
            padding: 8px 12px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a.delete-btn:hover {
            background-color: #e63e00;
        }
    </style>
</head>

<body>

    <div class="container1">
        <br>
        <h1>Booking List</h1>
        <br>
        <table>
            <tr>
                <th>Booking ID</th>
                <th>Your Name</th>
                <th>Title</th>
                <th>Booking Date</th>
                <th>Time</th>
                <th>Seats</th>
                <th>Selected Seats</th>
                <th>Remove</th>
            </tr>

            <?php
            include 'connection.php';

            // Assuming your table is named 'bookings'
            $sql = "SELECT * FROM bookings";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['yourName'] . "</td>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['booking_date'] . "</td>";
                echo "<td>" . $row['time'] . "</td>";
                echo "<td>" . $row['seats'] . "</td>";
                echo "<td>" . $row['selectedSeats'] . "</td>";
                echo "<td>";
                ?>

                <a href="deletebook.php?booking_id=<?php echo $row['id']; ?>"
                    class="delete-btn"
                    onClick="return confirm('Do you really want to delete this booking?');">Delete</a>

                <?php
                echo "</td>";
                echo "</tr>";
            }

            mysqli_close($conn);
            ?>
        </table>
    </div>
</body>

</html>
