<!DOCTYPE html>
<html lang="gl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vella Serenata - Inicio Sesión</title>    
    <!-- Cargando e icono de la tienda en la parte superior de la pestaña -->
    <link rel="shortcut icon" type="image/x-icon" href="imagenes/icono.ico">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="container">
        <div class="row justify-content-md-center" style="margin-top:15%">
            <form class="col-3" method="POST" action="./php/login.php">
                <h2>Iniciar Sesión</h2>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Dirección de correo</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
                    
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Contrasinal</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="pass" required>
                    <?php
                    if(isset ($_GET['error'])){
                        echo "<h4 class='text-red'>Usuario ou contrasinal incorrectos</h4>";}
                    ?>
                </div>
                <a href="./registrarse.php">Crear unha conta nova</a> <br>
                <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                <button type="submit" class="btn btn-primary btn-lg" onclick="window.location ='inicio.php'">Salir</button>
                
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
</body>
</html>