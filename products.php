<?php
session_start();

@include 'config.php';

// cambiar el header dependiendo del tipo de sesion
if(isset($_SESSION['admin_name'])) {
   require_once('products.php');
   include("header.php");
}elseif (isset($_SESSION['user_name'])){
   require_once('products.php');
   include("header2.php");
}else{
   require_once('products.php');
   include("header_sin_reg.php");
}



if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'El producto ya se encuentra en el carrito';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
      $message[] = 'El producto a sido añadido correctamente';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/styleinicio.css">
   <link rel="stylesheet" href="css/style3.css">
</head>
<body>
   
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>
<div class = "wrapper">
        <div class = "category-filter">
            <div class = "container">
                <div class = "title">
                    <h1>AMD</h1>
                </div>

				
                <div class = "filter-btns">
                    <button type = "button" class = "filter-btn" id = "all" >Todo</button>
                    <button type = "button" class = "filter-btn" id = "Motherboard" >MotherBoard</button>
                    <button type = "button" class = "filter-btn" id = "Procesador" >Procesador</button>
                    <button type = "button" class = "filter-btn" id = "Cooler" >Cooler</button>
					      <button type = "button" class = "filter-btn" id = "RAM" >RAM</button>
					      <button type = "button" class = "filter-btn" id = "Placa_de_video" >Placa de video</button>
					      <button type = "button" class = "filter-btn" id = "Almacenamiento" >Almacenamiento</button>
					      <button type = "button" class = "filter-btn" id = "Fuente_de_Poder" >Fuente de Poder</button>
					      <button type = "button" class = "filter-btn" id = "Gabinetes" >Gabinetes</button>
					      <button type = "button" class = "filter-btn" id = "Monitores" >Monitores</button>
					      <button type = "button" class = "filter-btn" id = "Perifericos" >Perifericos</button>
                </div>

                


                <div class="container">

<section class="products">

   <h1 class="heading" style="color: white;">ELIGE TUS PRODUCTOS</h1>



   <div class="box-container">
      

      <?php
      
      $select_products = mysqli_query($conn, "SELECT * FROM `productos`");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post">
         <div class="box all <?php echo $fetch_product['product_category']; ?> filter-item">
            <img src="uploaded_img/<?php echo $fetch_product['product_image']; ?>" alt="">
            <h3 style="color: white;"><?php echo $fetch_product['product_name']; ?></h3>
            <div class="price" style="color: white;">$<?php echo $fetch_product['product_price']; ?></div>
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['product_name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['product_price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['product_image']; ?>">
           
            <input type="submit" class="btn" value="Agregar al carrito" name="add_to_cart">
         </div>
      </form>

      <?php
         };
      };
      ?>

   </div>

</section>

</div>

                    


<script src="js/script2.js"></script>

</body>
</html>