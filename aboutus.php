<?php
    require_once 'php/basic.php';
    reqLogin();
    $title = "About Us";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="icon" href="./img/icon.jpeg" type="image/x-icon">
    <link href="./css/nav.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        p {
            font-size: 1.1rem;
            line-height: 1.6;
            color: #555;
            text-align: justify;
            margin-bottom: 20px;
        }
        .contact-section {
            margin-top: 30px;
            padding: 20px;
            background: #f1f1f1;
            border-radius: 8px;
        }
        .contact-section h2 {
            font-size: 1.8rem;
            color: #333;
            margin-bottom: 10px;
        }
        .contact-section p {
            font-size: 1rem;
            color: #555;
        }
        .contact-section a {
            color: #ff6600;
            text-decoration: none;
        }
        .contact-section a:hover {
            text-decoration: underline;
        }
    footer .container {
    display: flex;
    flex-direction: column;
    align-items: center;
}



    </style>
</head>
<body>

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
                    <a class="nav-link" href="./myOrders.php">My Orders</a>
                    <?php if($admin){ echo '<a class="nav-link" href="./panel.php">Panel</a>'; }?>
                    <a class="nav-link" href="help.php">Help</a>
                    <a class="nav-link" href="./faq.php">FAQ</a>
                    <a class="nav-link active" href="./aboutus.php">About Us</a>
                </div>
                <span class="navbar-text">
                    <?php if($logined){ echo '<a href="./logout.php">Logout</a>'; }else{ echo '<a href="./login.php">Login</a>'; } ?>
                </span>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1>About Us</h1>
        <p>Welcome to our innovative online food ordering system, a cutting-edge technology platform tailored for food establishments. Unlike traditional delivery services, our system integrates seamlessly with devices in your establishment to enhance efficiency and improve the ordering experience.</p>
        <p>Our solution empowers businesses to optimize their operations, reduce wait times, and deliver an exceptional customer experience. Whether you're a small café or a large restaurant, our adaptable system meets your unique needs, allowing you to focus on providing quality service and delicious meals.</p>
        <p>At our core, we aim to equip food establishments with tools that streamline operations and elevate customer satisfaction. With a user-friendly interface and reliable functionality, we help make dining better, faster, and more enjoyable for everyone.</p>
        <div class="contact-section">
            <h2>Contact Us</h2>
            <p>If you have any questions, suggestions, or require assistance, feel free to reach out to us:</p>
            <p>Email: <a href="mailto:support@foodorderingsystem.com">support@foodorderingsystem.com</a></p>
            <p>Phone: +977 974XXXXXXX</p>
        </div>
    </div>

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




</body>
</html>
