<?php

@include 'config.php';

session_start();
// cambiar el header dependiendo del tipo de sesion
if(isset($_SESSION['admin_name'])) {
   require_once('index.php');
   include("header.php");
}elseif (isset($_SESSION['user_name'])){
   require_once('index.php');
   include("header2.php");
}else{
   require_once('index.php');
   include("header_sin_reg.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styleinicio.css">
</head>

<body style="background-color:#111;">
    <div class="banner-l">
        <div class="banner-osc">          
            <h1 id="ignite" class="tituloinicio">IGNITE</h1>
        </div>
    </div>
    <div class="padre">
    <div class="banner-g">
        <div style="display: flex; justify-content: flex-start;">
            <h1 class="ind-tit" >Gaming</h1>
        </div>
        <img class="ban-im-g img-ind" src="https://www.yellow.com.mt/sys/articles/1043/5fd9f5f1b274a_5d6e22a706194gamingsetup.jpg">
        <div class="text-g">Dada la demanda de este tipo de computadoras, nos dedicamos especialmente al armado de PCs 'gaming', con componentes aptos para todo tipo de juegos. Ofrecemos la opcion de armar tu propia PC para aquellos usuarios experimentados, que saben que
            es lo que buscan para intentar llevar el nivel de juego por encima del resto.
        </div>
    </div>
    <div class="banner-t">
        <div style="display: flex; justify-content: flex-end;">
            <h1 id="tit-t" class="ind-tit">Aspecto Laboral</h1>
        </div>
        <img class="ban-im-t img-ind" src="https://s3.envato.com/files/193973017/16_80_51_Busy_Group_of_People_working_in_Business_office.jpg">
        <div class="text-t">Con la actual pandemia, esta compañía ofrece tambien opciones de computadoras con especificaciones más accesibles pero aptas para el trabajo remoto y desde la casa, lo que es ideal para la situación que esta atrevasando el mundo.
        </div>
    </div>

    </div>
    
    <?php @include 'footer.php';?>
</body>
</html>