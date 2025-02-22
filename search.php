<?php 
	require_once 'php/basic.php';
	reqLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Search Food</title>
		<link rel="icon" href="./img/icon.jpeg" type="image/x-icon">
		<link href="./css/nav.css" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
          <a class="nav-link active" href="./search.php">Foods</a>
          <a class="nav-link" href="./myOrders.php">My Orders</a>
          <?php if($admin){
            echo '<a class="nav-link" href="./panel.php">Panel</a>';
          }?>
          <a class="nav-link" href="#">Help</a>
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

<div class="container">
	<div class="row py-4">
		<form class="col-md-6 col-lg-4 mx-auto" action="./search.php" method="get">
			<div class="input-group mb-3">
				<input type="text" class="form-control" id="find-name" name="q" placeholder="Search by name" aria-label="Search by name" aria-describedby="button-search">
				<button class="btn btn-primary" type="submit" id="button-search">Search</button>
			</div>
		</form>
	</div>

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
					<div class="col-md-6 col-sm-12 mb-3">
						<div class="card">
							<div class="card-body row">
								<div class="col-lg-4 col-md-12">
									<img src="images/<?php echo $image_name;?>" alt="name gen icon" class="img-fluid"/>
								</div>
								<div class="col-md-7">
									<h4><?php echo $name;?></h4>
									<p class="food-price"><?php echo $price;?></p>
									<p class="food-detail"><?php echo $description;?></p><br>
									<a href="./order.php?id=<?php echo $id;?>" class="btn btn-primary"> order now</a>
								</div>
							</div>
						</div>
					</div>
					<?php
			}
			?>
		</div>
	</main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>