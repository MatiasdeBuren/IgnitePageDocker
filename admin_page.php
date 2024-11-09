<?php

@include 'config.php';

session_start();
//seguridad para q no se puede entrar desde cualquier lado
if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}
// cambiar el header dependiendo del tipo de sesion
if(isset($_SESSION['admin_name'])) {
   require_once('admin_page.php');
   include("header.php");

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/style2.css">
   <link rel="stylesheet" href="css/styleinicio.css">
  
</head>
<body>

   
<div class="container">

   <div class="content">
      <h3>Hola, <span>admin</span></h3>
      <h1>Bienvenido <span><?php echo $_SESSION['admin_name'] ?></span></h1>
      <p>Panel de control</p>
      

      <button id="button" class="btn" style="margin-bottom:5px;">Desplegar Herramientas</button>

<div id="response">

</div>
   </div>

</div>
<?php @include 'footer.php';?>
</body>
<script src="js/ajax.js"></script>
</html>