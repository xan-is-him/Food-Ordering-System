<?php
// Including basic utility functions and ensuring the user is an admin
require_once 'php/basic.php';
reqAdmin();

// Checking if the request method is GET and if 'id' parameter is passed
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    // Retrieving the order ID from the query parameter
    $id = $_GET['id'];

    // Including database connection
    require_once 'php/dbconnect.php';

    // Preparing the DELETE SQL statement to remove the order with the given order_id
    $stmt = $conn->prepare("DELETE FROM Orders WHERE order_id = ?");
    $stmt->bind_param("i", $id); // Binding the parameter as an integer

    // Executing the DELETE query
    if ($stmt->execute()) {
        // If the order is deleted successfully, show success message and redirect
        sendMessage("Deleted Order!!", "./orders.php");
        exit();
    } else {
        // If the deletion fails, show error message and redirect
        sendMessage("Failed to Delete Order!!", "./orders.php");
        exit();
    }
} else {
    // If method is not GET or 'id' parameter is missing, show an error message
    sendMessage("Only GET method and require id", "./orders.php");
    exit();
}
?>
