<?php
/* Aquí enierro el código que permitirá traer la información de cada instrumento incluido en el carro de la compra.
La cual viene arrastrada por la selección del usuario en las páginas anteriores
Incialmente arranco sesión y me conecto a la base de datos*/
session_start();
include('./php/conexion.php');
//si la sesión existe, busco si ya estaba este instrumento agregado al carro de la compra
if (isset ($_SESSION['carrito'])){
  //mediante la variable encuentra, detecto si estaba el instrumento o no. La inicializo en falso
  if (isset ($_GET['id'])){    
    $a= $_SESSION['carrito'];
    $encuentra=false;
    for($i=0;$i<count($a);$i++){
      if($a[$i]['Id'] == $_GET['id']){
        //la cambio a true si coinciden los id, es decir si ya estaba en el carro
      $encuentra=true;}
    }
    /*como ya tengo el instrumento en el carro, 
    reedirecciono a la página del catálogo de instrumentos sin añadir dicho instrumento.
    IMPORTANTE: supongo que sólo tengdré una cantidad de stock de cada artículo en concreto*/
    if($encuentra == true){
      //mejorar esta parte si queremos incluir un artículo en el carrito que ya hemos incluído
      header("Location:./repetido.php");
      
    }else{
      // Compruebo si había algún otro instrumento en el carro de la compra previamente, y lo incluyo 
      $nombre="";
      $precio="";
      $imagen="";
      /*hago consulta a la base de datos seleccionando todos los campos de la tabla productos que coincidan 
      con el id del pregunto que viene insertado en la url, el cual arrastré de la página anterior*/
      $res=$conexion ->query('SELECT * FROM productos WHERE id='.$_GET['id']) or die ($conexion ->error);
      $fila =mysqli_fetch_row($res);
      //creo variables con los datos que me interesan para imprimir por pantalla posteriormente
      $nombre = $fila[1];
      $precio = $fila[3];
      $imagen = $fila[4];
   //creo un array "nuevo" con los campos del instrumento que luego mostraré por pantalla
      $aNuevo = array(
        'Id'=> $_GET ['id'],
        'Nombre'=> $nombre,
        'Precio'=> $precio,
        'Imagen'=> $imagen,
        'Cantidad'=> 1 );//en el caso de mi tienda siempre tendré sólo una cantidad en stock de cada artículo, son únicos.

        /*fusiono el nuevo instrumento recogido en el array "nuevo" con el array que contiene los instrumentos 
        ya seleccionados previamente*/
        array_push($a, $aNuevo);
        //guardo este array modificado en la variable de sesión
        $_SESSION['carrito']=$a;
    }
  }
}else {
  //Si no tengo variable de sesión, es decir si no hay nada en el carro de la compra, y entonces la creo
    if (isset ($_GET['id'])){

      $nombre="";
      $precio="";
      $imagen="";
      /*hago consulta a la base de datos seleccionando todos los campos de la tabla productos que coincidan 
      con el id del pregunto que viene insertado en la url, el cual arrastré de la página anterior*/
      $res=$conexion ->query('SELECT * FROM productos WHERE id='.$_GET['id']) or die ($conexion ->error);
      $fila =mysqli_fetch_row($res);
      //creo variables con los datos que me interesan para imprimir por pantalla posteriormente
      $nombre = $fila[1];
      $precio = $fila[3];
      $imagen = $fila[4];
      //creo un array con los campos del instrumento que luego mostraré por pantalla
      $a[] = array(
        'Id'=> $_GET ['id'],
        'Nombre'=> $nombre,
        'Precio'=> $precio,
        'Imagen'=> $imagen,
        'Cantidad'=> 1 );//en el caso de mi tienda siempre tendré sólo una cantidad en stock de cada artículo, son únicos
      //guardo estos campos de cada instrumento seleccionado en la variable de sesión
       $_SESSION['carrito']=$a;
      
    }
}
?>

