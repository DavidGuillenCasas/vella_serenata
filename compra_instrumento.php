<?php 
/* Aquí enierro el código que permitirá sacar la información de la base de datos para visualizarla en la estructura de la página de manera dinámica
para poder conectar con la base de datos, llamo al archivo de conexión*/
  include ("./php/conexion.php");

/*Si muestra el campo id por el método get en la barra del navegador
consulta con la base de datos el artículo que tenga ese id, si no mata la conexión*/
 if ( isset($_GET['id'])){
  /*en esta variable guardo la conexión con la consulta concreta a la bae de datos, en la cual:
    - Hago un join de la tabla productos con marcas
    - Necesito 8 campos de la tabla productos y una de la de marcas (el nombre de la misma).*/
  $resultado=$conexion ->query 
  ("SELECT b.id, b.nombre, b.descripcion, b.precio, b.imagen, b.inventario, 
  b.id_categoria, a.marca, b.especificaciones  FROM productos b INNER JOIN marcas a ON b.id_marca = a.id 
  WHERE b.id=".$_GET['id']) Or die ($conexion -> error);

//Si hay resultado, lo guardamos en una variable para visualizarla más tarde
if (mysqli_num_rows ($resultado) > 0 ){
    $fila = mysqli_fetch_row($resultado);
 }else{
  //si no hay resultado, redirecciono al índice
   header("Location:./catalogo.php"); }
  
  }else{
  //si no está creada la varibale de sesión, aquí también, redirecciono al índice
  header("Location:./catalogo.php");
 }
?>

<!-- Código html-->
<!DOCTYPE html>
<html lang="gl">
  <head>
  <title>Vella Serenata - Instrumentos Vintage</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <!-- Cargando el icono de la tienda en la parte superior de la pestaña -->
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

 <!--Después de traer todos los datos de la base de datos en el código php al comienzo de esta página,
 lo incluimos de manera dinámica en la estructura Html --> 
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img src="imagenes/<?php echo $fila[4]; ?>" alt="<?php echo $fila[1]; ?>" class="img-fluid">
          </div>
          <div class="col-md-6">
            <h2 class="text-black"><?php echo $fila[1]; ?></h2>
            <h4 class="text-black"><?php echo $fila[7]; ?></h4>
            <p><?php echo $fila[2]; ?></p>
            <h5 class="text-black">Especificacións</h5>
            <p><?php echo $fila[8]; ?></p>
            <p><strong class="text-primary h4"><?php echo $fila[3]; ?> Eu.</strong></p>

    <!--Con este botón llevo la info del id del instrumento en la url de carro.php y además redirecciono hacia esa página  -->          
        <p><a href="carro.php?id=<?php echo $fila[0]; ?>" class="buy-now btn btn-sm btn-primary ">Engadir ó Carro</a></p>
            </div>
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