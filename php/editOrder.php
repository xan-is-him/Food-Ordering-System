<?php
// Include the basic.php file for common functions and admin check
require_once 'basic.php';

// Ensure only an admin can access this page
reqAdmin();

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize input data from the POST request
    $order_id = (int)$_POST['order_id'];  // The ID of the order to update
    $user_id = (int)$_POST['user_id'];    // The user ID associated with the order
    $food_id = (int)$_POST['food_id'];    // The food ID for the order
    $quantity = (int)$_POST['quantity'];  // The quantity of food in the order
    $cost = (double)$_POST['cost'];       // The total cost of the order
    $status = $_POST['status'];           // The status of the order (e.g., pending, completed)

    // Include the database connection file
    require_once 'dbconnect.php';

    // Prepare an SQL statement to update the order in the database
    $stmt = $conn->prepare("UPDATE Orders SET user_id=?, food_id=?, quantity=?, cost=?, status=? WHERE order_id=?");

    // Bind the input parameters to the prepared statement
    // 'iiidsi' specifies the data types: integer, integer, integer, double, string, integer
    $stmt->bind_param("iiidsi", $user_id, $food_id, $quantity, $cost, $status, $order_id);

    // Execute the prepared statement and check if it was successful
    if ($stmt->execute()) {
        // If successful, send a success message and redirect to the orders page
        sendMessage("Successfully updated Order", "../orders.php");
        exit();
    } else {
        // If the update fails, send a failure message and redirect to the orders page
        sendMessage("Failed to update Order", "../orders.php");
        exit();
    }
} else {
    // If the request method is not POST, send an error message and redirect
    sendMessage("Only POST method allowed", "../editOrder.php");
    exit();
}
?>
