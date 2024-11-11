<?php
/*Aquí creo la lógica para el funcionamiento de esta página.
Los ASPECTOS CLAVE a tener en cuenta son:
- Recojo los artículos incluídos en el carro de la compra, los cuales vienen de la página checkout.php. 
- La información de esos artículos hay que introducirla en dos tablas de la BD de la tienda:
      - Ventas
      - Productos_venta
- Al final es necesario "destruir" el carro de la compra*/

//inicio sesión e incluyo el fichero para poder conectarme a la base de datos
session_start();
include('./php/conexion.php');
//Comprueno si tiene variable de sesión Usuario creada, es decir si ya se ha logueado y la meto en un array de datos de usuario
if(isset($_SESSION['usuario'])){
  $datos_usuario=$_SESSION['usuario'];
  /*compruebo si está creada la variable de sesión carrito, y en este caso si no lo está,
  es decir si no tiene nada en el carro de la compra redirecciono al catálogo para que comience el proceso*/
  if (!isset($_SESSION['carrito']) ){
  header('Location:./catalogo.php');}
  /*si existe la variable, tal y como hago en otros ficheros, creo un array ($a) en el que incluyo 
  la propia variable y la recorro, para posterioreme ir insertando el tabla correspondiente de
  la base de datos, los instrumentos seleccionados por el usuario en el carro de la compra, 
  es decir en este array que estoy recorriendo  */
  else{
    $a = $_SESSION['carrito'];
    //necesito crear una varibale total e inicializarla a cero.
    $total=0;
    for ($i=0;$i<count($a);$i++){
      //voy calculando el precio de la variable sumando el precio de los artículos seleccionados por el usuario para insertatlo luego en la tabla ventas
      $total =$total +($a[$i]['Precio']);}
      /*Compruebo si el correo de usuario que se ha introducido en el formulario es el mismo que el que hay en la variable de sesión, 
      es decir con el que se haya logueado previamente */
      if($_POST['c_email_address']==$datos_usuario[0]['Email']){
        //si coincide guardo su id para insertarlo en la tabla de ventas 
        $id_usuario=$datos_usuario[0]['Id_usuario'];
        //Por otro lado, creo una variable fecha y la capturo, para luego insertarla también en la tabla ventas
        $fecha= date('Y-m-d h:m:s');
        //creo la conexión a la base datos para ir insertando en la tabla ventas los datos propios de esa tabla: Id_usuario, total y fecha.
        $conexion ->query("INSERT INTO ventas (id_usuario, total, fecha) values ($id_usuario,$total, '$fecha')")or die ($conexion->$error);
        /*recojo en una variable el campo id del registro de la tabla ventas que acabo de insertar, porque lo necesitaré a continuación para insertarlo
        en la siguiente tabla de la BD*/
         $id_venta=$conexion->insert_id;

        /*vuelvo a recorrer el array con la info de los productos seleccionados en el carro de la compra,
        para ahora ir insertándolos en otra tabla, esta vez en la que se llama productos_venta*/
        for ($i=0;$i<count($a);$i++){
          //creo la conexión a la base datos para ir insertando en la tabla productos_ventas los datos propios de esa tabla: id_venta, id_producto, cantidad, subtotal.
          $conexion ->query("INSERT INTO productos_venta (id_venta, id_producto, cantidad, precio, subtotal) 
          values ( 
                $id_venta,
                 ".$a[$i]['Id']." ,
                  ".$a[$i]['Cantidad']." ,
                  ".$a[$i]['Precio']." ,
                  ".$a[$i]['Cantidad'] * $a[$i]['Precio'].")")or die ($conexion->$error);

         //En la tabla productos pongo a cero el campo inventario 
          $conexion->query("UPDATE productos SET inventario=0 WHERE id= ".$a[$i]['Id'])or die($conexion->error); }

        //Conecto con la base de datos e introduzco en la tabla "envíos" los campos necesarios extraídos de los valoresd el formulario de envío
         $conexion->query("INSERT INTO envios (pais, direccion, provincia, cp, id_venta)
        values(
            '".$_POST['country']."',
            '".$_POST['c_address']."',
            '".$_POST['c_state_country']."',
            '".$_POST['c_postal_zip']."',
              $id_venta)")or die($conexion->error);

        //una vez procesada la venta, se destruyen las variables de sesión
            unset($_SESSION['carrito']);
            unset($_SESSION['usuario']);}

      else{  
  // si no coincide con ningún usuario el correo introducido en el formulario, redirecciono para loguearse
  header('Location:./loguearse.php');}}}
 
else{
  // si no tiene variable de sesión, es decir, si no está logueado, redirecciono para loguearse
  header('Location:./loguearse.php');
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
   <?php include("./comunes/cabecera.php"); ?> 

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <span class="icon-check_circle display-3 text-success"></span>
            <h2 class="display-3 text-black">Moitas Gracias!</h2>
            <p class="lead mb-5">O teu pedido completouse.</p>
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