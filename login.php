<?php
session_start();
$user['id'] = "";
if(isset($_POST['sent'])){
  
  $loginUser = "http://192.168.0.16/sonroll/usuarioWS.php/login/".$_POST['contrasena']."/".$_POST['email']."";
  $dataLoginUser = file_get_contents($loginUser);
  $jsonLoginUser = json_decode($dataLoginUser, true);
  foreach($jsonLoginUser as $user){
    $_SESSION['id'] = $user['id'];
    header("Location: index.php");
    }
}
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Inicia sesión</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" href="css/main.css">
      <link rel="stylesheet" href="css/login.css">
    </head>
<html>    
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
                    <a class="nav-link" href="menu.html">Menú</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="sucursales.html">Sucursales</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="promociones.html">Promociones</a>
                  </li>
                  <li class="nav-item form-inline my-2 my-lg-0">
                   <a href=""><i class="fas fa-shopping-cart"></i></a> 
                  </li>
                </ul>
                <?php if($user['id']){ ?>
                <li class="nav-item form-inline dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"" href="#">Osmar Barraza Flores</a> 
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="#">Mi perfil</a>
                          <a class="dropdown-item" href="#">Configuración de mi cuenta</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Cerrar sesión</a>
                        </div>                  
                </li>
                <?php }else{ ?>
                <form class="form-inline my-2 my-lg-0">
                  <button type="button" class="btn btn-light">Iniciar sesión</button>
                </form>
                <?php } ?>
              </div>
            </nav>

        <div class="login">
            <h2>Inicia sesión</h2>
            <form method="post">
                <div class="inputBox">
                    <input type="text" name="email" required="">
                    <label>Correo</label>
                </div>
                <div class="inputBox">
                    <input type="password" name="contrasena" required="">
                    <label>Contraseña</label>
                </div>
                <input type="submit" name="sent" value="Entrar">
            </form>
            <a href="registro.php">¿No tienes cuenta? Registrate aquí</a>
        </div>

    
        

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
