<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}


// cambiar el header dependiendo del tipo de sesion
if(isset($_SESSION['admin_name'])) {
   require_once('user_page.php');
   include("header.php");
}elseif (isset($_SESSION['user_name'])){
   require_once('user_page.php');
   include("header2.php");
}else{
   require_once('user_page.php');
   include("header_sin_reg.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>user page</title>


  
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/style2.css">
   <link rel="stylesheet" href="css/styleinicio.css">
   
</head>
<body>
   
<div class="container">

   <div class="content">   
      <h3>Hola, <span>Usuario</span></h3>
      <h1>Bienvenido <span><?php echo $_SESSION['user_name'] ?></span></h1>
      <p>Este es su perfil</p>
      <a href="logout.php" class="btn">logout</a>
      
   </div>
</div>
      

<?php @include 'footer.php';?>
</body>
</html>