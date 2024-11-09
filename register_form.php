
<?php
session_start();
// cambiar el header dependiendo del tipo de sesion
if(isset($_SESSION['admin_name'])) {
   require_once('register_form.php');
   include("header.php");
}elseif (isset($_SESSION['user_name'])){
   require_once('register_form.php');
   include("header2.php");
}else{
   require_once('register_form.php');
   include("header_sin_reg.php");
}

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style2.css">
   <link rel="stylesheet" href="css/styleinicio.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Registrarse</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="Ingresa tu nombre">
      <input type="email" name="email" required placeholder="Ingresa tu email">
      <input type="password" name="password" required placeholder="Ingresa tu contraseña">
      <input type="password" name="cpassword" required placeholder="Confirma tu contraseña">
      <select name="user_type">
         <option value="user">user</option>
         
      </select>
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>Ya tenes una cuenta? <a href="login_form.php">Loguearse</a></p>
   </form>

</div>

</body>
<?php @include 'footer.php';?>
</html>