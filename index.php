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
		</style>
	</head>
<body>

<!-- Loader Section -->
<div id="loader">
		<div class="spinner-border text-primary" role="status">
			<span class="visually-hidden">Loading...</span>
		</div>
	</div>

<!-- Navbar Section starts -->
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
					}
					?>
				</span>
			</div>
		</div>
	</nav>
	<!-- Navbar Section ends-->

<!-- Food search Section starts -->
<form class="d-flex justify-content-center align-items-center" action="./search.php" method="get" id="header">
	<div class="col-md-7 p-2">
		<input type="text" class="form-control form-control-lg" name="q" style="height: 45px;" placeholder="Search for food ...." />
	</div>
	<div class="col-md-2 p-2">
		<button class="btn btn-success btn-lg" type="submit" style="height: 45px;">Search</button>
	</div>
</form>
<!-- Food search Section ends-->

<!-- categories Section starts -->
<header class="text-center p-4">
    <h3>Featured Foods</h3>
    <main class="container-fluid">
        <div class="row">
            <a class="col-md-4 col-sm-12 p-5 text-center no-ul" href="./search.php?q=pizza">
                <img src="images/pizza.jpg" alt="pizza" class="img-fluid rounded" style="max-width: 100%; height: auto;">
                <h3 class="text-overlay">Pizza</h3>
            </a>
            <a class="col-md-4 col-sm-12 p-5 text-center no-ul" href="./search.php?q=burger">
                <img src="images/burger.webp" alt="burger" class="img-fluid rounded" style="max-width: 100%; height: auto;">
                <h3 class="text-overlay">Burger</h3>
            </a>
            <a class="col-md-4 col-sm-12 p-5 text-center no-ul" href="./search.php?q=Pasta">
                <img src="images/pasta.webp" alt="pasta" class="img-fluid rounded" style="max-width: 100%; height: auto;">
                <h3 class="text-overlay">Pasta</h3>
            </a>
        </div>
    </main>
</header>
<!-- categories Section ends-->

<!-- food menu Section starts -->
<main class="p-4">
    <h3 class="text-center p-4">Explore Foods</h3>
    <main class="container">
			<div class="row">
				
				<div class="col-md-6 col-sm-12 mb-3">
					<div class="card">
						<div class="card-body row">
							<div class="col-lg-4 col-md-12">
								<img src="images/burgermenu.jpg" alt="name gen icon" class="img-fluid"/>
							</div>
							<div class="col-md-7">
								<h4>Basic Burger</h4>
								<p class="food-price">Rs.400</p>
								<p class="food-detail">A simple patty cheese burger</p><br>
								<a href="./order.php?id=2" class="btn btn-primary"> order now</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-12 mb-3">
					<div class="card">
						<div class="card-body row">
							<div class="col-lg-4 col-md-12">
								<img src="images/pastamenu.jpg" alt="name gen icon" class="img-fluid"/>
							</div>
							<div class="col-md-7">
								<h4>Cheese Pasta</h4>
								<p class="food-price">Rs.550</p>
								<p class="food-detail">With heavy loaded cheese </p><br>
								<a href="./order.php?id=3" class="btn btn-primary"> order now</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-12 mb-3">
					<div class="card">
						<div class="card-body row">
							<div class="col-lg-4 col-md-12">
								<img src="images/pizzamenu2.jpg" alt="name gen icon" class="img-fluid"/>
							</div>
							<div class="col-md-7">
								<h4>Basic Magaritta Pizza</h4>
								<p class="food-price">Rs.750</p>
								<p class="food-detail">Made with different type of cheese</p><br>
								<a href="./order.php?id=4" class="btn btn-primary"> order now</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-12 mb-3">
					<div class="card">
						<div class="card-body row">
							<div class="col-lg-4 col-md-12">
								<img src="images/burgermenu2.jpg" alt="name gen icon" class="img-fluid"/>
							</div>
							<div class="col-md-7">
								<h4>Double Cheese Burger</h4>
								<p class="food-price">Rs.500</p>
								<p class="food-detail">A boudle patty cheesey with toasted bun</p><br>
								<a href="./order.php?id=5" class="btn btn-primary"> order now</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-12 mb-3">
					<div class="card">
						<div class="card-body row">
							<div class="col-lg-4 col-md-12">
								<img src="images/pasta2.jpg" alt="name gen icon" class="img-fluid"/>
							</div>
							<div class="col-md-7">
								<h4>Double Cheese Pasta</h4>
								<p class="food-price">Rs.500</p>
								<p class="food-detail">Made with two types of cheese</p><br>
								<a href="./order.php?id=6" class="btn btn-primary"> order now</a>
							</div>
						</div>
					</div>
				</div>
				<!-- New Food Item - Supreme Pizza -->
				<div class="col-md-6 col-sm-12 mb-3">
					<div class="card">
						<div class="card-body row">
							<div class="col-lg-4 col-md-12">
								<img src="images/pizzamenu.jpg" alt="Supreme Pizza" class="img-fluid"/>
							</div>
							<div class="col-md-7">
								<h4>Supreme Pizza</h4>
								<p class="food-price">Rs.800</p>
								<p class="food-detail">Loaded with many toppings</p><br>
								<a href="./order.php?id=7" class="btn btn-primary"> order now</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>

