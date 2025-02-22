<?php
// Database connection settings
$db_servername = "localhost"; // Server name or IP address for the database
$db_username = "root";        // Username for the database connection
$db_password = "";            // Password for the database connection
$db_database = "food";        // Name of the database to connect to

// Create a new connection to the database
$conn = new mysqli($db_servername, $db_username, $db_password, $db_database);

// Check if the connection was successful
if ($conn->connect_error) {
    // If connection fails, terminate the script and display an error message
    die("Connection failed: " . $conn->connect_error);
}

// Query to count the number of users in the Users table
$user_count_query = "SELECT COUNT(*) AS user_count FROM Users";
$user_count_result = $conn->query($user_count_query); // Execute the query
$userCount = 0; // Initialize user count to 0

if ($user_count_result->num_rows > 0) {
    // If the query returns a result, fetch the count
    $user_count_row = $user_count_result->fetch_assoc();
    $userCount = $user_count_row['user_count']; // Get the user count from the result
}

// Query to count the number of orders in the Orders table
$order_count_query = "SELECT COUNT(*) AS order_count FROM Orders";
$order_count_result = $conn->query($order_count_query); // Execute the query
$orderCount = 0; // Initialize order count to 0

if ($order_count_result->num_rows > 0) {
    // If the query returns a result, fetch the count
    $order_count_row = $order_count_result->fetch_assoc();
    $orderCount = $order_count_row['order_count']; // Get the order count from the result
}

// Close the database connection
$conn->close();
?>
