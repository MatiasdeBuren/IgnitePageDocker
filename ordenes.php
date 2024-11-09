<?php

@include 'config.php';

session_start();
// cambiar el header dependiendo del tipo de sesion
if(isset($_SESSION['admin_name'])) {
   require_once('ordenes.php');
   include("header.php");
}elseif (isset($_SESSION['user_name'])){
   require_once('ordenes.php');
   include("header2.php");
}else{
   require_once('ordenes.php');
   include("header_sin_reg.php");
}

?>



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/style2.css">
   <link rel="stylesheet" href="css/styleinicio.css">
   <link rel="stylesheet" href="css/tabla.css">
   
  
</head>
<body>
<br>
<h1 style="font-size:40px; margin-left:50px;">Lista de Pedidos</h1>
<div class="div2">
<table class="content-table">
    <tr>
        <td>id</td>
        <td>nombre</td>
        <td>apellido</td>
        <td>email</td>
        <td>telefono</td>	
        <td>Calle</td>
        <td>Numero</td>
        <td>ciudad</td>
        <td>Cod Postal</td>
        <td>productos</td>
        <td>Total</td>
    </tr>

    <?php 
    $sql="SELECT * from `order`";
    $result=mysqli_query($conn,$sql);

    while($mostrar=mysqli_fetch_array($result)){
     ?>

    <tr>
        <td><?php echo $mostrar['id'] ?></td>
        <td><?php echo $mostrar['name'] ?></td>
        <td><?php echo $mostrar['number'] ?></td>
        <td><?php echo $mostrar['email'] ?></td>
        <td><?php echo $mostrar['method'] ?></td>
        <td><?php echo $mostrar['flat'] ?></td>
        <td><?php echo $mostrar['street'] ?></td>
        <td><?php echo $mostrar['state'] ?></td>
        <td><?php echo $mostrar['pin_code'] ?></td>
        <td><?php echo $mostrar['total_products'] ?></td>
        <td><?php echo $mostrar['total_price'] ?></td>
    </tr>
<?php 
}
 ?>
</table>
</div>

    
   

<?php @include 'footer.php';?>
</body>

</html>