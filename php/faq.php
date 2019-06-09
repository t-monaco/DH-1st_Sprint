<?php
require_once 'loader.php';

if (isset($_SESSION['email'])) {
    if ($_POST) {
        $user = $db->search(Session::get('email'));
        $newEmail = EmailFactory::send($_POST, $user);
    }
}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Preguntas Frecuentes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/styles-adriano.css">
</head>

<body>
    <div class="container-fluid">
        <div class="__nav">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="index.php"><img class="__imglogo" src="img/logo_techhub_5.png" alt="logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto o_navitems">                            
                        <?php if (isset($_SESSION["email"])) { ?>
                            <?php if ($_SESSION["admin"] == 1): ?>
                                <li class="nav-item o_navlinks">
                                    <a class="btn btn-dark" href="manage_product.php">Administrar Productos</a>
                                </li>
                            <?php endif; ?>
                        <li class="nav-item o_navlinks">
                            <a class="nav-link o_links" href="perfil.php"><?php echo "<i class='far fa-user'></i>   " . $_SESSION["first_name"]; ?></a>
                        </li>
                        <li class="nav-item o_navlinks">
                            <a class="nav-link o_links" href="logout.php"><i class="fas fa-sign-out-alt"></i> Salir</a>
                        </li>
                        <?php } else { ?>
                            <li class="nav-item o_navlinks">
                            <a class="nav-link o_links" href="login.php"><i class="fas fa-sign-in-alt"></i> Ingresar</a>
                        </li>
                        <li class="nav-item o_navlinks">
                            <a class="nav-link o_links" href="register.php"><i class="fas fa-pen"></i> Registrarme</a>
                        </li>
                        <?php } ?>
                    </ul>
                    <form class="form-inline my-2 my-lg-0 justify-content-end">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>

        </div>
        <section class="row  text-left __QUS_container">
            <article class="col-12  ">
                <legend>
                    <h1>Preguntas Frecuentes</h1>
                </legend>
                <br>
                <div class="p-r">
                    <p class="__pregunta" tabindex="0">
                        ¿Como puedo contactar con atención al cliente?
                    </p>
                    <p class="__respuesta">
                        Para ponerte en contacto con nuestro servicio de atención al cliente puedes llamarnos al 43425961 de Lunes a Viernes de 08:00 a 18:00 hs
                    </p>
                </div>
                <br>
                <div class="p-r">
                    <p class="__pregunta" tabindex="0">
                        ¿Donde puedo encontrar información sobre ofertas especiales?
                    </p>
                    <p class="__respuesta">
                        Cada "página de producto" muestra, el precio, y en su caso, promociones aplicables.
                    </p>
                </div>


                <br>
                <div class="p-r">
                    <p class="__pregunta" tabindex="0">
                        ¿Como pago las compras realizadas en la tienda online?
                    </p>
                    <div class="__respuesta">
                        <p>
                            Durante el proceso de compra podrás hacer uso de los siguientes métodos de pago para poder realizar tu pedido:
                        </p>
                        <ul>
                            <li>Tarjeta VISA, Mastercard o American Express</li>
                            <li>MercadoPago</li>
                        </ul>
                    </div>
                </div>
                <br>
                <div class="p-r">
                    <p class="__pregunta" tabindex="0">
                        ¿Puedo financiar mi compra?
                    </p>
                    <p class="__respuesta">
                        Si, en la tienda online. Siempre que se cumplan los requisitos establecidos por la entidad financiera para cada importe, los clientes pueden establecer sus pagos a través de cómodas cuotas. Puedes encontrar toda la información relativa a la financiación y el proceso en <a href="https://www.hipervinculo.com">Cuotas</a>
                    </p>
                </div>

                <br>
                <div class="p-r">
                    <p class="__pregunta" tabindex="0" tabindex="0">
                        ¿Como puedo comprobar el estado de mi pedido?
                    </p>
                    <p class="__respuesta">
                        Puedes comprobar el estado de tu pedido a través de la web o el móvil. Inicia sesión en la tienda online de dirígete a "Mis pedidos" para comprobar los datos de tu pedido.
                    </p>
                </div>

                <br>

                <div class="p-r">
                    <p class="__pregunta" tabindex="0">
                        ¿Como puedo cancelar o modificar un pedido?
                    </p>
                    <div class="__respuesta">
                        <p>
                            Puedes cancelar tu pedido si no se ha iniciado el proceso de preparación en nuestro almacén. Para ello,sólo tienes que seguir los siguientes pasos.
                        </p>
                        <ol>
                            <li>Ir a mis pedidos</li>
                            <li>Inicia sesión con tu cuenta</li>
                            <li>Haz click en "cancelar"</li>
                        </ol>
                    </div>
                </div>

                <br>
                <div class="otrasPreguntas">
                    <form class="__form_otrasPreguntas" action="" method="POST">
                        <label>
                            Otras Preguntas
                        </label>
                        <textarea id="textarea" name="new_questions" id="vaciones" cols="50"></textarea>
                        <button class="btn-buttom btn-primary" type="submit">Enviar</button>
                    </form>
                </div>

            </article>
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>