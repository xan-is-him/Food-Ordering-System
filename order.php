<?php 
	require_once 'php/basic.php';
	reqLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Order Food</title>
		<link rel="icon" href="./img/icon.jpeg" type="image/x-icon">
		<link href="./css/nav.css" rel="stylesheet">
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

<main class="container">
		<?php
		if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
      $id = (int)$_GET["id"];
      require_once 'php/dbconnect.php';
      $sql = "SELECT name,description,image_name,price,details FROM Foods WHERE food_id=$id";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name=$row["name"];
        $description=$row["description"];
        $image_name=$row["image_name"];
        $price=$row["price"];
        $details=$row["details"];
      }
		}else{
			echo "Reqire id";
		}
		?>
</main>

<div class="container">
  <div class="card demo">
    <div class="card-body row">
      <div class="col-lg-5 col-md-12">
        <img src="images/<?php echo $image_name;?>" alt="name gen icon" class="img-fluid rounded"/>
      </div>
      <form class="col-lg-7 col-md-12 text-black" action="./php/order.php" method="post">
        <h4 class="card-title"><?php echo $name;?></h5>
        <p class="card-text"><?php echo $description;?></p>
        <h5>Price:<?php echo $price;?> </h5>
        <h5>Quantity:</h5>
        <div class="row align-items-center">
          <div class="col-auto p-1">
            <button type="button" class="btn btn-danger" onclick="decrement()">-</button>
          </div>
          <div class="col-md-3">
            <input type="number" class="form-control" name="quantity" id="quantity" min="1" value="1" readonly />
          </div>
          <div class="col-auto p-1">
            <button type="button" class="btn btn-success" onclick="increment()">+</button>
          </div>
        </div>
        <h5 class="pt-3">Cost</h5>
        <p id="cost">Rs.<?php echo $price;?></p>
        <input type="hidden" name="cost" id="hiddenCost" value="<?php echo $price;?>" />
        <input type="hidden" name="id" value="<?php echo $id;?>"/>
        <button type="submit" class="btn btn-primary">
            Order now
        </button>
      </form>
      <div class="col-md-11 pt-5">
        <?php echo $details;?>
      </div>
    </div>
  </div>
</div>

<script>
    function decrement() {
        var quantityInput = document.getElementById("quantity");
        var currentValue = parseInt(quantityInput.value);
        if (currentValue > 1) {
            quantityInput.value = currentValue - 1;
            updateCost();
        }
    }

    function increment() {
        var quantityInput = document.getElementById("quantity");
        var currentValue = parseInt(quantityInput.value);
        quantityInput.value = currentValue + 1;
        updateCost();
    }

    function updateCost() {
        var quantityInput = document.getElementById("quantity");
        var quantity = parseInt(quantityInput.value);
        var price = <?php echo $price;?>;
        var cost = price * quantity;
        var costParagraph = document.getElementById("cost");
        var hiddenCostInput = document.getElementById("hiddenCost");
        costParagraph.innerHTML = "Rs." + cost;
        hiddenCostInput.value = cost;
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