<!DOCTYPE html>
<html lang="gl">
  <head>
    <title>Vella Serenata - Instrumentos Vintage </title>
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
  <!--Se incluye el título de cada campo del instrumento que se incluye en el carro de la compra--> 
    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Imaxe</th>
                    <th class="product-name">Instrumento</th>
                    <th class="product-price">Precio</th>
                    <th class="product-quantity">Cantidade</th>
                    <th class="product-total">Total</th>
                    <th class="product-remove">Borra</th>
                  </tr>
                </thead>
                <tbody>
    <!-- Al igual que en la página catalogo.php se incluirá de manera dinámica la estructura html de cada instrumento incluido en el carro--> 
                <?php 
                //creo una variable incializada a cero, que usaré para calcular el importe total del carro de la compra
                $total =0;
                //si la variable de sesión existe, la asocio a una variable que es una array que voy a recorrer
                  if(isset ($_SESSION['carrito'])){
                    $aCarrito = $_SESSION['carrito'];
                    for($i=0; $i<count($aCarrito); $i++){
                      //voy aumentando la variable total con el precio de cada instrumento
                      $total=$total+ ($aCarrito[$i]['Precio'])
                ?>
    <!-- De manera dinámica se incluye la estructura html de cada instrumento para mostrar los campos del mismo-->              
                  <tr>
                    <td class="product-thumbnail">
                      <img src="imagenes/<?php echo $aCarrito[$i]['Imagen']; ?>" alt="Imaxe do Instrumento" class="img-fluid">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black"><?php echo $aCarrito[$i]['Nombre']; ?></h2>
                    </td>
                    <td><?php echo $aCarrito[$i]['Precio']; ?> Eu</td>
                    <td><?php echo $aCarrito[$i]['Cantidad']; ?>
                      <!--
                      <div class="input-group mb-3" style="max-width: 120px;">
                        
                        <div class="input-group-prepend">
                          <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                        </div>
                        <input type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">-->

                        <!--
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                        </div>
                        
                      </div>
                      -->
                    </td>
                    <td><?php echo $aCarrito[$i]['Precio'];?> Eu</td>

                    <!-- al final de esta página mediante un script le daremos funcionalidad a este botón de eliminar el artículo-->
                    <td><a href="#" class="btn btn-primary btn-sm btnEliminar" data-id="<?php echo $aCarrito[$i]['Id'];?>">X</a></td>
                  </tr>
               <?php } } ?>

                </tbody>
              </table>
            </div>
          </form>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-6 mb-3 mb-md-0">
                    <!-- Si se pusla este botón se refresca la página y por tanto se actualiza el carrito -->
                <button class="btn btn-primary btn-sm btn-block" onclick="window.location='carro.php'">Actualiza o carro</button>
              </div>
              <div class="col-md-6">
                <!-- Si se pulsa este botón se redirecciona al catálogo para seguir comprando-->
                <button class="btn btn-outline-primary btn-sm btn-block" onclick="window.location='catalogo.php'">Continúa mercando</button>
              </div>
            </div>
            <!--
            <div class="row">
              <div class="col-md-12">
                <label class="text-black h4" for="coupon">Coupon</label>
                <p>Enter your coupon code if you have one.</p>
              </div>
              <div class="col-md-8 mb-3 mb-md-0">
                <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
              </div>
              <div class="col-md-4">
                <button class="btn btn-primary btn-sm">Apply Coupon</button>
              </div>

            </div>
            -->
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Total</h3>
                  </div>
                </div>
                <!--
                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Subtotal</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">$230.00</strong>
                  </div>
                </div>
                    -->
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Total</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <!-- Muestro el total del carro asociado a la variable creada previamente--> 
                    <strong class="text-black"><?php echo $total; ?> Eu.</strong>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <!-- al pulsar este botón, se redirecciona a la página procesar_carro.php,
                      en la que se pedirán los datos del cliente y métodos de pago--> 
                    <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='procesar_carro.php'">Procesar a compra</button>
                  </div>
                </div>
              </div>
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
  <script src="js/main.js"></script>

  <script>
    //con este script le agrego funcionalidad al botón "X" de eliminar artículos del carro de la compra
    $(document).ready(function(){
      //prevengo el evento de recargar 
      $(".btnEliminar").click(function(event){
      event.preventDefault();
      //recojo el id del artículo en esta variable
        var id= $(this).data('id');
        var boton = $(this);
        //Se la envío mediante ajax al archivo eliminarCarrito.php que contiene la lógica para eliminar el instrumento del carro
        $.ajax({
          method:'POST',
          url:'./php/eliminarCarrito.php',
          data:{
            id:id
          }
        }).done(function(respuesta){
            //borro la parte html que contiene la información del instrumento a eliminar
            boton.parent('td').parent('tr').remove();
            //muestro por pantalla el mensaje informativo
            alert(respuesta);
        });
      });
    });
    </script>

  </body>
</html>