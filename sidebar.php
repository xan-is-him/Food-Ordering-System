<?php
// Get the current page filename
$currentPage = basename($_SERVER['PHP_SELF']);
?>

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
