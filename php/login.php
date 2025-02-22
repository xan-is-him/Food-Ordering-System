<?php
// Include basic.php for common functions
require_once 'basic.php';

// Ensure that the user is not already logged in
noLogined1();

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input from the POST request
    $email = $_POST['email'];       // Email provided by the user
    $password = $_POST['password']; // Password provided by the user

    // Check if the input matches admin credentials
    if ($email == "admin@gmail.com" && $password == "admin") {
        // Set the session as logged in as admin
        $_SESSION['name'] = "admin";
        // Redirect the admin to the index page
        header("Location: ../index.php");
        exit();
    }

    // Include the database connection file
    require_once 'dbconnect.php';

    // Prepare an SQL statement to fetch user details based on the provided email
    $stmt = $conn->prepare("SELECT user_id, name, password FROM Users WHERE email = ?");
    $stmt->bind_param("s", $email); // Bind the email to the SQL statement
    $stmt->execute();               // Execute the query
    $result = $stmt->get_result();  // Get the result of the query

    // Check if exactly one user is found
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc(); // Fetch the user's details
        // Verify the provided password against the hashed password in the database
        if (password_verify($password, $row["password"])) {
            // Store user details in the session
            $_SESSION['name'] = $row['name'];
            $_SESSION['user_id'] = $row['user_id'];
            // Send a success message and redirect to the index page
            sendMessage("Login Successful!", "../index.php");
            exit();
        }
        // If the password is incorrect, send an error message and redirect to the login page
        sendMessage("Incorrect Password", "../login.php");
        exit();
    } else {
        // If no user is found or multiple users are found, send an error message
        sendMessage("Failed to login", "../login.php");
        exit();
    }
} else {
    // If the request method is not POST, send an error message and redirect to the login page
    sendMessage("Only POST method allowed", "../login.php");
    exit();
}
?>