</main>
<!-- food menu Section ends-->

<!-- social Section starts -->
<section class="social">
	<div class="container text-center">
		<a href="#"><img alt="svgImg" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iNTAiIGhlaWdodD0iNTAiIHZpZXdCb3g9IjAgMCA1MCA1MCI+CjxwYXRoIGQ9Ik0gMjUgMyBDIDEyLjg2MTU2MiAzIDMgMTIuODYxNTYyIDMgMjUgQyAzIDM2LjAxOTEzNSAxMS4xMjc1MzMgNDUuMTM4MzU1IDIxLjcxMjg5MSA0Ni43Mjg1MTYgTCAyMi44NjEzMjggNDYuOTAyMzQ0IEwgMjIuODYxMzI4IDI5LjU2NjQwNiBMIDE3LjY2NDA2MiAyOS41NjY0MDYgTCAxNy42NjQwNjIgMjYuMDQ2ODc1IEwgMjIuODYxMzI4IDI2LjA0Njg3NSBMIDIyLjg2MTMyOCAyMS4zNzMwNDcgQyAyMi44NjEzMjggMTguNDk0OTY1IDIzLjU1MTk3MyAxNi41OTk0MTcgMjQuNjk1MzEyIDE1LjQxMDE1NiBDIDI1LjgzODY1MiAxNC4yMjA4OTYgMjcuNTI4MDA0IDEzLjYyMTA5NCAyOS44Nzg5MDYgMTMuNjIxMDk0IEMgMzEuNzU4NzE0IDEzLjYyMTA5NCAzMi40OTAwMjIgMTMuNzM0OTkzIDMzLjE4NTU0NyAxMy44MjAzMTIgTCAzMy4xODU1NDcgMTYuNzAxMTcyIEwgMzAuNzM4MjgxIDE2LjcwMTE3MiBDIDI5LjM0OTY5NyAxNi43MDExNzIgMjguMjEwNDQ5IDE3LjQ3NTkwMyAyNy42MTkxNDEgMTguNTA3ODEyIEMgMjcuMDI3ODMyIDE5LjUzOTcyNCAyNi44NDM3NSAyMC43NzE4MTYgMjYuODQzNzUgMjIuMDI3MzQ0IEwgMjYuODQzNzUgMjYuMDQ0OTIyIEwgMzIuOTY2Nzk3IDI2LjA0NDkyMiBMIDMyLjQyMTg3NSAyOS41NjQ0NTMgTCAyNi44NDM3NSAyOS41NjQ0NTMgTCAyNi44NDM3NSA0Ni45Mjk2ODggTCAyNy45Nzg1MTYgNDYuNzc1MzkxIEMgMzguNzE0MzQgNDUuMzE5MzY2IDQ3IDM2LjEyNjg0NSA0NyAyNSBDIDQ3IDEyLjg2MTU2MiAzNy4xMzg0MzggMyAyNSAzIHogTSAyNSA1IEMgMzYuMDU3NTYyIDUgNDUgMTMuOTQyNDM4IDQ1IDI1IEMgNDUgMzQuNzI5NzkxIDM4LjAzNTc5OSA0Mi43MzE3OTYgMjguODQzNzUgNDQuNTMzMjAzIEwgMjguODQzNzUgMzEuNTY0NDUzIEwgMzQuMTM2NzE5IDMxLjU2NDQ1MyBMIDM1LjI5ODgyOCAyNC4wNDQ5MjIgTCAyOC44NDM3NSAyNC4wNDQ5MjIgTCAyOC44NDM3NSAyMi4wMjczNDQgQyAyOC44NDM3NSAyMC45ODk4NzEgMjkuMDMzNTc0IDIwLjA2MDI5MyAyOS4zNTM1MTYgMTkuNTAxOTUzIEMgMjkuNjczNDU3IDE4Ljk0MzYxNCAyOS45ODE4NjUgMTguNzAxMTcyIDMwLjczODI4MSAxOC43MDExNzIgTCAzNS4xODU1NDcgMTguNzAxMTcyIEwgMzUuMTg1NTQ3IDEyLjAwOTc2NiBMIDM0LjMxODM1OSAxMS44OTI1NzggQyAzMy43MTg1NjcgMTEuODExNDE4IDMyLjM0OTE5NyAxMS42MjEwOTQgMjkuODc4OTA2IDExLjYyMTA5NCBDIDI3LjE3NTgwOCAxMS42MjEwOTQgMjQuODU1NTY3IDEyLjM1NzQ0OCAyMy4yNTM5MDYgMTQuMDIzNDM4IEMgMjEuNjUyMjQ2IDE1LjY4OTQyNiAyMC44NjEzMjggMTguMTcwMTI4IDIwLjg2MTMyOCAyMS4zNzMwNDcgTCAyMC44NjEzMjggMjQuMDQ2ODc1IEwgMTUuNjY0MDYyIDI0LjA0Njg3NSBMIDE1LjY2NDA2MiAzMS41NjY0MDYgTCAyMC44NjEzMjggMzEuNTY2NDA2IEwgMjAuODYxMzI4IDQ0LjQ3MDcwMyBDIDExLjgxNjk5NSA0Mi41NTQ4MTMgNSAzNC42MjQ0NDcgNSAyNSBDIDUgMTMuOTQyNDM4IDEzLjk0MjQzOCA1IDI1IDUgeiI+PC9wYXRoPgo8L3N2Zz4="/></a>
		<a href="#"><img alt="svgImg" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iNTAiIGhlaWdodD0iNTAiIHZpZXdCb3g9IjAgMCA1MCA1MCI+CjxwYXRoIGQ9Ik0gMTYgMyBDIDguODMyNDgzOSAzIDMgOC44MzI0ODM5IDMgMTYgTCAzIDM0IEMgMyA0MS4xNjc1MTYgOC44MzI0ODM5IDQ3IDE2IDQ3IEwgMzQgNDcgQyA0MS4xNjc1MTYgNDcgNDcgNDEuMTY3NTE2IDQ3IDM0IEwgNDcgMTYgQyA0NyA4LjgzMjQ4MzkgNDEuMTY3NTE2IDMgMzQgMyBMIDE2IDMgeiBNIDE2IDUgTCAzNCA1IEMgNDAuMDg2NDg0IDUgNDUgOS45MTM1MTYxIDQ1IDE2IEwgNDUgMzQgQyA0NSA0MC4wODY0ODQgNDAuMDg2NDg0IDQ1IDM0IDQ1IEwgMTYgNDUgQyA5LjkxMzUxNjEgNDUgNSA0MC4wODY0ODQgNSAzNCBMIDUgMTYgQyA1IDkuOTEzNTE2MSA5LjkxMzUxNjEgNSAxNiA1IHogTSAzNyAxMSBBIDIgMiAwIDAgMCAzNSAxMyBBIDIgMiAwIDAgMCAzNyAxNSBBIDIgMiAwIDAgMCAzOSAxMyBBIDIgMiAwIDAgMCAzNyAxMSB6IE0gMjUgMTQgQyAxOC45MzY3MTIgMTQgMTQgMTguOTM2NzEyIDE0IDI1IEMgMTQgMzEuMDYzMjg4IDE4LjkzNjcxMiAzNiAyNSAzNiBDIDMxLjA2MzI4OCAzNiAzNiAzMS4wNjMyODggMzYgMjUgQyAzNiAxOC45MzY3MTIgMzEuMDYzMjg4IDE0IDI1IDE0IHogTSAyNSAxNiBDIDI5Ljk4MjQwNyAxNiAzNCAyMC4wMTc1OTMgMzQgMjUgQyAzNCAyOS45ODI0MDcgMjkuOTgyNDA3IDM0IDI1IDM0IEMgMjAuMDE3NTkzIDM0IDE2IDI5Ljk4MjQwNyAxNiAyNSBDIDE2IDIwLjAxNzU5MyAyMC4wMTc1OTMgMTYgMjUgMTYgeiI+PC9wYXRoPgo8L3N2Zz4="/></a>
		<a href="#"><img alt="svgImg" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iNTAiIGhlaWdodD0iNTAiIHZpZXdCb3g9IjAgMCA1MCA1MCI+CjxwYXRoIGQ9Ik0gMzQuMjE4NzUgNS40Njg3NSBDIDI4LjIzODI4MSA1LjQ2ODc1IDIzLjM3NSAxMC4zMzIwMzEgMjMuMzc1IDE2LjMxMjUgQyAyMy4zNzUgMTYuNjcxODc1IDIzLjQ2NDg0NCAxNy4wMjM0MzggMjMuNSAxNy4zNzUgQyAxNi4xMDU0NjkgMTYuNjY3OTY5IDkuNTY2NDA2IDEzLjEwNTQ2OSA1LjEyNSA3LjY1NjI1IEMgNC45MTc5NjkgNy4zOTQ1MzEgNC41OTc2NTYgNy4yNTM5MDYgNC4yNjE3MTkgNy4yNzczNDQgQyAzLjkyOTY4OCA3LjMwMDc4MSAzLjYzMjgxMyA3LjQ5MjE4OCAzLjQ2ODc1IDcuNzgxMjUgQyAyLjUzNTE1NiA5LjM4NjcxOSAyIDExLjIzNDM3NSAyIDEzLjIxODc1IEMgMiAxNS42MjEwOTQgMi44NTkzNzUgMTcuODIwMzEzIDQuMTg3NSAxOS42MjUgQyAzLjkyOTY4OCAxOS41MTE3MTkgMy42NDg0MzggMTkuNDQ5MjE5IDMuNDA2MjUgMTkuMzEyNSBDIDMuMDk3NjU2IDE5LjE0ODQzOCAyLjcyNjU2MyAxOS4xNTYyNSAyLjQyNTc4MSAxOS4zMzU5MzggQyAyLjEyNSAxOS41MTU2MjUgMS45NDE0MDYgMTkuODM5ODQ0IDEuOTM3NSAyMC4xODc1IEwgMS45Mzc1IDIwLjMxMjUgQyAxLjkzNzUgMjMuOTk2MDk0IDMuODQzNzUgMjcuMTk1MzEzIDYuNjU2MjUgMjkuMTU2MjUgQyA2LjYyNSAyOS4xNTIzNDQgNi41OTM3NSAyOS4xNjQwNjMgNi41NjI1IDI5LjE1NjI1IEMgNi4yMTg3NSAyOS4wOTc2NTYgNS44NzEwOTQgMjkuMjE4NzUgNS42NDA2MjUgMjkuNDgwNDY5IEMgNS40MTAxNTYgMjkuNzQyMTg4IDUuMzM1OTM4IDMwLjEwNTQ2OSA1LjQzNzUgMzAuNDM3NSBDIDYuNTU0Njg4IDMzLjkxMDE1NiA5LjQwNjI1IDM2LjU2MjUgMTIuOTM3NSAzNy41MzEyNSBDIDEwLjEyNSAzOS4yMDMxMjUgNi44NjMyODEgNDAuMTg3NSAzLjM0Mzc1IDQwLjE4NzUgQyAyLjU4MjAzMSA0MC4xODc1IDEuODUxNTYzIDQwLjE0ODQzOCAxLjEyNSA0MC4wNjI1IEMgMC42NTYyNSA0MCAwLjIwNzAzMSA0MC4yNzM0MzggMC4wNTA3ODEzIDQwLjcxODc1IEMgLTAuMTA5Mzc1IDQxLjE2NDA2MyAwLjA2NjQwNjMgNDEuNjYwMTU2IDAuNDY4NzUgNDEuOTA2MjUgQyA0Ljk4MDQ2OSA0NC44MDA3ODEgMTAuMzM1OTM4IDQ2LjUgMTYuMDkzNzUgNDYuNSBDIDI1LjQyNTc4MSA0Ni41IDMyLjc0NjA5NCA0Mi42MDE1NjMgMzcuNjU2MjUgMzcuMDMxMjUgQyA0Mi41NjY0MDYgMzEuNDYwOTM4IDQ1LjEyNSAyNC4yMjY1NjMgNDUuMTI1IDE3LjQ2ODc1IEMgNDUuMTI1IDE3LjE4MzU5NCA0NS4xMDE1NjMgMTYuOTA2MjUgNDUuMDkzNzUgMTYuNjI1IEMgNDYuOTI1NzgxIDE1LjIyMjY1NiA0OC41NjI1IDEzLjU3ODEyNSA0OS44NDM3NSAxMS42NTYyNSBDIDUwLjA5NzY1NiAxMS4yODUxNTYgNTAuMDcwMzEzIDEwLjc4OTA2MyA0OS43NzczNDQgMTAuNDQ1MzEzIEMgNDkuNDg4MjgxIDEwLjEwMTU2MyA0OSA5Ljk5NjA5NCA0OC41OTM3NSAxMC4xODc1IEMgNDguMDc4MTI1IDEwLjQxNzk2OSA0Ny40NzY1NjMgMTAuNDQxNDA2IDQ2LjkzNzUgMTAuNjI1IEMgNDcuNjQ4NDM4IDkuNjc1NzgxIDQ4LjI1NzgxMyA4LjY1MjM0NCA0OC42MjUgNy41IEMgNDguNzUgNy4xMDU0NjkgNDguNjEzMjgxIDYuNjcxODc1IDQ4LjI4OTA2MyA2LjQxNDA2MyBDIDQ3Ljk2NDg0NCA2LjE2MDE1NiA0Ny41MTE3MTkgNi4xMjg5MDYgNDcuMTU2MjUgNi4zNDM3NSBDIDQ1LjQ0OTIxOSA3LjM1NTQ2OSA0My41NTg1OTQgOC4wNjY0MDYgNDEuNTYyNSA4LjUgQyAzOS42MjUgNi42ODc1IDM3LjA3NDIxOSA1LjQ2ODc1IDM0LjIxODc1IDUuNDY4NzUgWiBNIDM0LjIxODc1IDcuNDY4NzUgQyAzNi43Njk1MzEgNy40Njg3NSAzOS4wNzQyMTkgOC41NTg1OTQgNDAuNjg3NSAxMC4yODEyNSBDIDQwLjkyOTY4OCAxMC41MzEyNSA0MS4yODUxNTYgMTAuNjM2NzE5IDQxLjYyNSAxMC41NjI1IEMgNDIuOTI5Njg4IDEwLjMwNDY4OCA0NC4xNjc5NjkgOS45MjU3ODEgNDUuMzc1IDkuNDM3NSBDIDQ0LjY3OTY4OCAxMC4zNzUgNDMuODIwMzEzIDExLjE3NTc4MSA0Mi44MTI1IDExLjc4MTI1IEMgNDIuMzU1NDY5IDEyLjAwMzkwNiA0Mi4xNDA2MjUgMTIuNTMxMjUgNDIuMzA4NTk0IDEzLjAxMTcxOSBDIDQyLjQ3MjY1NiAxMy40ODgyODEgNDIuOTcyNjU2IDEzLjc2NTYyNSA0My40Njg3NSAxMy42NTYyNSBDIDQ0LjQ2ODc1IDEzLjUzNTE1NiA0NS4zNTkzNzUgMTMuMTI4OTA2IDQ2LjMxMjUgMTIuODc1IEMgNDUuNDU3MDMxIDEzLjgwMDc4MSA0NC41MTk1MzEgMTQuNjM2NzE5IDQzLjUgMTUuMzc1IEMgNDMuMjIyNjU2IDE1LjU3ODEyNSA0My4wNzAzMTMgMTUuOTA2MjUgNDMuMDkzNzUgMTYuMjUgQyA0My4xMDkzNzUgMTYuNjU2MjUgNDMuMTI1IDE3LjA1ODU5NCA0My4xMjUgMTcuNDY4NzUgQyA0My4xMjUgMjMuNzE4NzUgNDAuNzI2NTYzIDMwLjUwMzkwNiAzNi4xNTYyNSAzNS42ODc1IEMgMzEuNTg1OTM4IDQwLjg3MTA5NCAyNC44NzUgNDQuNSAxNi4wOTM3NSA0NC41IEMgMTIuMTA1NDY5IDQ0LjUgOC4zMzk4NDQgNDMuNjE3MTg4IDQuOTM3NSA0Mi4wNjI1IEMgOS4xNTYyNSA0MS43MzgyODEgMTMuMDQ2ODc1IDQwLjI0NjA5NCAxNi4xODc1IDM3Ljc4MTI1IEMgMTYuNTE1NjI1IDM3LjUxOTUzMSAxNi42NDQ1MzEgMzcuMDgyMDMxIDE2LjUxMTcxOSAzNi42ODM1OTQgQyAxNi4zNzg5MDYgMzYuMjg1MTU2IDE2LjAxMTcxOSAzNi4wMTE3MTkgMTUuNTkzNzUgMzYgQyAxMi4yOTY4NzUgMzUuOTQxNDA2IDkuNTM1MTU2IDM0LjAyMzQzOCA4LjA2MjUgMzEuMzEyNSBDIDguMTE3MTg4IDMxLjMxMjUgOC4xNjQwNjMgMzEuMzEyNSA4LjIxODc1IDMxLjMxMjUgQyA5LjIwNzAzMSAzMS4zMTI1IDEwLjE4MzU5NCAzMS4xODc1IDExLjA5Mzc1IDMwLjkzNzUgQyAxMS41MzEyNSAzMC44MDg1OTQgMTEuODMyMDMxIDMwLjQwMjM0NCAxMS44MTY0MDYgMjkuOTQ1MzEzIEMgMTEuODAwNzgxIDI5LjQ4ODI4MSAxMS40NzY1NjMgMjkuMDk3NjU2IDExLjAzMTI1IDI5IEMgNy40NzI2NTYgMjguMjgxMjUgNC44MDQ2ODggMjUuMzgyODEzIDQuMTg3NSAyMS43ODEyNSBDIDUuMTk1MzEzIDIyLjEyODkwNiA2LjIyNjU2MyAyMi40MDIzNDQgNy4zNDM3NSAyMi40Mzc1IEMgNy44MDA3ODEgMjIuNDY0ODQ0IDguMjE0ODQ0IDIyLjE3OTY4OCA4LjM1NTQ2OSAyMS43NDYwOTQgQyA4LjQ5NjA5NCAyMS4zMTI1IDguMzI0MjE5IDIwLjgzNTkzOCA3LjkzNzUgMjAuNTkzNzUgQyA1LjU2MjUgMTkuMDAzOTA2IDQgMTYuMjk2ODc1IDQgMTMuMjE4NzUgQyA0IDEyLjA3ODEyNSA0LjI5Njg3NSAxMS4wMzEyNSA0LjY4NzUgMTAuMDMxMjUgQyA5LjY4NzUgMTUuNTE5NTMxIDE2LjY4NzUgMTkuMTY0MDYzIDI0LjU5Mzc1IDE5LjU2MjUgQyAyNC45MDYyNSAxOS41NzgxMjUgMjUuMjEwOTM4IDE5LjQ0OTIxOSAyNS40MTQwNjMgMTkuMjEwOTM4IEMgMjUuNjE3MTg4IDE4Ljk2ODc1IDI1LjY5NTMxMyAxOC42NDg0MzggMjUuNjI1IDE4LjM0Mzc1IEMgMjUuNDcyNjU2IDE3LjY5NTMxMyAyNS4zNzUgMTcuMDA3ODEzIDI1LjM3NSAxNi4zMTI1IEMgMjUuMzc1IDExLjQxNDA2MyAyOS4zMjAzMTMgNy40Njg3NSAzNC4yMTg3NSA3LjQ2ODc1IFoiPjwvcGF0aD4KPC9zdmc+"/></a>
	</div>
</section>
<!-- Social Section ends-->

<!-- Footer section Section starts -->
<footer>
	<div class="container text-center">
		<p>All rights reserved. Designed by <a href="#">Sujit Lama & Srijan Bagdas</a></p>
	</div>
</footer>
<!-- Footer Section ends-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
		// Hide the loader after the page content has fully loaded
		window.addEventListener('load', () => {
			document.getElementById('loader').style.display = 'none';
		});
	</script>
</body>
</html>

<!-- Footer section Section starts -->
<footer>
	<div class="container text-center">
		<p>All rights reserved. Designed by <a href="#">Sujit Lama & Srijan Bagdas</a></p>
	</div>
</footer>
<!-- Footer Section ends-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
		// Hide the loader after the page content has fully loaded
		window.addEventListener('load', () => {
			document.getElementById('loader').style.display = 'none';
		});
	</script>
</body>
</html>
