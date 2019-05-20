<?php 
session_start();

if(isset($_SESSION['id'])){
  $findUserById = "http://192.168.0.16/sonroll/usuarioWS.php/search/".$_SESSION['id'];
  $findUserDataById = file_get_contents($findUserById);
  $jsonFindById = json_decode($findUserDataById,true);
  
  foreach($jsonFindById as $value){
    $value['id'];
    $nombreCompleto = $value['nombre']." ".$value['apellidopaterno']." ".$value['apellidomaterno'].""; 

  }
}else{
  $value['id'] = "";
}


if(isset($_GET['logout'])){
  session_destroy();
  header("Location: index.php");
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
  </head>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/main.css">
  <title>Sonora Roll Sushis y más</title>
</head>

<body>
    <div class="mynav">
        <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
          <a style="color:white" class="navbar-brand" href="#">SonoraRoll</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <?php if($value['id']) {?>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="menu.php">Menú</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="sucursales.php">Sucursales</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="promociones.php">Promociones</a>
              </li>
              <li class="nav-item form-inline my-2 my-lg-0">
               <a href="carrito.php"><i class="fas fa-shopping-cart"></i></a> 
              </li>
            </ul>        
            <li class="nav-item form-inline dropdown">
              <img height="40" width="40" src="images/papas.jpg" alt="" class="circle">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"" href="#"><?php echo $nombreCompleto ?></a> 
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <form method="GET" class="form-inline my-2 my-lg-0">
                    <input class="btn btn-danger" type="submit" name="logout" value="Cerrar sesión">
                </form>
                    </div>
            </li>
            <?php }else{?>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="menu.php">Menú</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="sucursales.php">Sucursales</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="promociones.php">Promociones</a>
              </li>
            </ul>        
             <form class="form-inline my-2 my-lg-0">
             <a class="btn btn-light" role="button" href="login.php">Iniciar sesión</a>
            </form>
            <?php }?>
          </div>
        </nav>
    <div class="bd-example">
      <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img height="400px" src="images/sushi-para.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img height="400px" src="images/roll2.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>2 x 1 Martes</h5>
              <p>¡Ven y aprovecha nuestra oferta de los días martes!.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img height="400px" src="images/sushi-wallpaper.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Third slide label</h5>
              <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>
  <br>

  <br>
  <section class="section">
    <h2 style="color:#ED0000">¡El mejor sushi de la región!</h2>
    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente recusandae modi sunt natus minus eligendi
      voluptates optio aut architecto tenetur.
    </p>
  </section>
  <div class="firstP">
    <div class="ptext">
      <span class="border">
        sushi
      </span>
    </div>
  </div>

  <section class="section">
    <h2 style="color:#ED0000">No te arrepentiras de probar nuestros productos.</h2>
    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente recusandae modi sunt natus minus eligendi
      voluptates optio aut architecto tenetur.
    </p>
  </section>
  <div class="secondP">
    <div class="ptext">
      <span class="border">
        ramen
      </span>
    </div>
  </div>

  <section class="section">
    <h2 style="color:#ED0000">Ambiente familiar y amigable.</h2>
    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente recusandae modi sunt natus minus eligendi
      voluptates optio aut architecto tenetur.
    </p>
  </section>
  <div class="thirthP">
    <div class="ptext">
      <span class="border">
        snacks
      </span>
    </div>
  </div>
  <br>
 <div class="container">
   <div class="row justify-content-center">
     <div class="col-md-4">
        <div class="box">
          <div class="cards">
            <div class="content center">
              <h3>Ordena</h3>
              <i class="fas fa-phone-volume fa-5x"></i>
              <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cumque, cupiditate! Eos nesciunt perspiciatis rerum nisi est suscipit. Molestiae, laborum tempore?</p>
              <a class="btn btn-danger" role="button" href="compra.php" >Presiona aquí</a>
            </div>
          </div>
       
        </div>
     </div>
     <div class="col-md-4">
        <div class="box">
            <div class="cards">
              <img src="" alt="">
              <div class="content center">
                <h3 class="">Sucursales</h3>
                <i class="fas fa-home fa-5x"></i>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cumque, cupiditate! Eos nesciunt perspiciatis rerum nisi est suscipit. Molestiae, laborum tempore?</p>
                <a class="btn btn-danger" role="button" href="sucursales.html" >Presiona aquí</a>
              </div>
            </div>
        </div>
     </div>
     <div class="col-md-4">
        <div class="box">
            <div class="cards">
              <div class="content center">
                <h3>Menú</h3>
                <i class="fas fa-utensils fa-5x"></i>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cumque, cupiditate! Eos nesciunt perspiciatis rerum nisi est suscipit. Molestiae, laborum tempore?</p>
                  <a class="btn btn-danger" role="button" href="login.php">Presiona aquí</a>
              </div>
            </div>
          </div>
     </div>
   </div>
 </div>
  <br>
  <footer>
      <div class="container">
        <ul class="list-unstyled list-inline text-center">
          <li class="list-inline-item">
            <a href="#">
              <i class="fab fa-facebook-f"> </i>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="#">
              <i class="fab fa-twitter"> </i>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="#">
              <i class="fab fa-google-plus-g fa-x2"> </i>
            </a>
          </li>
  
        </ul>
      </div>
      <div style="color:white;" class="text-center py-3"> © 2019 Copyright: SonoraRoll
      </div>
    </footer>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
</body>

</html>