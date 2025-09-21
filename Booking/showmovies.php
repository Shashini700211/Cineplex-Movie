<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="images/x-icon" href="../images/cineplex.png">
    <link rel="stylesheet" href="booknow.css">
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

        .delete-btn {
            background-color: #ff5050;
            color: #fff;
            padding: 8px 12px;
            border: none;
            cursor: pointer;
        }

        a {
            color: #4285f4;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
            display: inline-block;
        }

        a:hover {
            color: #2557a7;
        }
    </style>
    <title>All Movies </title>
</head>

<body>

    <div class="container1">
        <h1>All Movies</h1>
        <br><br>

        <?php
        // Include the database connection
        include 'connection.php';

        // Check if delete button is clicked
        if (isset($_POST['delete'])) {
            $deleteMovieId = $_POST['deleteMovieId'];

            // SQL query to delete movie record
            $deleteSql = "DELETE FROM movies WHERE movie_id = '$deleteMovieId'";
            if ($conn->query($deleteSql)) {
                echo '<p style="color: green;">Movie record deleted successfully!</p>';
            } else {
                echo '<p style="color: red;">Error deleting movie record: ' . $conn->error . '</p>';
            }
        }

        // Fetch all movie details from the database
        $sql = "SELECT * FROM movies"; // Assuming your table is named 'movies'
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Display movie details with delete button
            echo '<table>
                    <tr>
                        <th>Title</th>
                        <th>Genre</th>
                        <th>Release Date</th>
                        <th>Duration (minutes)</th>
                        <th>Action</th>
                    </tr>';

            while ($row = $result->fetch_assoc()) {
                echo '<tr>
                        <td>' . $row['title'] . '</td>
                        <td>' . $row['genre'] . '</td>
                        <td>' . $row['release_date'] . '</td>
                        <td>' . $row['duration'] . '</td>
                        <td>
                            <form method="post" action="">
                                <input type="hidden" name="deleteMovieId" value="' . $row['movie_id'] . '">
                                <button type="submit" class="delete-btn" name="delete">Delete</button>
                            </form>
                        </td>
                    </tr>';
            }

            echo '</table>';
        } else {
            // No movies found
            echo '<p>No movies available.</p>';
        }

        // Close the database connection
        $conn->close();
        ?>

        <br><br>

    </div>

</body>

</html>
