<?php
// Database connection settings
$db_servername = "localhost"; // Server name or IP address where the database is hosted
$db_username = "root";        // Username for the database connection
$db_password = "";            // Password for the database connection
$db_database = "food";        // Name of the database to connect to

// Create a new connection to the MySQL database
$conn = new mysqli($db_servername, $db_username, $db_password, $db_database);

// Check if the connection was successful
if ($conn->connect_error) {
    // If the connection fails, output the error message and terminate the script
    die("Connection failed: " . $conn->connect_error);
}

// If the connection is successful, the script continues executing
?>
