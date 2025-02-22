<?php
    require_once 'php/basic.php';
    reqAdmin();
    require_once 'php/dbconnect.php'; // This file should contain functions to interact with the database.
    
    // Function to delete a food item
    function deleteFood($food_id) {
        global $conn;
        
        // SQL query to delete the food item
        $query = "DELETE FROM Foods WHERE food_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $food_id);
        $stmt->execute();
        
        // Check if deletion was successful
        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    // Check if delete request is received
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete']) && isset($_POST['food_id'])) {
        $food_id = $_POST['food_id'];
        
        // Delete the food item
        if (deleteFood($food_id)) {
            // Redirect to refresh the page after deletion
            header("Location: manage_food.php");
            exit;
        } else {
            echo "Error: Unable to delete food item.";
        }
    }
    
    // Function to fetch all food items
    function getFoods() {
        global $conn;
        
        // SQL query to select all food items
        $query = "SELECT * FROM Foods";
        
        // Execute the query
        $result = $conn->query($query);
        
        // Check if the query was successful
        if ($result) {
            // Fetch all rows from the result set as an associative array
            $foods = $result->fetch_all(MYSQLI_ASSOC);
            return $foods;
        } else {
            // Return an empty array if query fails
            return array();
        }
    }

    // Get the current page filename from the URL
    $currentPage = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Food</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/panel.css">
    <link rel="stylesheet" href="css/nav.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
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
            font-size: 16px;
            font-weight: 500;
            padding: 15px 20px;
            color: #495057; /* Text color */
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
        .navbar {
             margin-bottom: 3px;
        }

        /* White Theme for Buttons */
        .btn-edit,
        .btn-delete {
            background-color: #fff; /* White background */
            color: #000; /* Black text */
            font-weight: bold;
            border: 1px solid #000; /* Black border */
            width: 80px;
        }

        /* Hover Effects */
        .btn-edit:hover,
        .btn-delete:hover {
            background-color: #f0f0f0; /* Light grey background */
            color: #000; /* Keep text black */
            border-color: #ccc; /* Light gray border on hover */
        }

        /* Table Styling */
        .table {
            border-collapse: separate;
            border-spacing: 0 10px; /* Adds space between rows */
        }

        .table th, .table td {
            padding: 15px 20px; /* Adds padding to cells for better spacing */
            text-align: center;
        }

        /* Table Row Hover Effect */
        .table tbody tr:hover {
            background-color: #f8f9fa; /* Light background on hover */
        }

        /* Zebra Striping for Rows */
        .table tbody tr:nth-child(odd) {
            background-color: #f9f9f9; /* Light gray for odd rows */
        }

        .table tbody tr:nth-child(even) {
            background-color: #fff; /* White for even rows */
        }

        /* Spacing Between Buttons */
        .btn-sm {
            margin-right: 10px;
        }

        /* Main Content Styling */
        main {
            background-color: #ffffff; /* White background for main content */
            padding: 20px; /* Padding for content */
            border-radius: 5px; /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow effect */
            font-size: 16px; /* Font size from first code */
        }

        main h1 {
            font-size: 30px; /* Slightly larger font size for headings */
            margin-bottom: 20px; /* Space below the heading */
            color: #343a40; /* Dark text color for the heading */
            border-bottom: 1px solid #ddd; /* Thinner grey line under the heading */
            padding-bottom: 15px; /* Added 5px more space between the line and the heading */
        }
    </style>
</head>
<body>
    <!-- Navbar Section -->
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

            <!-- Main content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <h1 class="mb-4">Manage Food</h1>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Details</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // Fetch food items from the database
                                    $foods = getFoods();

                                    foreach ($foods as $food) {
                                        echo '<tr>';
                                        echo '<td>' . $food['food_id'] . '</td>';
                                        echo '<td>' . $food['name'] . '</td>';
                                        echo '<td>' . $food['description'] . '</td>';
                                        echo '<td><img src="images/' . $food['image_name'] . '" style="max-width: 100px;" alt="' . $food['name'] . '"></td>';
                                        echo '<td>' . $food['price'] . '</td>';
                                        echo '<td>' . $food['details'] . '</td>';
                                        echo '<td>';
                                        // Edit button with white theme
                                        echo '<a href="edit_food.php?id=' . $food['food_id'] . '" class="btn btn-edit btn-sm"><i class="bi bi-pencil"></i> Edit</a> ';
                                        // Delete button with white theme
                                        echo '<form method="POST" onsubmit="return confirm(\'Are you sure you want to delete this food item?\')" style="display:inline;">';
                                        echo '<input type="hidden" name="food_id" value="' . $food['food_id'] . '">';
                                        echo '<button type="submit" class="btn btn-delete btn-sm"><i class="bi bi-trash"></i> Delete</button>';
                                        echo '</form>';
                                        echo '</td>';
                                        echo '</tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

