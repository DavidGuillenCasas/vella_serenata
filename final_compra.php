
<?php

if (isset($_GET['id_venta']) && isset ($_GET['metodo'])){
include('./php/conexion.php');
//inserto en la tabla pagos el método y el id de la venta
$conexion->query (" INSERT INTO pagos (metodo, id_venta)
values(
'".$_GET['metodo']."',
".$_GET['id_venta'].")") or die ($conexion->error);

//redirecciono a esta misma página pero mostrando el id de la venta.
header ('Location: ./final_compra.php?id_venta='.$_GET['id_venta']);

}
?>

<!-- Capa visualización de la página-->
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
   <?php include("./comunes/cabecera.php");
     //incluyo conexión a BD
     include('./php/conexion.php');
     //consulto la tabla de envío s para guardar en una variable el número de envío y mostrarlo luego
      $id_venta=$_GET['id_venta'];
      $datos=$conexion->query (" SELECT * FROM envios WHERE id_venta='$id_venta'") or die ($conexion->error);
      $datos_envio= mysqli_fetch_row($datos);
      $id_envio=$datos_envio[0];
   
   ?> 

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <span class="icon-check_circle display-3 text-success"></span>
            <h2 class="display-3 text-black">Moitas Gracias!</h2>
            <p class="lead mb-5">O túa compra completouse.</p>
            <p class="lead mb-5">O envío co número : <?php echo $id_envio;?> está en camino</p>
            <p><a href="catalogo.php" class="btn btn-sm btn-primary">Volta a tenda</a></p>
          </div>
        </div>
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