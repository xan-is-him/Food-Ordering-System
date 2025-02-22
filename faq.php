<?php
    require_once 'php/basic.php';
    reqLogin();
    $title = "FAQ";
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
            padding: 20px 30px;
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
        .faq-section {
            margin-top: 20px;
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
        .toggle-icon {
            font-size: 20px;
            font-weight: bold;
        }
        footer {
            margin-top: 50px;
            padding: 20px 0;
            text-align: center;
            background-color: #333;
            color: white;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="./img/icon1.jpg" alt="icon" id="icon"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <div class="navbar-nav me-auto mb-2 mb-lg-0">
                    <a class="nav-link" href="./index.php">Home</a>
                    <a class="nav-link" href="./search.php">Foods</a>
                    <a class="nav-link" href="./myOrders.php">My Orders</a>
                    <?php if($admin){ echo '<a class="nav-link" href="./panel.php">Panel</a>'; }?>
                    <a class="nav-link" href="./help.php">Help</a>
                    <a class="nav-link active" href="./faq.php">FAQ</a>
                    <a class="nav-link" href="./aboutus.php">About Us</a>
                </div>
                <span class="navbar-text">
                    <?php if($logined){ echo '<a href="./logout.php">Logout</a>'; }else{ echo '<a href="./login.php">Login</a>'; } ?>
                </span>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1>Frequently Asked Questions</h1>
        <div class="faq-section">
            <div class="faq-category">General Questions</div>
            <div class="faq-item">
                <button class="faq-question">How do I place an order using this system? <span class="toggle-icon">+</span></button>
                <div class="faq-answer">
                    <p>You can browse the menu on the screen, select your items, customize them if needed, and proceed to checkout. After payment, your order will be sent directly to the kitchen.</p>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-question">Is my order automatically sent to the kitchen? <span class="toggle-icon">+</span></button>
                <div class="faq-answer">
                    <p>Yes, once you confirm, your order is immediately sent to the kitchen, reducing wait times.</p>
                </div>
            </div>
            <div class="faq-category">Menu & Customization</div>
            <div class="faq-item">
                <button class="faq-question">I have food allergies. How can I check for allergens in the menu items? <span class="toggle-icon">+</span></button>
                <div class="faq-answer">
                    <p>Each menu item includes a description. If you need more details, please ask a staff member.</p>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-question">Do you offer vegetarian, vegan, or gluten-free options? <span class="toggle-icon">+</span></button>
                <div class="faq-answer">
                    <p>Yes, you can filter the menu for vegetarian, vegan, and gluten-free options while ordering.</p>
                </div>
            </div>
            <div class="faq-category">Payment & Pricing</div>
            <div class="faq-item">
                <button class="faq-question">What payment methods do you accept? <span class="toggle-icon">+</span></button>
                <div class="faq-answer">
                    <p>We accept credit/debit cards, mobile payments (Apple Pay, Google Pay), and cash for in-person orders.</p>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 Online Food Ordering System. All Rights Reserved.</p>
    </footer>
</body>
</html>