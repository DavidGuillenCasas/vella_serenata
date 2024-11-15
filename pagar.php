<?php
/*Aquí creo la lógica para el funcionamiento de esta página.
Los ASPECTOS CLAVE a tener en cuenta son:
- Darle a elegir al usuario el método de pago (actualmente sólo tenog implementado e integrado Paypal
- Recoger el id de la venta porque lo necesitaré para extraer el total de la misma 
y mostrarlo, tanto en la página, como en la pasarela de paypal
- Completar el pago con un usuario sandbox de paypal. */

//inicio la sesión
include('./php/conexion.php');
//
if(!isset($_GET['id_venta'])){
  header('Location: ./catalogo.php');
}
//
else{
  //le asigno a una variable el id de la venta que he psado por GET en la URL
  $id_venta=$_GET['id_venta'];
  //Hago consulta a la base de datos con el id de la venta  
  $datos =$conexion->query("SELECT * FROM ventas WHERE id='$id_venta'");
  $datos_venta= mysqli_fetch_row($datos);
  //Guardo el total de la venta para mostrar en pantalla
  $total=$datos_venta[2];
}
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
<!-- Aquí introducimos el script para el paypal como método de pago-->  
     <script src="https://www.paypal.com/sdk/js?client-id=AcZi5FyVfjogLBjxcI1rHI_tmNLVG_NFXbq0_meW-ljekEtr4TxbivekahiKubIFkLijYk78mSIN-cQT">
        
    </script>
  <div class="site-wrap">
    <!--Se incluye la cabecera con elementos comunes -->
    <?php include("./comunes/cabecera.php"); ?> 
      <div class="site-section">
       <div class="container">
        <div class="row mb-5">
          <div class="col-md-12">
          </div>
        </div>
 
             <!-- Comnienzo datos del pedido--> 
            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">O teu pedido</h2>
                <div class="p-3 p-lg-5 border">
                  <table class="table site-block-order-table mb-5">
                    <thead>
                      <th>Concepto</th>
                      <th>Total</th>
                    </thead>
                    <tbody>

                  
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Total da compra</strong></td>
                        <!--Imprimo el total del pedido-->
                        <td class="text-black font-weight-bold"><strong><?php echo $total;?> Eu.</strong></td>
                      </tr>
                    </tbody>
                  </table>
                  <!-- Final datos del pedido-->
                      <!--Comienzo de las formas de pago-->
                  <div class="border p-3 mb-3">
                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">Transferencia Bancaria</a></h3>

                    <div class="collapse" id="collapsebank">
                      <div class="py-2">
                        <p class="mb-0">Fai o teu pago directamente na nosa conta bancaria. Utiliza o teu ID de pedido como referencia de pago. O teu pedido non se enviará ata que se eliminen os fondos na nosa conta.</p>
                      </div>
                    </div>
                  </div>
                  <div class="border p-3 mb-5">
                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsepaypal" role="button" aria-expanded="false" aria-controls="collapsepaypal">Paypal</a></h3>

                    <div class="collapse" id="collapsepaypal">
                      <div class="py-2">
                        <p class="mb-0"></p>
                      </div>

                      <!--Botón de paypal -->
                      <div id="paypal-button-container"></div>
                    </div>
                  </div>
                      <!--Final de las formas de pago-->  
                </div>
              </div>
            </div>
          </div>
        </div>
       </div>
      </div>

<!-- Se incluye el pie con elementos comunes -->
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

   <!--Ponemos el script con la lógica de javascript para agregarle la funcionalidad al botón de paypal-->
    <script>
        paypal.Buttons({
            // Este script es copiado de la documentación proporcionada por paypal para integrarlo en la tienda
            createOrder: function (data,actions) {
              return actions.order.create({
                purchase_units:[{
                  amount:{
                    //muestro el total de la venta en la pasarela de paypal
                    value:'<?php echo $total;?>'
                    }
                  }]
              });
          },
          onApprove: function(data, actions){
            return actions.order.capture().then( function(details) {
              console.log (details);
              if(details.status == 'COMPLETED'){
                //redirecciono a la página del final del proceso con el Id de la venta en la url y mostrando el método de pago 
                location.href="./final_compra.php?id_venta=<?php echo $_GET['id_venta'];?>&metodo=paypal";
              }
              alert('Pago comoletado por ' + details.payer.name.given_name);
            });
          }
        }).render('#paypal-button-container');
    </script>

  </body>
</html>