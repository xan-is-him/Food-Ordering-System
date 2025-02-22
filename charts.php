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
    <!-- Meta Information -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel</title>
    <link rel="icon" href="./img/icon.jpeg" type="image/x-icon">
    <link href="./css/nav.css" rel="stylesheet">
    <link href="./css/panel.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Sidebar Styling from Code 1 */
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
</head>
<body>

    <!-- Navbar Section -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="./img/icon1.jpg" alt="icon" id="icon"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <div class="navbar-nav me-auto mb-2 mb-lg-0">
                    <a class="nav-link" href="./index.php">Home</a>
                    <a class="nav-link" href="./search.php">Foods</a>
                    <a class="nav-link" href="./myOrders.php">My Orders</a>
                    <?php if ($admin): ?>
                        <a class="nav-link active" href="./panel.php">Panel</a>
                    <?php endif; ?>
                    <a class="nav-link" href="#">Help</a>
                    <a class="nav-link" href="#">FAQ</a>
                    <a class="nav-link" href="#">About Us</a>
                </div>
                <span class="navbar-text">
                    <?php echo $logined ? '<a href="./logout.php">Logout</a>' : '<a href="./login.php">Login</a>'; ?>
                </span>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 d-md-block sidebar">
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

            <!-- Main Content (Now Removed User and Orders Cards) -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Charts</h1>
                </div>

                <!-- Placeholder for Charts -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card shadow-lg border-light rounded">
                            <div class="card-body">
                                <h5 class="card-title text-center">Sales Chart</h5>
                                <!-- Add chart rendering here (e.g., using Chart.js) -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card shadow-lg border-light rounded">
                            <div class="card-body">
                                <h5 class="card-title text-center">Users Chart</h5>
                                <!-- Add chart rendering here (e.g., using Chart.js) -->
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
