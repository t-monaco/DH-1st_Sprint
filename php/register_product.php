<?php
require_once 'loader.php';
$categories = MYSQL::categoriesList($pdo);
// dd($categories);

if ($_POST) {

    // dd($_POST);
    $product = new Product($_POST['title'], $_POST['price'], $_POST['category'], $_POST['description']);
    $productAvatar = $avatarFactory->create($_FILES);
    $productArray = $productFactory->create($product, $productAvatar);
    // dd($productArray);
    MYSQL::saveProduct($productArray, $pdo);

    rediret('manage_product.php');
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrate | techHUB</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles-login-register.css">
</head>

<body>
    <main>
        <div class="container_signup">
            <div class="form_header">
                <div class="signup_title">
                    Registrar Producto
                </div>
            <br>
            </div>
            <div class="signup_section">
                <div class="form_content">
                    <form class="form_signup" action="" method="post" enctype="multipart/form-data">
                        <div class="title">
                            <input class="input_change" type="text" name="title" required value="">
                            <label>Titulo</label>
                        </div>
                        <div class="price">
                            <input class="input_change" type="decimal" min="0" max="999999" name="price" required value="">
                            <label>Precio</label>
                        </div>
                        <div class="select">
                            <select name="category" id="slct">
                                <option selected disabled>Seleccione una Categoria</option>
                                <?php foreach ($categories as $category) : ?>
                                    <option value="<?= $category['id'] ?>">
                                        <?= $category['name'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="description">
                            <textarea placeholder="Breve descipccion del producto" name="description" id="" cols="30" rows="10" value=""></textarea>
                        </div>

                        <label class="file">
                            <input type="file" id="file" name="avatar" aria-label="File browser example">
                            <span class="file-custom"></span>
                        </label>
                        <input class="submit_button" type="submit" name="" value="Subir Producto">
                    </form>
                </div>
            </div>
        </div>
        <!-- <div class="already_user">
                <a href="manage_product.php">Volver</a>
            </div> -->
        <a href="manage_product.php">Volver</a>

    </main>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>