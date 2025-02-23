<?php
	require_once 'php/basic.php';
	noLogined();
?>

<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Signup</title>
		<link rel="icon" href="./img/icon.jpeg" type="image/x-icon">
		<link href="./css/bg.css" rel="stylesheet">
		<link href="./css/tools.css" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

		<style>
			.password-container {
				position: relative;
				width: 100%;
			}
			.toggle-password {
				position: absolute;
				right: 15px;
				top: 50%;
				transform: translateY(0%);
				cursor: pointer;
				background: none;
				border: none;
				width: 30px;
				height: 30px;
				display: flex;
				align-items: center;
				justify-content: center;
				padding: 0;
			}
			.toggle-password img {
				width: 20px;
				height: 20px;
				pointer-events: none;
			}
			.form-control {
				padding-right: 50px;
				height: 50px;
			}
		</style>
</head>
<body>
	<section class="vh-100">
		<div class="container py-5 h-100">
			<div class="row justify-content-center align-items-center h-100">
				<div class="col-8 col-lg-6 col-xl-5">
					<div class="card shadow-2-strong card-registration" id="trans" style="border-radius: 15px;">
						<div class="card-body p-4 p-md-5">
							<h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Sign Up</h3>
							<form action="./php/signup.php" method="post" onsubmit="return validateForm()">
								<div class="form-outline mb-4">
									<label class="form-label" for="name">Name</label>
									<input type="text" id="name" name="name" class="form-control form-control-lg" />
									<small id="nameError" class="text-danger"></small>
								</div>
								<div class="form-outline mb-4">
									<label class="form-label" for="phone">Phone No</label>
									<input type="text" id="phone" name="phone" class="form-control form-control-lg" />
									<small id="phoneError" class="text-danger"></small>
								</div>
								<div class="form-outline mb-4">
									<label class="form-label" for="address">Address</label>
									<input type="text" id="address" name="address" class="form-control form-control-lg" />
									<small id="addressError" class="text-danger"></small>
								</div>
								<div class="form-outline mb-4">
									<label class="form-label" for="email">Email</label>
									<input type="email" id="email" name="email" class="form-control form-control-lg" />
									<small id="emailError" class="text-danger"></small>
								</div>
								<div class="form-outline mb-4 password-container">
									<label class="form-label" for="password">Password</label>
									<input type="password" id="password" name="password" class="form-control form-control-lg" />
									<button type="button" class="toggle-password" onclick="togglePassword('password', 'eye-icon')">
										<img id="eye-icon" src="./img/eye.png" alt="Show/Hide">
									</button>
								</div>
								<div class="form-outline mb-4 password-container">
									<label class="form-label" for="confirm-password">Confirm Password</label>
									<input type="password" id="confirm-password" name="confirm-password" class="form-control form-control-lg" />
									<button type="button" class="toggle-password" onclick="togglePassword('confirm-password', 'eye-icon-confirm')">
										<img id="eye-icon-confirm" src="./img/eye.png" alt="Show/Hide">
									</button>
								</div>
								<div class="row mb-4">
									<a href="login.php">Login?</a>
								</div>
								<div class="mt-4 pt-2">
									<input class="btn btn-primary btn-lg" type="submit" value="Signup" />
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script>
		function togglePassword(fieldId, iconId) {
			var passwordField = document.getElementById(fieldId);
			var eyeIcon = document.getElementById(iconId);
			passwordField.type = passwordField.type === "password" ? "text" : "password";
			eyeIcon.src = passwordField.type === "password" ? "./img/eye.png" : "./img/hide.png";
		}
	</script>
</body>
</html>
