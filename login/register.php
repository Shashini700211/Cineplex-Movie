<?php
// Include the database connection
include 'connection.php';

// Retrieve user input from the form
$user_type = $_POST['user_type'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// SQL query to insert data into the 'users' table
$sql = "INSERT INTO customer (user_type, username, email, password) VALUES ('$user_type', '$username', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    // Registration successful, display popup message
    echo '<script>
            alert("Registration successful!");
            window.location.href = "login.html"; // Redirect to login.html
          </script>';
} else {
    // Error in registration, display error message
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
