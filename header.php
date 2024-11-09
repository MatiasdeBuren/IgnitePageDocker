<header class="header">

   <div class="flex">

      <a href="index.php" class="logo">Ignite</a>
      
      <nav class="navbar">
      <a href="admin_Intel.php">add Intel</a>
         <a href="index.php">Inicio</a>
         <a href="admin.php">add AMD</a>
         <a href="products.php">AMD</a>
         <a href="Intel.php">Intel</a>
         <a href="admin_page.php">Perfil</a>
      </nav>

      <?php
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>

      <a href="cart.php" class="cart">cart <span><?php echo $row_count; ?></span> </a>

      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>