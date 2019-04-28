<?php
	include_once("controllers/functions.php");

     if($_POST){
		$errores = validar($_POST);
		if (count($errores) == 0){
               $usuario = buscarEmail($_POST["email"]);
			if ($usuario == null){
                    $errores["email"] = "Email Invalido";
			}else{
				if(password_verify($_POST["password"], $usuario["password"]) === FALSE){
						$errores["password"] = "Email y/o constraseña incorrectos";
				}
               }
               if (count($errores) == 0)
               {
                    $usuario = buscarEmail($_POST["email"]);
                    crearSesion($usuario, $_POST);
                    header("location: navbar.php");
               }
		}
	}
 ?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Iniciar Sesión | techHUB</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles-login-register.css">
</head>
<body>
     
     <header class="container_header">
          <img class="img_logo" src="img/logo_techhub_5.png" alt="logo">
     </header>
     <main>
          <div class="container_login">
               <div class="form_header">
                    <div class="signup_title">
                         Iniciar Sesión
                    </div>
                    <div class="already_user">
                         ¿Nuevo en Amazon?
                    <a href="register.php">Regístrate</a>
                    </div>
               </div>
               <div class="login_section">
                    <div class="form_content">
                         <form class="form_signup" action="" method="post">
                              <div class="email">
                                   <input class="input_change" type="email" name="email" value="" required>
                                   <label>Email</label>

                                   <span class="errores">
                                        <?php
                                        if(isset($errores["email"])):?>
                                             <?="*".$errores["email"];?>
                                        <?php endif;?>
                                   </span>

                              </div>
                              <div class="pass">
                                   <input class="input_change" type="password" name="password" value="" required>
                                   <label>Contraseña</label>

                                   <span class="errores">
                                        <?php
                                        if(isset($errores["password"])):?>
                                             <?="*".$errores["password"];?>
                                        <?php endif;?>
                                   </span>

                              </div>
                              <div class="remmember">
                                   <input class="remmember_checkbox" type="checkbox" name="recordar" value="Recuerdame">Recuérdame
                                   <a href="#">¿Olvido su Contraseña?</a>
                              </div>
                              <input class="submit_button_login" type="submit" name="" value="Iniciar Sesión">
                         </form>
                    </div>
                    <div class="divider_login">
                    <!-- linea vertical -->
                    </div>
                    <div class="o-xs-login d-lg-none">
                         <div class="separador_horizontal"></div>
                         <div class="texto-separador">O utiliza</div>
                         <div class="separador_horizontal"></div>
                    </div>
                    <div class="login_social">
                         <a class="href_facebook" href="#">
                              <div class="facebook">
                                   <div class="facebook_icon">
                                        <i class="fab fa-facebook-f"></i>
                                   </div>
                                   Continuar con Facebook
                              </div>
                         </a>
                         <a class="href_google" href="#">
                              <div class="google">
                                   <div class="google_icon">
                                   <i class="fab fa-google"></i>
                                   </div>
                                   Continuar con Google
                              </div>
                         </a>
                    </div>
               </div>
          <!-- <div class="signup_social_focus">
          <div class="facebook_mini_icon">
               <i class="fab fa-facebook-f"></i>
          </div>
          <div class="google_mini_icon">
               <i class="fab fa-google"></i>
          </div>
          </div> -->
          </div>
     </main>
</body>
</html>
