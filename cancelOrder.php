<?php
    // Including necessary files for basic functions and login validation
    require_once 'php/basic.php'; // Includes basic.php file with required functions
    reqLogin(); // Ensures the user is logged in before proceeding

    // Check if the request method is GET and if 'id' is set in the URL parameters
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
        $id = $_GET['id']; // Retrieve the order ID from the GET request
        $user_id = $_SESSION['user_id']; // Get the logged-in user's ID from the session

        // Include the database connection file
        require_once 'php/dbconnect.php';

        // Prepare SQL query to delete the order from the Orders table where the order_id and user_id match
        $stmt = $conn->prepare("DELETE FROM Orders WHERE order_id = ? AND user_id = ?");
        $stmt->bind_param("ii", $id, $user_id); // Bind the parameters (order_id and user_id) to the query

        // Execute the query and check if the order was successfully deleted
        if ($stmt->execute()) {
            // If successful, send a success message and redirect the user to the "myOrders" page
            sendMessage("Canceled Order!!", "./myOrders.php");
            exit(); // Stop further execution of the script
        } else {
            // If the query fails, send a failure message and redirect the user to the "myOrders" page
            sendMessage("Failed to Cancel Order!!", "./myOrders.php");
            exit(); // Stop further execution of the script
        }
    } else {
        // If the GET method is not used or 'id' is not set, show an error message
        sendMessage("Only GET method and require id", "./myOrders.php");
        exit(); // Stop further execution of the script
    }
?>
