<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>E-Commerce</title>
  </head>
  <body>
    <div class="container-fluid">
      <header>
        <?php if (isset($_SESSION["email"])) { ?>
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><img class="__imglogo" src="img/logo_techhub_5.png" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto o_navitems">                
                <li class="nav-item o_navlinks">
                  <a class="nav-link o_links" href="perfil.php"><?php echo "<i class='far fa-user'></i> ".$_SESSION["name"];?></a>
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
            <a class="navbar-brand" href="#"><img class="__imglogo" src="img/logo_techhub_5.png" alt="logo"></a>
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
  
        <br>
        <div id="carouselExampleFade" class="carousel slide carousel-fade d-none d-lg-flex" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="img/car01.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="img/car02.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="img/car03.jpg" class="d-block w-100" alt="...">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>



        <a href="#" class="d-flex btn btn-primary __todos" >Ver Catalogo Completo</a>

        <hr>        
        <div class="__ofertas row">
          <div class="d-flex card col-12 col-md-4 col-lg-3 __itemoferta" style="width: 18rem;">
            <img src="img/laptop1.jpg" class="card-img-top __imgofertas" alt="...">
            <div class="card-body o_cardbody">
              <p class="card-text o_tituloitems">Laptop ASUS ROG i7</p>

              <a href="#" class="d-flex btn btn-primary __comprar">$1500.00</a>
            </div>
          </div>
            <div class="card col-12 col-md-4 col-lg-3 __itemoferta" style="width: 18rem;">
              <img src="img/ryzen1.jpg" class="card-img-top __imgofertas" alt="...">
              <div class="card-body">
                <p class="card-text o_tituloitems">Microprocesador Ryzen 7</p>
                <a href="#" class="d-flex btn btn-primary __comprar">$ 500.00</a>
              </div>
            </div>
            <div class="card col-12 col-md-4 col-lg-3 __itemoferta" style="width: 18rem;">
              <img src="img/drone1.jpg" class="card-img-top __imgofertas" alt="...">
              <div class="card-body">
                <p class="card-text o_tituloitems">Drone</p>
                <a href="#" class="d-flex btn btn-primary __comprar" >$ 400.00</a>
              </div>
            </div>
            <div class="d-none d-md-flex card col-12 col-md-4 col-lg-3 __itemoferta" style="width: 18rem;">
              <img src="img/laptop1.jpg" class="card-img-top __imgofertas" alt="...">
              <div class="card-body">
                <p class="card-text o_tituloitems">Laptop ASUS ROG i7</p>
                <a href="#" class="d-flex btn btn-primary __comprar">$1500.00</a>
              </div>
            </div>
              <div class="d-none d-md-flex card col-12 col-md-4 col-lg-3 __itemoferta" style="width: 18rem;">
                <img src="img/ryzen1.jpg" class="card-img-top __imgofertas" alt="...">
                <div class="card-body">
                  <p class="card-text o_tituloitems">Microprocesador Ryzen 7</p>
                  <a href="#" class="d-flex btn btn-primary __comprar">$ 500.00</a>
                </div>
              </div>
              <div class="d-none d-md-flex card col-12 col-md-4 col-lg-3 __itemoferta" style="width: 18rem;">
                <img src="img/drone1.jpg" class="card-img-top __imgofertas" alt="...">
                <div class="card-body">
                  <p class="card-text o_tituloitems">Drone</p>
                  <a href="#" class="d-flex btn btn-primary __comprar" >$ 400.00</a>
                </div>
              </div>
        </div>
    </header>

      <div class="d-flex">
        <footer class="piedepag row">
          <article class="sucursales col-12 col-md-4 __artpie">
            <h4>Sucursales</h4>
            <p>Centro</p>
            <p>Av. de Mayo 1234</p>
            <br>
            <p>Palermo</p>
            <p>Serrano 1234</p>

          </article>
          <article class="sucursales col-12 col-md-4 __artpie">
            <h4>Contacto</h4>
            <p>E-Mail</p>
            <a href="mailto:support@techhub.com"><i class="far fa-envelope"></i> support@techhub.com</a>
            <br>
            <br>
            <p>Teléfono</p>
            <a href="tel:08109997000"><i class="fas fa-phone"></i> 0810-999-7000</a>            
          </article>
          <article class="sucursales col-12 col-md-4 __artpie">
            <h4>Mi cuenta</h4>
            <a href="login.php"><i class="fas fa-sign-in-alt"></i> Ingresar</a>
            <br>
            <a href="register.php"><i class="fas fa-pen"></i> Registracion</a>
            <br>
            <a href="faq.php"><i class="far fa-question-circle"></i> FAQ</a>
            <br>
            <a href="#"><i class="fas fa-shopping-cart"></i> Mi Carrito</a>

          </article>
        </footer>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
