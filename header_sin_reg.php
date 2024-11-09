<?php include 'config.php';?>

<header class="header">

   <div class="flex">

    <div class="menu-div-logoI">
            <img style="margin: auto; height: 120px;" src="images/logo-ignite.png">
        </div>

      <nav class="navbar">
      <a href="index.php">Inicio</a>
      <a href="products.php">AMD</a>
      <a href="Intel.php">Intel</a>
        <a href="login_form.php">Log in</a>
      </nav>

      <?php
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>

      <a href="cart.php" class="cart">cart <span><?php echo $row_count; ?></span> </a>

      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>