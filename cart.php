<?php

@include 'config.php';
//cantidades
if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
   if($update_quantity_query){
      header('location:cart.php');
   };
};
//borrar
if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");
   header('location:cart.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart`");
   header('location:cart.php');
}

// cambiar el header dependiendo del tipo de sesion
if(isset($_SESSION['admin_name'])) {
   require_once('cart.php');
   include("header.php");
}elseif (isset($_SESSION['user_name'])){
   require_once('cart.php');
   include("header2.php");
}else{
   require_once('cart.php');
   include("header_sin_reg.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>carrito</title>

   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/styleinicio.css">

</head>
<body>



<div class="container">

<section class="shopping-cart">

   <h1 class="heading">CARRITO DE COMPRAS</h1>

   <table>

      <thead>
         <th>imagen</th>
         <th>Producto</th>
         <th>precio</th>
         <th>cantidad</th>
         <th>Total</th>
         <th>Eliminar</th>
      </thead>

      <tbody>

         <?php 
         
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         ?>

         <tr>
            <td><img src="uploaded_img/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_cart['name']; ?></td>
            <td>$<?php echo number_format($fetch_cart['price']); ?></td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['id']; ?>" >
                  <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['quantity']; ?>" >
                  <input type="submit" value="Actualizar" name="update_update_btn">
               </form>   
            </td>
            <td>$<?php echo $sub_total = number_format($fetch_cart['price'] * $fetch_cart['quantity']); ?></td>
            <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('Remover producto del carrito?')" class="delete-btn"> <i class="fas fa-trash"></i> Borrar</a></td>
         </tr>
         <?php
           $grand_total += $sub_total;  
            };
         };
         ?>
         <tr class="table-bottom">
            <td><a href="products.php" class="option-btn" style="margin-top: 0;">Continuar comprando</a></td>
            <td colspan="3">Subtotal</td>
            <td>$<?php echo $grand_total; ?></td>
            <td><a href="cart.php?delete_all" onclick="return confirm('Estas seguro de que queres eliminar todo?');" class="delete-btn"> <i class="fas fa-trash"></i> Eliminar todo </a></td>
         </tr>

      </tbody>

   </table>

   <div class="checkout-btn">
      <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">Realizar la compra</a>
   </div>

</section>

</div>
   

<script src="js/script.js"></script>
<?php @include 'footer.php';?>
</body>
</html>