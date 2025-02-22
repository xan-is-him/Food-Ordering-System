<?php
    // Including necessary files for basic functions and database connection
    require_once 'php/basic.php'; // Includes basic.php file with required functions
    require_once 'php/dbconnect.php'; // Includes dbconnect.php file to handle database connection
    reqAdmin(); // Ensures the user is an admin before proceeding

    // Check if the form has been submitted via POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data from POST request
        $name = $_POST['name']; // Get the name of the food item
        $description = $_POST['description']; // Get the description of the food item
        $price = $_POST['price']; // Get the price of the food item
        $details = $_POST['details']; // Get additional details about the food item

        // Handle file upload
        $target_dir = "images/"; // Directory where the image will be stored
        $target_file = $target_dir . basename($_FILES["image"]["name"]); // Full path for the uploaded file
        $image_name = $_FILES["image"]["name"]; // Get the image file name

        // Check if the file already exists in the directory
        if (file_exists($target_file)) {
            echo "Sorry, file already exists."; // Error message if file already exists
            exit; // Stop further script execution
        }

        // Attempt to upload the file to the server
        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "Sorry, there was an error uploading your file."; // Error message if file upload fails
            exit; // Stop further script execution
        }

        // Insert the new food item into the database
        $query = "INSERT INTO Foods (name, description, image_name, price, details) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query); // Prepare the SQL query
        $stmt->bind_param("ssssd", $name, $description, $image_name, $price, $details); // Bind parameters for SQL query
        $stmt->execute(); // Execute the prepared query

        // Check if the food item was successfully added to the database
        if ($stmt->affected_rows > 0) {
            // Redirect to the manage_food.php page if the insertion was successful
            header("Location: manage_food.php");
            exit; // Stop further script execution
        } else {
            // Show an error message if the insertion failed
            echo "Error: Unable to add new food item.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Food</title>
    <!-- Include Bootstrap CSS for styling the page -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <!-- Include custom CSS for the panel and navigation styling -->
    <link rel="stylesheet" href="css/panel.css">
    <link rel="stylesheet" href="css/nav.css">
    <!-- Include Bootstrap Icons for sidebar icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* General Reset for Margin and Padding */
        body {
            margin: 0; /* Remove margin for the body */
            padding: 0; /* Remove padding for the body */
            padding-top: 3px; /* Add 12px padding to the top */
        }

        /* Sidebar Styling */
        .sidebar {
            background-color: #f8f9fa; /* Light background for the sidebar */
            border-right: 1px solid #ddd; /* Subtle border */
            height: 100vh; /* Full height of the viewport */
            position: sticky;
            top: 0;
        }

        .sidebar .nav-link {
            font-size: 16px; /* Font size from first code */
            font-weight: 500;
            padding: 15px 20px;
            color: #495057; /* Text color */
        }
        .navbar {
          margin-bottom: 3px;
         }
        

        .sidebar .nav-link:hover {
            background-color: #007bff;
            color: white;
            border-radius: 5px;
        }
        
        .sidebar .nav-link.active {
            background-color: #007bff;
            color: white;
        }

        .sidebar i {
            margin-right: 10px; /* Space between icon and text */
        }

        /* Main Content Styling */
        main {
            background-color: #ffffff; /* White background for main content */
            padding: 20px; /* Padding for content */
            border-radius: 5px; /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow effect */
            font-size: 20px; /* Font size from first code */
        }

        main h1 {
            font-size: 30px; /* Slightly larger font size for headings */
            margin-bottom: 20px; /* Space below the heading */
            color: #343a40; /* Dark text color for the heading */
            border-bottom: 1px solid #ddd; /* Thinner grey line under the heading */
            padding-bottom: 15px; /* Added 5px more space between the line and the heading */
        }

        .form-label {
            font-size: 16px; /* Font size for labels */
        }

        .form-control {
            font-size: 16px; /* Font size for input fields */
        }

        /* Form Styling */
        .mb-3 {
            margin-bottom: 20px;
        }

        .btn-primary {
            font-size: 16px; /* Font size for buttons */
        }
    </style>
</head>
<body>
    <!-- Include the Navbar section -->
    <?php include 'navbar.php'; ?>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($currentPage == 'panel.php') ? 'active' : ''; ?>" href="./panel.php">
                                <i class="bi bi-house-door"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($currentPage == 'orders.php') ? 'active' : ''; ?>" href="./orders.php">
                                <i class="bi bi-basket"></i> Orders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($currentPage == 'charts.php') ? 'active' : ''; ?>" href="./charts.php">
                                <i class="bi bi-graph-up-arrow"></i> Charts
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($currentPage == 'add_food.php') ? 'active' : ''; ?>" href="./add_food.php">
                                <i class="bi bi-plus-circle"></i> Add Food
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($currentPage == 'manage_food.php') ? 'active' : ''; ?>" href="./manage_food.php">
                                <i class="bi bi-list-ul"></i> Manage Food
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main content section where the form is displayed -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <h1 class="mb-4">Add Food</h1>
                <!-- Form for adding a new food item -->
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                    <!-- Input field for food name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <!-- Input field for food description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <!-- File input for uploading food item image -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                    </div>
                    <!-- Input field for food price -->
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price" required>
                    </div>
                    <!-- Input field for additional food details -->
                    <div class="mb-3">
                        <label for="details" class="form-label">Details</label>
                        <textarea class="form-control" id="details" name="details" rows="5" required></textarea>
                    </div>
                    <!-- Submit button to add food item -->
                    <button type="submit" class="btn btn-primary">Add Food</button>
                </form>
            </main>
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="text-center mt-5 py-3 bg-light">
        <p class="mb-0">© <?php echo date("Y"); ?> Your Company Name. All rights reserved.</p>
    </footer>

    <!-- Include Bootstrap JS for interactivity -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
