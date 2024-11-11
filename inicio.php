<?php
//cierro la sesión si viene por método get indicado tal y como he programado en el login y en el registro de usuario
  session_start();
  /*if(isset ($_GET['cierre_sesion'])){
    unset($_SESSION['carrito']);
    unset($_SESSION['usuario']);}*/
?>
<!DOCTYPE html>
<html lang="gl">
  <head>
    <title>Vella Serenata - Instrumentos Vintage</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">
  
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
  
  <div class="site-wrap">
<!--Se incluye la cabecera con elementos comunes --> 
    <?php include("./comunes/cabecera.php"); ?> 
<!--Sección con imagen y texto de bienvenida/presentación de la página -->
    <div class="site-section border-bottom" data-aos="fade">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6">
            <div class="block-16">
              <figure>
                <img src="imagenes/banner_img_01.jpg" alt="imaxe fábrica" class="img-fluid rounded">
              </figure>
            </div>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-5">
        <div class="site-section-heading pt-3 mb-4">
            <h2 class="text-black">Benvido/a a Vella Serenata</h2>
            </div>
              <p>Somos uns namorados dos instrumentos que marcaron unha época e que che transportarán 
                a tempos onde a xente dedicábase a tocar para escapar, aínda que fora só por un intre, da súa dura realidade.</p>
            </div>
        </div>
      </div>

    <!--Botón que redirecciona al catálogo de instrumentos -->
      <div class="row justify-content-center" >
          <button class="btn btn-primary btn-lg" onclick="window.location='catalogo.php'">Catálogo de Instrumentos</button>
      </div>
    </div>

 <!--Se incluye el pie con elementos comunes --> 
    <?php include("./comunes/pie.php"); ?> 
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/funciones.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>