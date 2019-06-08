<?php
require_once 'loader.php';

if (!isset($_SESSION['email'])) {
    rediret('index.php');
} else if ($_POST) {
    $erros = array();
    $errors = $validator->validateAvatar();
    if (count($errors) == 0) {
        $avatar = $avatarFactory->create($_FILES);
        $user = MYSQL::searchUser($_SESSION['email'], $pdo);
        MYSQL::updateAvatar($user, $avatar, $pdo);
    }
}
$user = MYSQL::searchUser($_SESSION['email'], $pdo);
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

<body class="__perfil">
    <div class="container-fluid">
        <div class="__nav">
            <?php if (isset($_SESSION["email"])) { ?>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="index.php"><img class="__imglogo" src="img/logo_techhub_5.png" alt="logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto o_navitems">
                            <li class="nav-item o_navlinks">
                                <a class="nav-link o_links" href="perfil.php"><?php echo "<i class='far fa-user'></i> " . $_SESSION["first_name"]; ?></a>
                            </li>
                            <li class="nav-item o_navlinks">
                                <a class="nav-link o_links" href="faq.php"><i class="far fa-question-circle"></i> FAQ</a>
                            </li>
                            <li class="nav-item o_navlinks">
                                <a class="nav-link o_links" href="logout.php"><i class="fas fa-sign-out-alt"></i> Salir</a>
                            </li>

                        </ul>
                        <form class="form-inline my-2 my-lg-0 justify-content-end">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                </nav>

            <?php } else { ?>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="index.php"><img class="__imglogo" src="img/logo_techhub_5.png" alt="logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto o_navitems">
                            <li class="nav-item o_navlinks">
                                <a class="nav-link o_links" href="login.php"><i class="fas fa-sign-in-alt"></i> Ingresar</a>
                            </li>
                            <li class="nav-item o_navlinks">
                                <a class="nav-link o_links" href="register.php"><i class="fas fa-pen"></i> Registrarme</a>
                            </li>
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
            <?php } ?>
        </div>
    </div>
    <div class="__main_container">
        <div class="__profile_photo">
            <img src="img/<?= $user['avatar'] ?>" alt="Avatar">
            <form class="__profile_form" action="" method="POST" enctype="multipart/form-data">
                <input class="__invisibleInput" name="nombre" type="text" id="nombre" value=" " placeholder="" />
                <label class="__select_photo" for="__profile_file">Selecione Foto Perfil</label>
                <input id="__profile_file" type="file" name="avatar" value="" />
                <br>
                <input class="__submit_button" type="submit" name="" value="Subir Foto">
            </form>
        </div>
        <div class="__separador">
            <!-- -----LINEA----- -->
        </div>
        <div class="__profile_info">
            <div class="title">
                Datos Personales
            </div>
            <div class="__name">
                Nombre: <?= $user['first_name'] ?>
                <a href="">
                    <i class="far fa-edit"></i>
                </a> </div>
            <div class="__apellido">
                Apellido: <?= $user['last_name']; ?>
                <a href="">
                    <i class="far fa-edit"></i>
                </a>
            </div>
            <div class="__email">
                Email: <?= $user['email']; ?>
                <a href="">
                    <i class="far fa-edit"></i>
                </a>
            </div>
        </div>
    </div>

    <?php
    if (isset($errors["avatar"])) : ?>
        <?= $errors["avatar"]; ?>
    <?php endif; ?>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>