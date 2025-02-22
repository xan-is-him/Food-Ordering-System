<?php
require_once 'basic.php';
noLogined1();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    
    $errors = [];

    // Validate name
    if (empty($name)) {
        $errors[] = 'Name is required';
    } elseif (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
        $errors[] = 'Name should only contain alphabets and spaces';
    }

    // Validate phone
    if (empty($phone) || !preg_match('/^\d{10}$/', $phone)) {
        $errors[] = 'Valid phone number is required';
    }

    // Validate address
    if (empty($address)) {
        $errors[] = 'Address is required';
    }

    // Email validation
    if (empty($email)) {
        $errors[] = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Valid email format is required';
    } elseif (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) {
        // Optional: additional regular expression check for email structure
        $errors[] = 'Email structure is invalid';
    }

    // Validate password
    if (empty($password) || strlen($password) < 6) {
        $errors[] = 'Password must be at least 6 characters long';
    }

    if (empty($errors)) {
        require_once 'dbconnect.php';

        // Check for duplicate email
        $stmt = $conn->prepare("SELECT user_id FROM Users WHERE email = ?");
        if ($stmt) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();
            
            if ($stmt->num_rows > 0) {
                $errors[] = 'Email is already registered';
            }
            $stmt->close();
        } else {
            sendMessage("Database error: " . $conn->error, "../signup.php");
            exit();
        }
        
        if (empty($errors)) {
            $stmt = $conn->prepare("INSERT INTO Users (name, address, phone, email, password) VALUES (?, ?, ?, ?, ?)");
            if ($stmt) {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $stmt->bind_param("sssss", $name, $address, $phone, $email, $hashed_password);

                if ($stmt->execute()) {
                    sendMessage("Successfully Registered $name", "../login.php");
                    exit();
                } else {
                    sendMessage("Failed to register: " . $stmt->error, "../signup.php");
                    exit();
                }
                $stmt->close();
            } else {
                sendMessage("Database error: " . $conn->error, "../signup.php");
                exit();
            }
        } else {
            foreach ($errors as $error) {
                echo "<p class='text-danger'>$error</p>";
            }
            sendMessage("Please correct the errors and try again", "../signup.php");
            exit();
        }
    } else {
        foreach ($errors as $error) {
            echo "<p class='text-danger'>$error</p>";
        }
        sendMessage("Please correct the errors and try again", "../signup.php");
        exit();
    }
} else {
    sendMessage("Only POST method is allowed", "../signup.php");
    exit();
}
?>

        