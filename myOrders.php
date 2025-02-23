<?php 
	require_once 'php/basic.php';
	reqLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>My Orders</title>
	<link rel="icon" href="./img/icon.jpeg" type="image/x-icon">
	<link href="./css/nav.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<!-- Navbar Section starts -->
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
					<a class="nav-link active" href="./myOrders.php">My Orders</a>
					<?php if($admin){
						echo '<a class="nav-link" href="./panel.php">Panel</a>';
					}?>
					<a class="nav-link" href="./help.php">Help</a>
					<a class="nav-link" href="./faq.php">FAQ</a>
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

	<header>
	</header>

	<main>
		<div class="container">
			<h1>My Orders</h1>
			<?php
			require_once 'php/dbconnect.php';

			// Check if user ID is set in the session
			if(isset($_SESSION['user_id'])) {
				$user_id = $_SESSION['user_id'];

				// Prepare and bind
				$sql = "SELECT o.order_id, o.quantity, o.cost, o.status, o.Payment, u.name AS user_name, f.name AS food_name 
								FROM Orders o
								INNER JOIN Users u ON o.user_id = u.user_id
								INNER JOIN Foods f ON o.food_id = f.food_id
								WHERE u.user_id = ?";
				$stmt = $conn->prepare($sql);

				if ($stmt === false) {
					echo "Error in preparing the query: " . $conn->error;
				} else {
					$stmt->bind_param("i", $user_id);
					$stmt->execute();
					$result = $stmt->get_result();

					if ($result) {
						if ($result->num_rows > 0) {
							echo '<table class="table table-striped">';
							echo '<thead>';
							echo '<th>Order ID</th>';
							echo '<th>User Name</th>';
							echo '<th>Food Name</th>';
							echo '<th>Quantity</th>';
							echo '<th>Cost</th>';
							echo '<th>Status</th>';
							echo '<th>Action</th>';
							echo '</thead>';

							while ($row = $result->fetch_assoc()) {
								echo '<tr>';
								echo '<td>' . $row["order_id"] . '</td>';
								echo '<td>' . $row["user_name"] . '</td>';
								echo '<td>' . $row["food_name"] . '</td>';
								echo '<td>' . $row["quantity"] . '</td>';
								echo '<td>' . $row["cost"] . '</td>';
								echo '<td>' . $row["status"] . '</td>';
								echo '<td>';
								echo '<a href="./cancelOrder.php?id=' . $row["order_id"] . '" class="btn btn-danger">Cancel</a>';
								// Removed the "Pay" button section
								echo '</td>';
								echo '</tr>';
							}
							echo '</table>';
						} else {
							echo "No orders for this user";
						}
					} else {
						echo "Error fetching result: " . $conn->error;
					}
					$stmt->close();
				}
			} else {
				echo "User not logged in";
			}
			?>
		</div>
	</main>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
