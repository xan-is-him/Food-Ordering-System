<?php
// Include basic.php for common functions
require_once 'basic.php';

// Ensure the user is logged in before allowing access to this functionality
reqLogin();

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the POST request
    $user_id = $_SESSION['user_id']; // Get the logged-in user's ID from the session
    $id = (int)$_POST['id'];         // Get the food ID from the POST request and cast it to an integer
    $quantity = (int)$_POST['quantity']; // Get the quantity of food and cast it to an integer
    $cost = (double)$_POST['cost'];      // Get the total cost and cast it to a double
    $status = "Pending";             // Set the default status of the order to "Pending"

    // Include the database connection file
    require_once 'dbconnect.php';

    // Prepare an SQL statement to insert the order into the database
    $stmt = $conn->prepare("INSERT INTO Orders (user_id, food_id, quantity, cost, status) VALUES (?, ?, ?, ?, ?)");
    // Bind the parameters to the prepared statement
    // 'iiids' specifies the data types: integer, integer, integer, double, string
    $stmt->bind_param("iiids", $user_id, $id, $quantity, $cost, $status);

    // Execute the statement and check if it was successful
    if ($stmt->execute() === TRUE) {
        // If successful, send a success message and redirect to the "My Orders" page
        sendMessage("Order Successful", "../myOrders.php");
        exit();
    } else {
        // If the execution fails, send an error message with the specific database error
        sendMessage("Failed to order food: " . mysqli_error($conn), "../myOrders.php");
        exit();
    }
} else {
    // If the request method is not POST, send an error message and redirect
    sendMessage("Only POST method allowed", "../myOrders.php");
    exit();
}
?>
