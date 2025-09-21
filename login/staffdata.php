<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="images/x-icon" href="../images/cineplex.png">
    <link rel="stylesheet" href="../Booking/booknow.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .staff-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .staff-table th,
        .staff-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        .staff-table th {
            background-color: #f2f2f2;
        }

        .staff-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .delete-btn {
            background-color: #ff5050;
            color: #fff;
            padding: 8px 12px;
            border: none;
            cursor: pointer;
        }
    </style>
    <title>Staff Details</title>
</head>

<body>

    <div class="container">
        <h1>Staff Details</h1>
        <br><br>

        <?php
        // Include the database connection
        include 'connection.php';

        // Check if delete button is clicked
        if (isset($_POST['delete'])) {
            $deleteEmail = $_POST['deleteEmail'];

            // SQL query to delete staff record
            $deleteSql = "DELETE FROM staff WHERE email = '$deleteEmail'";
            if ($conn->query($deleteSql)) {
                echo '<p style="color: green;">Staff record deleted successfully!</p>';
            } else {
                echo '<p style="color: red;">Error deleting staff record: ' . $conn->error . '</p>';
            }
        }

        // SQL query to select all staff data
        $sql = "SELECT * FROM staff";

        // Perform the query and check for errors
        $result = $conn->query($sql);

        if (!$result) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        } else {
            // Check if there are rows in the result set
            if ($result->num_rows > 0) {
                // Display staff data in a table with delete button
                echo '<table class="staff-table">
                        <tr>
                            <th>Email</th>
                            <th>Password</th>
                            <th>User Type</th>
                            <th>Action</th>
                        </tr>';

                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>
                            <td>' . $row["email"] . '</td>
                            <td>' . $row["password"] . '</td>
                            <td>' . $row["user_type"] . '</td>
                            <td>
                                <form method="post" action="">
                                    <input type="hidden" name="deleteEmail" value="' . $row["email"] . '">
                                    <button type="submit" class="delete-btn" name="delete">Delete</button>
                                </form>
                            </td>
                        </tr>';
                }

                echo '</table>';
            } else {
                echo "No staff data found.";
            }
        }

        // Close the database connection
        $conn->close();
        ?>

        <!-- Add any additional content or links as needed -->

    </div>

</body>

</html>
