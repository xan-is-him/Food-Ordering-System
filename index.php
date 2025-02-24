<?php 
	require_once 'php/basic.php';
	reqLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Food Ordering System</title>
	<link rel="icon" href="./img/icon.jpeg" type="image/x-icon">
	<link href="./css/nav.css" rel="stylesheet">
	<link href="./css/index.css" rel="stylesheet">
	<link href="./css/tools.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

	<style>
		/* Loader styles */
		#loader {
			position: fixed;
			width: 100%;
			height: 100%;
			top: 0;
			left: 0;
			background-color: #fff;
			display: flex;
			justify-content: center;
			align-items: center;
			z-index: 9999;
		}

		.spinner-border {
			width: 3rem;
			height: 3rem;
		}

		/* Adjusted image sizes for a cleaner look */
		.card img {
			width: 100%;
			height: 150px;
			object-fit: cover;
			border-radius: 10px;
			display: block;
			margin: auto;
		}

		/* Featured categories image size */
		.row a img {
			max-width: 70%;
			height: auto;
			display: block;
			margin: auto;
		}

		/* Reduce padding for categories */
		.row a {
			padding: 2rem 1rem;
			text-align: center;
		}

		/* Align text content to the left */
		.card-body .col-md-7 {
			display: flex;
			flex-direction: column;
			justify-content: center;
			text-align: left;
		}

		/* Make "Order Now" button smaller */
		.card-body .btn {
			padding: 8px 15px;
			font-size: 14px;
			width: 110px;
		}

		/* Add spacing between dishes */
		.food-card {
			margin-bottom: 35px;
		}
	</style>
</head>
<body>

<!-- Loader Section -->
<div id="loader">
	<div class="spinner-border text-primary" role="status">
		<span class="visually-hidden">Loading...</span>
	</div>
</div>

<!-- Navbar Section -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="container-fluid">
		<a class="navbar-brand" href="./index.php"><img src="./img/icon1.jpg" alt="icon" id="icon"></a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarText">
			<div class="navbar-nav me-auto mb-2 mb-lg-0">
				<a class="nav-link active" href="./index.php">Home</a>
				<a class="nav-link" href="./search.php">Foods</a>
				<a class="nav-link" href="./myOrders.php">My Orders</a>
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
				}?>
			</span>
		</div>
	</div>
</nav>
<!-- Navbar Section ends -->

<!-- Food search Section -->
<form class="d-flex justify-content-center align-items-center" action="./search.php" method="get" id="header">
	<div class="col-md-7 p-2">
		<input type="text" class="form-control form-control-lg" name="q" style="height: 45px;" placeholder="Search for food ...." />
	</div>
	<div class="col-md-2 p-2">
		<button class="btn btn-success btn-lg" type="submit" style="height: 45px;">Search</button>
	</div>
</form>

<!-- Featured Foods Section -->
<header class="text-center p-4">
	<h3>Featured Foods</h3>
	<div class="container-fluid">
		<div class="row">
			<a class="col-md-4 col-sm-12 text-center no-ul" href="./search.php?q=pizza">
				<img src="images/pizza.jpg" alt="pizza" class="img-fluid rounded">
				<h3 class="text-overlay">Pizza</h3>
			</a>
			<a class="col-md-4 col-sm-12 text-center no-ul" href="./search.php?q=burger">
				<img src="images/burger.webp" alt="burger" class="img-fluid rounded">
				<h3 class="text-overlay">Burger</h3>
			</a>
			<a class="col-md-4 col-sm-12 text-center no-ul" href="./search.php?q=pasta">
				<img src="images/pasta.webp" alt="pasta" class="img-fluid rounded">
				<h3 class="text-overlay">Pasta</h3>
			</a>
		</div>
	</div>
</header>

<!-- Food Menu Section -->
<main class="container">
		<div class="row">
			<?php
			require_once 'php/dbconnect.php';
			
			$q = $_GET['q'] ?? "";
			$q = "%$q%";
			$sql = "SELECT food_id, name, description, image_name, price, details FROM Foods WHERE name LIKE ?";
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("s", $q);
			$stmt->execute();
			$result = $stmt->get_result();
			while ($row = $result->fetch_assoc()) {
				$id=$row["food_id"];
				$name=$row["name"];
				$description=$row["description"];
				$image_name=$row["image_name"];
				$price=$row["price"];
				?>
					<div class="col-md-6 col-sm-12 food-card">
						<div class="card">
							<div class="card-body row">
								<div class="col-lg-4 col-md-12">
									<img src="images/<?php echo $image_name;?>" alt="<?php echo $name; ?>" class="img-fluid"/>
								</div>
								<div class="col-md-7">
									<h4><?php echo $name;?></h4>
									<p class="food-price"><?php echo $price;?></p>
									<p class="food-detail"><?php echo $description;?></p>
									<a href="./order.php?id=<?php echo $id;?>" class="btn btn-primary">Order Now</a>
								</div>
							</div>
						</div>
					</div>
					<?php
			}
			?>
		</div>
	</main>
<footer class="bg-light py-4 mt-5">
	<div class="container text-center">
		<p class="mb-1">&copy; <?php echo date("Y"); ?> Food Ordering System. All rights reserved.</p>
		<p>Designed & Developed by <a href="#">Sujit Lama & Srijan Bagdas</a></p>
		<div class="d-flex justify-content-center gap-3 mt-2">
			<a href="#"><img src="./img/facebook.png" alt="Facebook" width="30"></a>
			<a href="#"><img src="./img/twitter.png" alt="Twitter" width="30"></a>
			<a href="#"><img src="./img/instagram.png" alt="Instagram" width="30"></a>
			
		</div>
	</div>
</footer>
<script>
	window.addEventListener('load', () => {
		document.getElementById('loader').style.display = 'none';
	});
</script>

</body>
</html>
