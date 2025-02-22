<?php
    require_once 'php/basic.php';
    reqAdmin();
    require_once 'php/dbconnect.php'; // This file should contain functions to interact with the database.

    // Check if food ID is provided in the URL
    if(isset($_GET['id']) && !empty($_GET['id'])) {
        $food_id = $_GET['id'];
        
        // Fetch food details from the database based on food ID
        $query = "SELECT * FROM Foods WHERE food_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $food_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if($result->num_rows == 1) {
            $food = $result->fetch_assoc();
        } else {
            echo "Food not found.";
            exit;
        }
    } else {
        echo "Invalid food ID.";
        exit;
    }

    // Check if form is submitted for updating the food item
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $details = $_POST['details'];

        // File upload
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $image_name = $_FILES["image"]["name"];

        // Check if file is uploaded
        if ($_FILES["image"]["size"] > 0) {
            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                exit;
            }

            // Upload file
            if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "Sorry, there was an error uploading your file.";
                exit;
            }
        } else {
            // No new image uploaded, retain the existing image
            $image_name = $food['image_name'];
        }

        // Update the food item in the database
        $query = "UPDATE Foods SET name = ?, description = ?, image_name = ?, price = ?, details = ? WHERE food_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssdi", $name, $description, $image_name, $price, $details, $food_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            // Food item updated successfully
            header("Location: manage_food.php");
            exit;
        } else {
            // Error occurred
            echo "Error: Unable to update food item.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Food</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <!-- Navbar Section -->
    <?php include 'navbar.php'; ?>

    <div class="container mt-5">
        <h1 class="mb-4">Edit Food</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $food_id; ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $food['name']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required><?php echo $food['description']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" value="<?php echo $food['price']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="details" class="form-label">Details</label>
                <textarea class="form-control" id="details" name="details" rows="5" required><?php echo $food['details']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Food Item</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
