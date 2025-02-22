<?php 
  require_once 'php/basic.php';
  reqAdmin();
  require_once 'php/stats.php';

  // Get the current page filename from the URL
  $currentPage = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="icon" href="./img/icon.jpeg" type="image/x-icon">
    <link href="./css/nav.css" rel="stylesheet">
    <link href="./css/panel.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* General Reset for Margin and Padding */
        body {
            margin: 0; /* Remove margin for the body */
            padding: 0; /* Remove padding for the body */
            padding-left: 12px; /* Add 12px padding to the left */
            padding-right: 12px; /* Add 12px padding to the right */
        }

        /* Sidebar Styling */
        .sidebar {
            background-color: #f8f9fa; /* Light background for the sidebar */
            border-right: 1px solid #ddd; /* Subtle border */
            height: 100vh; /* Full height of the viewport */
            position: sticky;
            top: 0;
            padding-top: 0; /* Ensure no padding at the top of the sidebar */
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

        /* Adjust Flex Container */
        .container-fluid {
            padding-top: 0; /* Remove padding at the top */
            padding-left: 0; /* Remove left padding */
            padding-right: 0; /* Remove right padding */
        }

        /* Remove margins and padding for rows */
        .row {
            margin-top: 0; /* Remove top margin for rows */
            padding-top: 0; /* Remove top padding for rows */
        }

        /* Main Content Section */
        .main-content {
            padding-top: 0; /* Remove top padding from main content */
        }
    </style>
</head>
<body>  
    <!-- Navbar Section -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="./index.php"><img src="./img/icon1.jpg" alt="icon" id="icon"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <div class="navbar-nav me-auto mb-2 mb-lg-0">
                    <a class="nav-link" href="./index.php">Home</a>
                    <a class="nav-link" href="./search.php">Foods</a>
                    <a class="nav-link" href="./myOrders.php">My Orders</a>
                    <?php if($admin) { echo '<a class="nav-link active" href="./panel.php">Panel</a>'; }?>
                    <a class="nav-link" href="./help.php">Help</a>
                    <a class="nav-link" href="./faq.php">FAQ</a>
                    <a class="nav-link" href="./aboutus.php">About Us</a>
                </div>
                <span class="navbar-text">
                    <?php if($logined) {
                        echo '<a href="./logout.php">Logout</a>';
                    } else {
                        echo '<a href="./login.php">Login</a>';
                    }?>
                </span>
            </div>
        </div>
    </nav>

    <!-- Main Content Section -->
    <div class="container-fluid main-content">
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

            <!-- Dashboard Content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                </div>

                <!-- Stats Cards -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card shadow-lg border-light rounded">
                            <div class="card-body">
                                <h5 class="card-title text-center">Number of Users</h5>
                                <p class="card-text text-center fs-3"><?php echo $userCount; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card shadow-lg border-light rounded">
                            <div class="card-body">
                                <h5 class="card-title text-center">Number of Orders</h5>
                                <p class="card-text text-center fs-3"><?php echo $orderCount; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center mt-5 py-3 bg-light">
        <p class="mb-0">© <?php echo date("Y"); ?> Your Company Name. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
