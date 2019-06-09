<?php
require_once 'loader.php';

$product_list = MYSQL::productList('products', $pdo);

// dd($product_list);
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/master.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles-login-register.css">
    <title>Listado Productos | TechHub</title>
    <meta charset="utf-8">
    <title></title>
</head>

<body>
    <div class="container">
        <div class="">
            <h1>Listado de Productos</h1>
        </div>

        <div class="">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Productos</th>
                        <th scope="col">Mostrar</th>
                        <th scope="col">Modificar</th>
                        <th scope="col">Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($product_list as $key => $value) : ?>
                        <tr>

                            <th scope="row"><?= $value["id"] ?></th>
                            <td><?= $value["title"]; ?></td>
                            <td><a href="showProduct.php?id=<?= $value['id']; ?>">
                                    <i class="far fa-eye"></i>
                                </a>
                            </td>
                            <td><a href="editProduct.php?id=<?= $value['id']; ?>">
                                    <i class="far fa-edit"></i>
                                </a>
                            </td>
                            <td><a href="eliminarUsuarioAdmin.php?id=<?= $value['id']; ?>">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
        </div>
    </div>
    <div class="already_user">
        <a href="index.php">Volver</a>
        <br>
        <a href="register_product.php" >Nuevo Producto</a>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>