<?php
    // Include the basic PHP functions and check if the user is logged in
    require_once 'php/basic.php';
    noLogined(); // Redirects to login if the user is not logged in
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags to define character encoding and set responsive design -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    
    <!-- Favicon for the page -->
    <link rel="icon" href="./img/icon.jpeg" type="image/x-icon">
    
    <!-- External CSS files for styling -->
    <link href="./css/bg.css" rel="stylesheet">  <!-- Background CSS -->
    <link href="./css/tools.css" rel="stylesheet">  <!-- Tools CSS -->
    
    <!-- Bootstrap CSS for responsive layout and components -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        .password-container {
            position: relative;
            width: 100%;
        }
        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(0%);
            cursor: pointer;
            background: none;
            border: none;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
        }
        .toggle-password img {
            width: 24px;
            height: 24px;
            pointer-events: none;
        }
        .form-outline {
            position: relative;
        }
        .form-control {
            padding-right: 50px;
            height: 50px;
        }
    </style>
</head>
<body>

    <!-- Full viewport height section to center the content vertically -->
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <!-- Login card -->
                <div class="col-8 col-lg-6 col-xl-5">
                    <!-- Card with rounded corners and shadow -->
                    <div class="card shadow-2-strong card-registration" id="trans" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <!-- Title of the login form -->
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Login</h3>
                            
                            <!-- Login form -->
                            <form action="./php/login.php" method="post">
                                
                                <!-- Email input field -->
                                <div class="row">
                                    <div class="col-md-12 mb-4 pb-2">
                                        <div class="form-outline">
                                            <label class="form-label" for="emailAddress">Email</label>
                                            <input type="email" id="emailAddress" name="email" class="form-control form-control-lg" required />
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Password input field with toggle visibility -->
                                <div class="row">
                                    <div class="col-md-12 mb-4 pb-2">
                                        <div class="form-outline password-container">
                                            <label class="form-label" for="password">Password</label>
                                            <input type="password" id="password" name="password" class="form-control form-control-lg" required />
                                            <button type="button" class="toggle-password" onclick="togglePassword()">
                                                <img id="eye-icon" src="./img/eye.png" alt="Show/Hide">
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Link to sign up page -->
                                <div class="row">
                                    <a href="signup.php">Sign up?</a>
                                </div>

                                <!-- Submit button for login -->
                                <div class="mt-4 pt-2">
                                    <input class="btn btn-primary btn-lg" type="submit" value="Login" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS for components like dropdowns, modals, etc. -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePassword() {
            var passwordField = document.getElementById("password");
            var eyeIcon = document.getElementById("eye-icon");
            
            if (passwordField.type === "password") {
                passwordField.type = "text";
                eyeIcon.src = "./img/hide.png"; // Change icon to hide
            } else {
                passwordField.type = "password";
                eyeIcon.src = "./img/eye.png"; // Change icon to show
            }
        }
    </script>
</body>
</html>
