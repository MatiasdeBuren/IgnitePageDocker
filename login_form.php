

<?php


@include 'config.php';



session_start();

if(isset($_SESSION['admin_name'])){
   header('location:admin_page.php');
}

if(isset($_SESSION['user_name'])){
   header('location:user_page.php');
}


if(isset($_POST['submit'])){

   //$name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   //$cpass = md5($_POST['cpassword']);
   //$user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $row = mysqli_fetch_array($result);
      $cpass = md5($_POST['cpassword']);
      $user_type = $_POST['user_type'];
      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');
         include("header.php");

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:user_page.php');
         include("header2.php");

      }
     
   }else{
      $error[] = 'Email o contraseña incorrecta!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style2.css">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/styleinicio.css">

   <?php include 'header_sin_reg.php'; ?>
</head>
<body>

<div class="form-container">

<form action="" method="post">
   <h3>Login</h3>
   <?php
   if(isset($error)){
      foreach($error as $error){
         echo '<span class="error-msg">'.$error.'</span>';
      };
   };
   ?>
   <input type="email" name="email" required placeholder="Ingresar Email">
   <input type="password" name="password" required placeholder="Ingresar Contraseña">
   <input type="submit" name="submit" value="login now" class="form-btn">
   <p>No tenes una cuenta? <a href="register_form.php">Registrarse</a></p>
</form>


</div>  


<?php @include 'footer.php';?>
</body>


</html>