


<!-- Navbar Section starts -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="height:80px">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="./img/icon1.jpg" alt="icon" height="80px" id="icon"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <div class="navbar-nav me-auto mb-2 mb-lg-0">
          <a class="nav-link" href="./index.php">Home</a>
          <a class="nav-link" href="./search.php">Foods</a>
          <a class="nav-link" href="./myOrders.php">My Orders</a>
          <?php if($admin){
            echo '<a class="nav-link active" href="./panel.php">Panel</a>';
          }?>
          <a class="nav-link" href="#">Help</a>
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
