<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"> <!-- Specifies the character encoding for the document -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Ensures proper scaling on mobile devices -->
	<title>Message</title> <!-- Title displayed in the browser tab -->
</head>
<body>
	<h1>
		<?php echo $msg; ?> <!-- Display the dynamic message passed to this page -->
	</h1>
	<script>
		// JavaScript to redirect the user to a specified location after 3 seconds
		setTimeout(function() {
			// Redirect the browser to the URL provided in the $location variable
			window.location.href = "<?php echo $location; ?>";
		}, 3000); // Delay of 3000 milliseconds (3 seconds)
	</script>
</body>
</html>
