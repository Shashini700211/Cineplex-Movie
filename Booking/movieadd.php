<?php
// Include the database connection
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $release_date = $_POST['release_date'];
    $duration = $_POST['duration'];

    // Insert data into the 'movies' table
    $sql = "INSERT INTO movies (title, genre, release_date, duration) 
            VALUES ('$title', '$genre', '$release_date', '$duration')";

    if ($conn->query($sql) === TRUE) {
        // Movie added successfully
        $message = "Movie added successfully!";
        echo '<script>
                alert("' . $message . '");
                window.location.href = "../login/Staff.html"; // Redirect to User Account!
              </script>';
    } else {
        // Error in adding movie
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // Handle the case where the form is not submitted properly
    echo "<p>Form submission error.</p>";
}
?>
