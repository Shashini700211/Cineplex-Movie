<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cineplex";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
