<?php
     include_once("controllers/functions.php");

     if(!isset($_SESSION['email']))
     {
          rediret('index.php');
     }
     else if ($_POST)
     {
          $erros = array();
          $errors = validarAvatar('registro');
          if(count($errors) == 0)
          {
               $avatar = armarAvatar($_FILES);
               $usuario = buscarEmail($_SESSION["email"]);
               $usuarioConFoto = addPhoto($usuario, $avatar);
          }
     }
?>


<!DOCTYPE html>
<html lang="en">
     <head>
          <meta charset="utf-8">
          <title>Perfil</title>
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link href=“https://fonts.googleapis.com/css?family=Raleway:300,400,500,700” rel=“stylesheet”>
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
          <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700" rel="stylesheet">
          <link rel="stylesheet" href="css/styles-perfil.css">
        </head>
<body class="__perfil">
     <div class="__main_container">
          <div class="__profile_photo">
               <img src="img/<?=$_SESSION["avatar"];?>" alt="Avatar">
               <form action="" method="POST" enctype= "multipart/form-data"  >
                    <input class="__unVisibleInput" name="nombre" type="text" id="nombre"  value=" " placeholder="" />
                    <input  type="file" name="avatar" value=""/>
                    <br>
                    <input class="submit_button_login" type="submit" name="" value="Enviar">
               </form>
          </div>
          <div class="__profile_info">
               <div class="__name">
                    Nombre: <?=$_SESSION['name'];?>
               </div>
               <div class="__apellido">
                     Apellido: <?=$_SESSION['apellido'];?>
               </div>
               <div class="__email">
                    Email: <?=$_SESSION['email'];?>
               </div>
          </div>
     </div>

     <?php
          if(isset($errors["avatar"])):?>
               <?=$errors["avatar"];?>
     <?php endif;?>

</body>
</html>