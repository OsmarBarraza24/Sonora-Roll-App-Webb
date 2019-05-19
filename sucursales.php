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

  $findUserById = "http://192.168.0.16/sonroll/comidaWS.php/searchByUserId/".$_SESSION['id'];
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
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
</head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
  integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="css/main.css">
</head>

<body>
  <div class="mynav">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
          <img height="30" width="30" src="images/papas.jpg" alt="" class="circle">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"" href="#"><?php echo $nombreCompleto ?></a> 
              <div style="color:black" class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Mi perfil</a>
                  <a class="dropdown-item" href="#">Configuración de mi cuenta</a>
                  <div class="dropdown-divider"></div>
                  <form method="GET" class="form-inline my-2 my-lg-0">
                    <input class="btn btn-danger" type="submit" name="logout" value="Cerrar sesión">
                </form>
                </div>
        <?php }else{?>
        </li>
         <form class="form-inline my-2 my-lg-0">
         <a class="btn btn-light" role="button" href="login.php" >Iniciar sesión</a>
        </form> 
        <?php }?>
      </div>
    </nav>
    <div class="container">
      <br>
      <div class="row justify-content-center">
        <div class="col-md-12">
          <h1 style="text-align:center">Sucursales</h1>
        </div>
      </div>
    </div>
    <br>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-5 center">
          <h2>Guaymas</h2>
          <hr>
        </div>
      </div>
      <div class="row justify-content-around">
        <div class="col-lg-4 ">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3524.9357265439085!2d-110.92961278493286!3d27.934615582698253!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86c97ac087a4add9%3A0x51f15dfbdd5378ba!2sSonora+Roll+Sushi!5e0!3m2!1sen!2smx!4v1557780490310!5m2!1sen!2smx"
            width="400px" height="350px" frameborder="0" style="border:0" allowfullscreen></iframe>
          <h3></h3>
        </div>
        <div class="col-lg-4 ">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3525.314149333442!2d-110.9013201854568!3d27.923013022588986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86c971d045a73ce9%3A0x4b84ed14b30d9492!2sSonora+Roll+Sushi+Restaruante!5e0!3m2!1sen!2smx!4v1557780584583!5m2!1sen!2smx"
            width="400" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-5 center">
          <h2>San Carlos</h2>
          <hr>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-4">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3524.1174283762816!2d-111.03743168545593!3d27.959689720965006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86c963180c1d36dd%3A0x379aef91a29b7906!2sSonora+Roll+Sushi!5e0!3m2!1sen!2smx!4v1557780670978!5m2!1sen!2smx"
            width="400" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-5 center">
          <h2>Empalme</h2>
          <hr>
        </div>
        <div class="col-lg-12 center">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3524.108440174807!2d-110.82365558545591!3d27.95996502095279!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86c971f77ac4a83b%3A0x7dcca1f85715eb87!2sMattoni%2FSonoraroll!5e0!3m2!1sen!2smx!4v1557780846390!5m2!1sen!2smx" width="400" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
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