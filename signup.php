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
								<div class="form-outline mb-4">
									<label class="form-label" for="password">Password</label>
									<input type="password" id="password" name="password" class="form-control form-control-lg" />
									<small id="passwordError" class="text-danger"></small>
								</div>
								<div class="row mb-4">
                  <a href="login.php">login?</a>
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


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
	<script>
		function validateForm() {
			let valid = true;

			const name = document.getElementById('name').value;
			const phone = document.getElementById('phone').value;
			const address = document.getElementById('address').value;
			const email = document.getElementById('email').value;
			const password = document.getElementById('password').value;

			document.getElementById('nameError').textContent = '';
			document.getElementById('phoneError').textContent = '';
			document.getElementById('addressError').textContent = '';
			document.getElementById('emailError').textContent = '';
			document.getElementById('passwordError').textContent = '';

			if (name === '') {
				document.getElementById('nameError').textContent = 'Name is required';
				valid = false;
			}
			if (phone === '' || !/^\d{10}$/.test(phone)) {
				document.getElementById('phoneError').textContent = 'Valid phone number is required';
				valid = false;
			}
			if (address === '') {
				document.getElementById('addressError').textContent = 'Address is required';
				valid = false;
			}
			if (email === '' || !/\S+@\S+\.\S+/.test(email)) {
				document.getElementById('emailError').textContent = 'Valid email is required';
				valid = false;
			}
			if (password === '' || password.length < 6) {
				document.getElementById('passwordError').textContent = 'Password must be at least 6 characters long';
				valid = false;
			}

			return valid;
		}
	</script>
</body>

</html>
