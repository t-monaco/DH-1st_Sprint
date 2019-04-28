<?php

session_start();

function dd($valor){
		echo "<pre>";
		var_dump($valor);
		echo "</pre>";
		exit;
}

function rediret($param)
{
     header('Location:'.$param);
}

function validar($datos)
{
		$errores = [];
          if(isset($datos["name"]))
          {
			$name = trim($datos["name"]);
               if(empty($name))
               {
				$errores["name"] = "Campo Nombre obligatorio";
			}
          }
          
          if(isset($datos["apellido"]))
          {
			$name = trim($datos["apellido"]);
               if(empty($name))
               {
				$errores["apellido"] = "Campo Apellido obligatorio";
			}
		}

		$email = trim($datos["email"]);
          if(!filter_var($email, FILTER_VALIDATE_EMAIL))
          {
               $errores["email"]="Email invalido!!";
          }

		$password = trim($datos["password"]);
          if (isset($datos["repassword"]))
          {
			$repassword = trim($datos["repassword"]);
		}
          if (empty($password))
          {
				$errores["password"] = "Porfavor complete la contraseña";
          }
          elseif (strlen($password) < 8)
          {
			$errores["password"] = "La contraseña debe tener al menos 8 caracteres";
		}
          if(isset($repassword))
          {
               if($password != $repassword)
               {
				$errores["repassword"] = "Las contraseñas no coinciden";
			}
		}

	return $errores;

}


function inputUsuario($campo)
{
    if(isset($_POST[$campo]))
    {
        return $_POST[$campo];
    }
}

function armarRegistro($datos)
{
     $usuario = [
          "name" => $datos["name"],
          "apellido" => $datos["apellido"],
          "email" => $datos["email"],
          "password" => password_hash($datos["password"], PASSWORD_DEFAULT),
          "perfil" => 1 
     ];
     return $usuario;
}

function guardarUsuario($usuario)
{
     $json_usuario = json_encode($usuario);
     file_put_contents("usuarios.json", $json_usuario. PHP_EOL, FILE_APPEND);
}

function buscarEmail($email)
{
     $baseDatosUsuarios = abrirBaseDatos();
     foreach ($baseDatosUsuarios as $usuario) 
     {
          if($usuario["email"] == $email)
          {
			return $usuario;
		}
	}
	return null;
}

function abrirBaseDatos()
{
	$datosjson = file_get_contents("usuarios.json");
	$datosjson = explode(PHP_EOL, $datosjson );
	array_pop($datosjson);
          foreach ($datosjson as $usuario) 
          {
			$baseDatosUsuarios[] = json_decode($usuario,true);
		}
	return $baseDatosUsuarios;
}

function crearSesion($usuario, $datos)
{
     $_SESSION['name'] = $usuario['name'];
     $_SESSION['apellido'] = $usuario['apellido'];
     $_SESSION['email'] = $usuario['email'];
     $_SESSION['perfil'] = $usuario['perfil'];
     if(isset($datos["recordar"]))
     {
		setcookie("password", $datos["password"], time()+3600);
	}

}

function validarAvatar($bandera)
{
     if($bandera == "registro")
     {
          if($_FILES["avatar"]["error"]!=0){
              $errors["avatar"]="Error debe subir imagen";
          }
          $nombre = $_FILES["avatar"]["name"];
          $ext = pathinfo($nombre,PATHINFO_EXTENSION);
          if($ext != "png" && $ext != "jpg"){
              $errors["avatar"]="Debe seleccionar archivo png ó jpg";
          }
      
     }
     return $errors;
}

function armarAvatar($imagen)
{    
     $nombre = $imagen["avatar"]["name"];
     $ext = pathinfo($nombre,PATHINFO_EXTENSION);
     $archivoOrigen = $imagen["avatar"]["tmp_name"];
     $archivoDestino = dirname(__DIR__);
     $archivoDestino = $archivoDestino."/img/";
     $avatar = uniqid();
     $archivoDestino = $archivoDestino.$avatar;
     $archivoDestino = $archivoDestino.".".$ext;
     move_uploaded_file($archivoOrigen,$archivoDestino);
     $avatar = $avatar.".".$ext;
     return $avatar;
 }

 function addPhoto($usuario, $imagen)
 {
     $arrImg = ['avatar' => $imagen];
     $usuarioConFoto = array_merge($usuario, $arrImg);
     $_SESSION['avatar'] = $usuarioConFoto['avatar'];
     return $usuarioConFoto;
 }