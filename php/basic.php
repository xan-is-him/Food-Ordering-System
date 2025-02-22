<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start session management
session_start();

// Initialize login and admin status
$logined = false;
$admin = false;

// Check if a user is logged in by verifying the session
if (isset($_SESSION['name'])) {
    $logined = true;
    // Check if the logged-in user is an admin
    if ($_SESSION['name'] === "admin") {
        $admin = true;
    }
}

/**
 * Function to send a message and redirect to a specific location.
 * Requires an external 'msg.php' file to handle the message.
 *
 * @param string $msg - The message to be displayed.
 * @param string $location - The URL to redirect the user.
 */
function sendMessage($msg, $location) {
    require 'msg.php'; // Ensure 'msg.php' exists and is properly implemented
}

/**
 * Function to ensure a user is not logged in.
 * Redirects to the index page if the user is already logged in.
 */
function noLogined() {
    global $logined;
    if ($logined) {
        sendMessage("Already Logined!!", "./index.php");
        exit();
    }
}

/**
 * Function to ensure a user is not logged in.
 * Redirects to the parent directory's index page if the user is already logged in.
 */
function noLogined1() {
    global $logined;
    if ($logined) {
        sendMessage("Already Logined!!", "../index.php");
        exit();
    }
}

/**
 * Function to enforce login requirement.
 * Redirects to the login page if the user is not logged in.
 */
function reqLogin() {
    global $logined;
    if (!$logined) {
        sendMessage("Require Logined!!", "./login.php");
        exit();
    }
}

/**
 * Function to enforce admin privilege requirement.
 * Redirects to the index page if the user is not an admin.
 */
function reqAdmin() {
    global $admin;
    if (!$admin) {
        sendMessage("Admin Only!!", "./index.php");
        exit();
    }
}
?>
