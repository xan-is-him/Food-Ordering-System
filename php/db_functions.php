<?php
// db_functions.php

// Include your database connection file or define your connection object here if not already included
// require_once 'connection.php';

// Function to retrieve all food items from the database
function getFoods() {
    global $db_connection; // Assuming $db_connection is your database connection object

    // SQL query to select all food items
    $query = "SELECT * FROM Foods";

    // Execute the query
    $result = $db_connection->query($query);

    // Check if the query was successful
    if ($result) {
        // Fetch all rows from the result set as an associative array
        $foods = $result->fetch_all(MYSQLI_ASSOC);
        return $foods;
    } else {
        // Return an empty array if query fails
        return array();
    }
}
?>
