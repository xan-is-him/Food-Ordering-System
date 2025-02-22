<?php 
	require_once 'php/basic.php';
	reqAdmin();
  require_once 'php/stats.php'; // To handle $currentPage and other stats if necessary.

  // Get the current page filename from the URL
  $currentPage = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Panel</title>
		<link rel="icon" href="./img/icon.jpeg" type="image/x-icon">
		<link href="./css/nav.css" rel="stylesheet">
		<link href="./css/panel.css" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
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
</head>
<body>
	<!-- Navbar Section starts -->
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
          <?php if($admin){
            echo '<a class="nav-link active" href="./panel.php">Panel</a>';
          }?>
          <a class="nav-link" href="#">Help</a>
          <a class="nav-link" href="#">FAQ</a>
          <a class="nav-link" href="./aboutus.php">About Us</a>
        </div>
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
	<!-- Navbar Section ends-->

<main>
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
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Orders</h1>
        </div>

        <div class="row">
				<?php
					require_once 'php/dbconnect.php';

					$sql = "SELECT o.order_id, o.quantity, o.cost, o.status, u.name AS user_name, f.name AS food_name 
							FROM Orders o
							INNER JOIN Users u ON o.user_id = u.user_id
							INNER JOIN Foods f ON o.food_id = f.food_id";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						echo '<table class="table table-striped">';
						echo '<thead>';
						echo '<th>order ID</th>';
						echo '<th>User Name</th>';
						echo '<th>Food Name</th>';
						echo '<th>Quantity</th>';
						echo '<th>Cost</th>';
						echo '<th>Status</th>';
						echo '</thead>';
						while ($row = $result->fetch_assoc()) {
							echo '<tr>';
							echo '<td>'.$row["order_id"].'</td>';
							echo '<td>'.$row["user_name"].'</td>';
							echo '<td>'.$row["food_name"].'</td>';
							echo '<td>'.$row["quantity"].'</td>';
							echo '<td>'.$row["cost"].'</td>';
							echo '<td>'.$row["status"].'</td>';
							if ($admin) {
								echo '<td> <a href="./editOrder.php?id='.$row["order_id"].'"><button class="btn btn-primary">Edit</button>';
								echo '<a href="./removeOrder.php?id='.$row["order_id"].'"><button class="btn btn-danger">Remove</button></td>';
							}
							echo '</tr>';
						}
						echo '<table>';
					} else {
						echo "No Orders";
					}
				?>
        </div>
      </main>
    </div>
  </div>
</main>
				
<footer>

</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
