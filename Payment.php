<?php
// Start session to access session variables
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Check if order ID is provided in the URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    // Redirect to myOrders page if order ID is not provided
    header("Location: myOrders.php");
    exit();
}

// Include basic.php for common functionalities
require_once 'php/basic.php';

// Include database connection
require_once 'php/dbconnect.php';

// Get order ID from URL parameter
$order_id = $_GET['id'];

// Update payment status in the database
$sql = "UPDATE Orders SET payment = 1 WHERE order_id = $order_id";

if ($conn->query($sql) === TRUE) {
    // Payment successfully updated
    // Redirect to myOrders page
		sendMessage("Order successfully paid","./myOrders.php");
    exit();
} else {
    // Error occurred while updating payment
    echo "Error updating payment: " . $conn->error;
}

// Close database connection
$conn->close();
?>
