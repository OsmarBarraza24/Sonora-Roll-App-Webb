<?php 
session_start();
$chuy['activo'] = "";
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
//
$comida = "http://192.168.0.16/sonroll/comidaWS.php/";
$comidaData = file_get_contents($comida);
$jsonComida = json_decode($comidaData,true);

//Añadir a carrito
if(isset($_GET['sent'])){
  $addCart = "http://192.168.0.16/sonroll/comidaWS.php/addComidaToCart/".$_SESSION['idCarrito']."/".$_GET['idComida'];
  $addCartData = file_get_contents($addCart);
  $jsonAddCar = json_decode($addCartData);
}

//

$findActive = "http://192.168.0.16/sonroll/comidaWS.php/searchByUserIdWithCart/".$_SESSION['id']."";
$findActiveData = file_get_contents($findActive);
$jsonFindActive = json_decode($findActiveData,true); 
 foreach($jsonFindActive as $chuy){
   $chuy['activo'];
   
 }
 $error = "Ya tiene una orden activa"
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/login.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Compra</title>
</head>

<body>
  <div class="mynav">
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
      <a style="color:white" class="navbar-brand" href="#">SonoraRoll</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

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
        <?php if($value['id']){ ?>
        <li class="nav-item form-inline dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"" href=" #"><?php echo $nombreCompleto ?></a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Mi perfil</a>
            <a class="dropdown-item" href="#">Configuración de mi cuenta</a>
            <div class="dropdown-divider"></div>
            <form method="get" action="">
              <form method="GET" class="form-inline my-2 my-lg-0">
                <input class="btn btn-danger" type="submit" name="logout" value="Cerrar sesión">
              </form>
            </form>
          </div>
        </li>
        <?php }else{ ?>
        <form class="form-inline my-2 my-lg-0">
          <a class="btn btn-ligth" role="button" href="login.php">Iniciar sesión</a>
        </form>
        <?php } ?>
      </div>
    </nav>
    <br>

    <div class="container">
      <div class="row">
        <div class="col">
          <h1>Sushi</h1>
        </div>
      </div>
    </div>
    <hr>
    <div class="wuau">
    <?php foreach($jsonComida as $food) {?>
    <?php $food['nombre'] ?>
    
      <div class="card" style="width: 18rem;">
        <img src="images/hamburguesa.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?php echo $food['nombre'] ?></h5>
          <p class="card-text"><?php echo $food['descripcion'] ?></p>
          <p>Precio: <?php echo $food['precio']?> $</p>
          <form method="GET" action="">
            <input hidden name="idComida" type="text" value="<?php echo $food['id'] ?>">
            <?php 
              if($chuy['activo'] == 1){
                echo '<p style="color:red;">'.$error.'</p>'; 
              }else{?>   
            <input class="btn btn-danger" type="submit" name="sent" value="Agregar al carrito">
          </form>
              <?php } ?>
        </div>
      </div>
    <?php } ?>
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