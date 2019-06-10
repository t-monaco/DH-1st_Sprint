<?php
require_once 'loader.php';
$user = MYSQL::searchUser($_SESSION['email'], $pdo);
if (!isset($_SESSION['email'])) {
    rediret('index.php');
} else if ($_POST) {
    $errors = array();

    if (isset($_POST['first_name'])) {
        $newUser = new User(null, null, $_POST['first_name']);
        $errors = $validator->validate($newUser);
        if (count($errors) == 0) {
            MYSQL::updateFirstName($newUser->getFirstName(), $user['id'], $pdo);
            rediret('perfil.php#body');
        }
    }
    if (isset($_POST['last_name'])) {
        $newUser = new User(null, null, null, $_POST['last_name']);
        $errors = $validator->validate($newUser);
        if (count($errors) == 0) {
            MYSQL::updateLastName($newUser->getLastName(), $user['id'], $pdo);
            rediret('perfil.php#body');
        }
    }
    if (isset($_POST['email'])) {
        rediret('perfil.php#body');
    }

    if (isset($_FILES['avatar']['name']) && $_FILES['avatar']['name'] != '') {
        $errors = array();
        $errors = $validator->validateAvatar();
        if (count($errors) == 0) {
            $avatar = $avatarFactory->create($_FILES);
            $user = MYSQL::searchUser($_SESSION['email'], $pdo);
            MYSQL::updateAvatar($user, $avatar, $pdo);
            rediret('perfil.php#body');
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Perfil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/styles-perfil.css">
</head>

<body class="__perfil" id="body">
    <div class="container-fluid">
        <div class="__nav">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="index.php"><img class="__imglogo" src="img/logo_techhub_5.png" alt="logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto o_navitems">
                        <?php if (isset($_SESSION["admin"]) && $_SESSION["admin"] == 1) : ?>
                            <li class="nav-item o_navlinks">
                                <a class="nav-link o_links" href="manage_product.php">Administrar Productos</a>
                            </li>
                        <?php endif; ?>
                        <?php if (isset($_SESSION["email"])) { ?>
                            <li class="nav-item o_navlinks">
                                <a class="nav-link o_links" href="perfil.php"><?php echo "<i class='far fa-user'></i>   " . $user["first_name"]; ?></a>
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
                        <li class="nav-item o_navlinks">
                            <a class="nav-link o_links" href="faq.php"><i class="far fa-question-circle"></i> FAQ</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0 justify-content-end">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>
        </div>
    </div>
    <div class="_main_container">
        <div class="_profile_info">
            <div class="_photo" style="background-image: url('img/<?= $user['avatar'] ?>')">
                <!-- <img class="" src="" alt=""> -->
            </div>
            <div class="_info">
                <div class="_user_info">
                    <p class="_title">
                        DATOS PERSONALES
                    </p>
                    <p>
                        Nombre: <?= $user['first_name'] ?>
                        <a href="#popupFirstName"><i class="far fa-edit"></i></a>
                    </p>
                    <div id="popupFirstName" class="overlay">
                        <div id="popupBody">
                            <h2>Editar Nombre</h2>
                            <a id="cerrar" href="">&times;</a>
                            <div class="popupContent">
                                <form class="__profile_form" action="" method="POST">
                                    <input class="input_change" type="text" name="first_name" required value="" autofocus>
                                    <div class="_errors">
                                        <?php if (isset($errors["first_name"])) : ?>
                                            <?= $errors["first_name"]; ?>
                                            <br>
                                        <?php endif; ?>
                                    </div>
                                    <br>
                                    <input class="submit_button" type="submit" name="" value="Cambiar">
                                </form>
                            </div>
                        </div>
                    </div>
                    <p>
                        Apellido: <?= $user['last_name'] ?>
                        <a href="#popupLastName"><i class="far fa-edit"></i></a>
                    </p>
                    <div id="popupLastName" class="overlay">
                        <div id="popupBody">
                            <h2>Editar Apellido</h2>
                            <a id="cerrar" href="">&times;</a>
                            <div class="popupContent">
                                <form class="__profile_form" action="" method="POST">
                                    <input class="input_change" type="text" name="last_name" required value="" autofocus>
                                    <div class="_errors">
                                        <?php if (isset($errors["last_name"])) : ?>
                                            <?= $errors["last_name"]; ?>
                                            <br>
                                        <?php endif; ?>
                                    </div>
                                    <br>
                                    <input class="submit_button" type="submit" name="" value="Cambiar">
                                </form>
                            </div>
                        </div>
                    </div>
                    <p>
                        Email: <?= $user['email'] ?>
                        <a href="#popupEmail"><i class="far fa-edit"></i></a>
                    </p>
                    <div id="popupEmail" class="overlay">
                        <div id="popupBody">
                            <h2>Editar Email</h2>
                            <a id="cerrar" href="">&times;</a>
                            <div class="popupContent">
                                <form class="__profile_form" action="" method="POST">
                                    <input class="input_change" type="text" name="" required value="WOHOHO Despacio Cerebrito!">
                                    <br>
                                    <input class="submit_button" type="submit" name="" value="Cambiar">
                                </form>
                            </div>
                        </div>
                    </div>
                    <p>
                        <a class="_change_photo" href="#popupAvatar">Cambiar Foto</a>
                    </p>
                    <div id="popupAvatar" class="overlay">
                        <div id="popupBody">
                            <h2>Selecione Foto</h2>
                            <a id="cerrar" href="">&times;</a>
                            <div class="popupContent">
                                <form class="__profile_form" action="" method="POST" enctype="multipart/form-data">
                                    <input name="hidden" type="hidden" id="hidden" value="" placeholder="">
                                    <input id="_inputProfile" type="file" name="avatar" value="" />
                                    <div class="_errors">
                                        <?php if (isset($errors["avatar"])) : ?>
                                            <?= $errors["avatar"]; ?>
                                            <br>
                                        <?php endif; ?>
                                    </div>
                                    <br>
                                    <br>
                                    <input class="submit_button" type="submit" name="" value="Cambiar">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="_info2"></div>
            </div>
        </div>
    </div>
    <footer class="_footer">
        <!-- Por ahora solo lleva el fondo -->
    </footer>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>