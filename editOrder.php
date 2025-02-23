<?php 
    // Include required basic file and check if the user is an admin
    require_once 'php/basic.php';
    reqAdmin(); // Function to ensure the user has admin privileges
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel</title>
    <link rel="icon" href="./img/icon.jpeg" type="image/x-icon">
    <link href="./css/nav.css" rel="stylesheet"> <!-- Link to custom navigation CSS -->
    <link href="./css/panel.css" rel="stylesheet"> <!-- Link to custom panel CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"> <!-- Bootstrap Icons -->
    <style>
        /* Custom dropdown styles */
        select.form-control {
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        /* Hover effect for the dropdown */
        select.form-control:hover {
            background-color: #f1f1f1; /* Light gray background when hovered */
        }

        /* Hover effect for the options inside the dropdown */
        select.form-control option:hover {
            background-color: #007bff; /* Blue background on hover */
            color: white; /* Change text color to white */
        }
    </style>
</head>
<body>
    <!-- Navbar Section starts -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="./img/icon1.jpg" alt="icon" id="icon"></a>
            <!-- Navbar toggler for mobile view -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar items -->
            <div class="collapse navbar-collapse" id="navbarText">
                <div class="navbar-nav me-auto mb-2 mb-lg-0">
                    <a class="nav-link" href="./index.php">Home</a>
                    <a class="nav-link" href="./search.php">Foods</a>
                    <a class="nav-link" href="./myOrders.php">My Orders</a>
                    <?php if($admin){ // Check if the user is an admin
                        echo '<a class="nav-link active" href="./panel.php">Panel</a>';
                    }?>
                    <a class="nav-link" href="./help.php">Help</a>
                    <a class="nav-link" href="./faq.php">FAQ</a>
                    <a class="nav-link" href="./aboutus.php">About Us</a>
                </div>
                <!-- Conditional login/logout link based on user session -->
                <span class="navbar-text">
                    <?php if($logined){
                        echo '<a href="./logout.php">Logout</a>';
                    }else{
                        echo '<a href="./login.php">Login</a>';
                    }
                    ?>
                </span>
            </div>
        </div>
    </nav>
    <!-- Navbar Section ends -->
    <style>
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
    </style>

    <header>
        <!-- Placeholder for the header section -->
    </header>

    <main>
        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar Navigation -->
                <div class="col-md-3 col-lg-2 d-md-block bg-light sidebar" style="height: 100vh; position: sticky; top: 0; border-right: 1px solid #ddd;">
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

                <!-- Main Content Section -->
                <main class="container col-md-9 ml-sm-auto col-lg-10 px-4">
                    <?php
                        // Check if there's an 'id' parameter in the URL for order editing
                        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
                            $id = (int)$_GET["id"]; // Get the order id
                            require_once 'php/dbconnect.php'; // Database connection

                            // Fetch order details from the database
                            $sql = "SELECT user_id, food_id, quantity, cost, status FROM Orders WHERE order_id=$id";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                // Assign order details to variables
                                $user_id = $row["user_id"];
                                $food_id = $row["food_id"];
                                $quantity = $row["quantity"];
                                $cost = $row["cost"];
                                $status = $row["status"];
                            }

                            // Fetch users for the select dropdown
                            $users = [];
                            $usersQuery = "SELECT user_id, name FROM Users";
                            $usersResult = $conn->query($usersQuery);
                            if ($usersResult && $usersResult->num_rows > 0) {
                                while ($row = $usersResult->fetch_assoc()) {
                                    $users[] = $row; // Store user data in an array
                                }
                            }

                            // Fetch foods for the select dropdown
                            $foods = [];
                            $foodsQuery = "SELECT food_id, name FROM Foods";
                            $foodsResult = $conn->query($foodsQuery);
                            if ($foodsResult && $foodsResult->num_rows > 0) {
                                while ($row = $foodsResult->fetch_assoc()) {
                                    $foods[] = $row; // Store food data in an array
                                }
                            }
                        } else {
                            // If 'id' is not provided in the URL, show an error message
                            echo "Require id";
                        }
                    ?>
                    <!-- Form for editing order details -->
                    <div class="card">
                        <div class="card-body row">
                            <form action="./php/editOrder.php" method="post">
                                <input type="hidden" name="order_id" value="<?php echo $id; ?>"> <!-- Hidden input to pass order id -->
                                 
                                <!-- User selection dropdown -->
                                <div class="form-group">
                                    <label for="user_id">User:</label>
                                    <select class="form-control" id="user_id" name="user_id">
                                        <?php foreach ($users as $user): ?>
                                            <option value="<?php echo $user['user_id']; ?>" <?php echo ($user['user_id'] == $user_id) ? 'selected' : ''; ?>>
                                                <?php echo $user['name']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <!-- Food selection dropdown -->
                                <div class="form-group">
                                    <label for="food_id">Food:</label>
                                    <select class="form-control" id="food_id" name="food_id">
                                        <?php foreach ($foods as $food): ?>
                                            <option value="<?php echo $food['food_id']; ?>" <?php echo ($food['food_id'] == $food_id) ? 'selected' : ''; ?>>
                                                <?php echo $food['name']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <!-- Quantity input field -->
                                <div class="form-group">
                                    <label for="quantity">Quantity:</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo $quantity; ?>">
                                </div>

                                <!-- Cost input field -->
                                <div class="form-group">
                                    <label for="cost">Cost:</label>
                                    <input type="number" class="form-control" id="cost" name="cost" value="<?php echo $cost; ?>">
                                </div>

                                <!-- Status dropdown field -->
                                <div class="form-group">
                                    <label for="status">Status:</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="1" <?php echo ($status == 1) ? 'selected' : ''; ?>>Pending</option>
                                        <option value="2" <?php echo ($status == 2) ? 'selected' : ''; ?>>Cooking</option>
                                        <option value="3" <?php echo ($status == 3) ? 'selected' : ''; ?>>Served</option>
                                    </select>
                                </div>

                                <!-- Submit button to save changes -->
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>

                </main>
            </div>
        </div>
    </main>

    

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
