<?php

@include 'config.php';

session_start();
// cambiar el header dependiendo del tipo de sesion
if(isset($_SESSION['admin_name'])) {
   require_once('checkout.php');
   include("header.php");
}elseif (isset($_SESSION['user_name'])){
   require_once('checkout.php');
   include("header2.php");
}else{
   require_once('checkout.php');
   include("header_sin_reg.php");
}


if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $flat = $_POST['flat'];
   $street = $_POST['street'];
   $city = $_POST['city'];
   $state = $_POST['state'];
   $country = $_POST['country'];
   $pin_code = $_POST['pin_code'];

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
         $product_price = number_format($product_item['price'] * $product_item['quantity']);
         $price_total += $product_price;
      };
   };

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($conn, "INSERT INTO `order`(name, number, email, method, flat, street, city, state, country, pin_code, total_products, total_price) VALUES('$name','$number','$email','$method','$flat','$street','$city','$state','$country','$pin_code','$total_product','$price_total')") or die('query failed');

   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>Gracias por tu compra!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> total : $".$price_total."  </span>
         </div>
         <div class='customer-details'>
            <p> Nombre : <span>".$name."</span> </p>
            <p> Telefono : <span>".$number."</span> </p>
            <p> email : <span>".$email."</span> </p>
            <p> direccion : <span>".$flat.", ".$street.", ".$city.", ".$state.", ".$country." - ".$pin_code."</span> </p>
            <p> Metodo de pago : <span>".$method."</span> </p>
            <p>(*Efectivo*)</p>
         </div>
            <a href='products.php' class='btn'>Seguir comprando</a>
         </div>
      </div>
      ";
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>

 
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/styleinicio.css">

</head>
<body>



<div class="container">

<section class="checkout-form">

   <h1 class="heading">TERMINAR COMPRA</h1>

   <form action="" method="post">

   <div class="display-order">
      <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = number_format($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total = $total += $total_price;
      ?>
      <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>Tu carrito esta vacio!</span></div>";
      }
      ?>
      <span class="grand-total"> Total : $<?= $grand_total; ?> </span>
   </div>

      <div class="flex">
         <div class="inputBox">
            <span>Nombre</span>
            <input type="text" placeholder="Ingresar tu nombre" name="name" required>
         </div>
         <div class="inputBox">
            <span>Telefono</span>
            <input type="number" placeholder="Ingresar tu numero" name="number" required>
         </div>
         <div class="inputBox">
            <span>Email</span>
            <input type="email" placeholder="Ingresar tu email" name="email" required>
         </div>
         <div class="inputBox">
            <span>Metodo de pago</span>
            <select name="method">
               <option value="Efectivo" selected>Efectivo en el delivery</option>
               <option value="Mercadopago">Mercadopago</option>
               
            </select>
         </div>
         <div class="inputBox">
            <span>Calle</span>
            <input type="text"  name="flat" required>
         </div>
         <div class="inputBox">
            <span>Numero</span>
            <input type="text"  name="street" required>
         </div>
         <div class="inputBox">
            <span>Ciudad</span>
            <input type="text" placeholder="ej: Palermo" name="city" required>
         </div>
         <div class="inputBox">
            <span>Provincia</span>
            <input type="text" placeholder="ej: CABA" name="state" required>
         </div>
         <div class="inputBox">
            <span>Pais</span>
            <input type="text" placeholder="ej: Argentina" name="country" required>
         </div>
         <div class="inputBox">
            <span>Codigo Postal</span>
            <input type="text" placeholder="ej: 1425" name="pin_code" required>
         </div>
      </div>
      <input type="submit" value="Realizar Compra" name="order_btn" class="btn">
   </form>

</section>

</div>


<script src="js/script.js"></script>
<?php @include 'footer.php';?>
</body>
</html>