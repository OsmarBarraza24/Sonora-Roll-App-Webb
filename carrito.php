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
    <title>Carrito</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/login.css">
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
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"" href=" #"><?php echo $nombreCompleto ?></a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Mi perfil</a>
                        <a class="dropdown-item" href="#">Configuración de mi cuenta</a>
                        <div class="dropdown-divider"></div>
                        <form method="GET" class="form-inline my-2 my-lg-0">
                    <input class="btn btn-danger" type="submit" name="logout" value="Cerrar sesión">
                </form>
                    </div>
                </li>
                <?php }else{ ?>
                    <a class="btn btn-light" role="button" href="login.php" >Iniciar sesión</a>
                <?php } ?>
            </div>
        </nav>

        <div class="car">
            <div class="row">
                <div class="col-md-3">
                    <h4>Carrito</h4>
                    <hr>
                </div>
            </div>
            <br>

            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                <h1>¡No tienes nada en tu carrito!</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h4>¿Por qué mejor no vas a comprar algo ;)?</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1">
                    <p>Producto</p>
                </div>
                <div class="col-md-2">
                    <div class="p">Descripción</div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-auto">
                    <img height="100" width="100" src="images/dedosq.jpg" alt="">
                </div>
                <div class="col-md-auto">
                    <h5>Dedos de queso</h5>
                    <br>
                    <div class="col-md-auto">
                        <p>Sabrosanos dedos de queso, parecidos a los que hacia tu puta madre, pruebalos.</p>
                    </div>
                </div>
                <div class="col-md-auto align-self-center">
                    <h5>50$</h5>
                </div>
                <div class="col-md-auto align-self-center">
                    <a class="btn btn-light" href="">Eliminar</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-auto">
                    <img height="100" width="100" src="images/dedosq.jpg" alt="">
                </div>
                <div class="col-md-auto">
                    <h5>Dedos de queso</h5>
                    <br>
                    <div class="col-md-auto">
                        <p>Sabrosanos dedos de queso, parecidos a los que hacia tu puta madre, pruebalos.</p>
                    </div>
                </div>
                <div class="col-md-auto align-self-center">
                    <h5>50$</h5>
                </div>
                <div class="col-md-auto align-self-center">
                    <a class="btn btn-light" href="">Eliminar</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-auto">
                    <img height="100" width="100" src="images/dedosq.jpg" alt="">
                </div>
                <div class="col-md-auto">
                    <h5>Dedos de queso</h5>
                    <br>
                    <div class="col-md-auto">
                        <p>Sabrosanos dedos de queso, parecidos a los que hacia tu puta madre, pruebalos.</p>
                    </div>
                </div>
                <div class="col-md-auto align-self-center">
                    <h5>50$</h5>
                </div>
                <div class="col-md-auto align-self-center">
                    <a class="btn btn-light" href="">Eliminar</a>
                </div>
            </div>
            <hr>
            <div class="row justify-content-center">
                <div class="col">
                    <h3>
                        Total:
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h3>
                        300$
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a class="btn btn-danger" href="sucursales.html">Pagar</a>
                </div>
            </div>
        </div>
        .
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