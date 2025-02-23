<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
    <style>
        /* Full-Screen Loader */
        .loader-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: white; /* White background */
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }

        .burger {
            position: relative;
            width: 120px;
            height: 120px;
            animation: scale-burger 2s ease-in-out infinite alternate;
        }

        .bun-top, .bun-bottom, .patty, .lettuce, .cheese, .tomato {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 120px;
            border-radius: 50px;
            opacity: 0;
        }

        /* Top Bun */
        .bun-top {
            height: 45px;
            background: linear-gradient(to bottom, #f4a261, #e76f51);
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
            top: 0;
            animation: drop-ingredient 1.2s 0.1s ease-out forwards;
        }

        /* Sesame seeds */
        .bun-top::before {
            content: "";
            position: absolute;
            width: 6px;
            height: 6px;
            background: #fff;
            border-radius: 50%;
            top: 10px;
            left: 20px;
            box-shadow: 15px 5px #fff, 30px 10px #fff, 50px -5px #fff, 70px 10px #fff, 90px 5px #fff;
        }

        /* Lettuce */
        .lettuce {
            height: 15px;
            background: #4caf50;
            top: 40px;
            border-radius: 10px;
            animation: drop-ingredient 1.2s 0.3s ease-out forwards;
        }

        /* Tomato */
        .tomato {
            height: 12px;
            background: #ff4d4d;
            top: 55px;
            border-radius: 10px;
            animation: drop-ingredient 1.2s 0.5s ease-out forwards;
        }

        /* Cheese */
        .cheese {
            height: 10px;
            background: #ffcc00;
            top: 70px;
            border-radius: 5px;
            animation: drop-ingredient 1.2s 0.7s ease-out forwards;
        }

        /* Patty */
        .patty {
            height: 20px;
            background: #8b4513;
            top: 80px;
            border-radius: 10px;
            animation: drop-ingredient 1.2s 0.9s ease-out forwards;
        }

        /* Bottom Bun */
        .bun-bottom {
            height: 35px;
            background: linear-gradient(to top, #f4a261, #e76f51);
            box-shadow: 0px -5px 10px rgba(0, 0, 0, 0.2);
            bottom: 0;
            animation: drop-ingredient 1.2s 1.1s ease-out forwards;
        }

        /* Drop Animation for ingredients */
        @keyframes drop-ingredient {
            0% {
                transform: translate(-50%, -200px);
                opacity: 0;
            }
            80% {
                transform: translate(-50%, 0);
                opacity: 1;
            }
            100% {
                transform: translate(-50%, 5px);
            }
        }

        /* Scaling effect */
        @keyframes scale-burger {
            0% {
                transform: scale(1);
            }
            100% {
                transform: scale(1.05);
            }
        }

        /* Bounce effect */
        @keyframes bounce {
            0% { transform: translate(-50%, 5px); }
            50% { transform: translate(-50%, -5px) rotate(2deg); }
            100% { transform: translate(-50%, 0px); }
        }

        /* Hide loader */
        .hidden {
            display: none;
        }
    </style>
</head>
<body>

    <!-- Loader Animation -->
    <div class="loader-container" id="loader">
        <div class="burger">
            <div class="bun-top"></div>
            <div class="lettuce"></div>
            <div class="tomato"></div>
            <div class="cheese"></div>
            <div class="patty"></div>
            <div class="bun-bottom"></div>
        </div>
    </div>


    <script>
        setTimeout(function() {
            // Hide loader
            document.getElementById("loader").classList.add("hidden");
            
            // Redirect
            window.location.href = "<?php echo $location; ?>";
        }, 2000);
    </script>

</body>
</html>
