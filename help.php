<?php
    require_once 'php/basic.php';
    reqLogin();
    $title = "Help";
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
            font-family: 'Arial', sans-serif;
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
        .navbar, .navbar-nav .nav-link, .navbar-text {
            font-family: Arial, sans-serif !important;
            font-size: 1rem !important;
            font-weight: normal !important;
        }
        .faq-category {
            font-size: 1.8rem;
            font-weight: bold;
            color: #ff6600;
            margin-top: 20px;
            margin-bottom: 10px;
        }
        .faq-item {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }
        .faq-question {
            width: 100%;
            background: none;
            border: none;
            text-align: left;
            padding: 15px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #333;
        }
        .faq-answer {
            display: none;
            padding: 10px 15px;
            color: #555;
            font-size: 16px;
            background-color: #fafafa;
            border-left: 3px solid #ff6600;
            margin-top: 5px;
        }
        .faq-answer.active {
            display: block;
        }
        footer {
            margin-top: 50px;
            padding: 20px 0;
            text-align: center;
            background-color: #f8f9fa;
            color: #333;
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
                    <a class="nav-link active" href="./help.php">Help</a>
                    <a class="nav-link" href="./faq.php">FAQ</a>
                    <a class="nav-link" href="./aboutus.php">About Us</a>
                </div>
                <span class="navbar-text">
                    <?php if($logined){ echo '<a href="./logout.php">Logout</a>'; }else{ echo '<a href="./login.php">Login</a>'; } ?>
                </span>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1>Help & Support</h1>
        <p>Welcome to our Help page. Here you will find answers to common questions and guidance on how to use our platform.</p>
        
        <div class="faq-section">
            <div class="faq-category">General Questions</div>
            <div class="faq-item">
                <button class="faq-question">How do I place an order? <span class="toggle-icon">+</span></button>
                <div class="faq-answer">
                    <p>You can browse the menu, select items, customize if needed, and proceed to checkout.</p>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-question">What if my order isn't received? <span class="toggle-icon">+</span></button>
                <div class="faq-answer">
                    <p>Please check your order status or contact customer support for assistance.</p>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelectorAll(".faq-question").forEach(button => {
            button.addEventListener("click", () => {
                const answer = button.nextElementSibling;
                answer.classList.toggle("active");
                button.querySelector(".toggle-icon").textContent = answer.classList.contains("active") ? "-" : "+";
            });
        });
    </script>
</body>
</html>
