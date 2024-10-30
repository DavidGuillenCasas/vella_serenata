<?php
/*Aquí creo la lógica para el funcionamiento de esta página.
Los ASPECTOS CLAVE a tener en cuenta son:
- Recojo los artículos incluídos en el carro de la compra, los cuales vienen de la página cart.php. 
- Tendré que pintar por pantalla esos artículos en el sitio dedicado a ello.
- Tengo que recoger los datos del cliente que se incluyen en el formulario del pedido.
- Tengo que conectar con el pago seleccionado
- Si todo está correcto al pulsar "Finaliza o Pedido", redirecciono a la página 'final_compra.php', la cual completará la transacción con la base de datos*/

//inicio la sesión
session_start();
//si la variable de sesión no está creada, redirección al índice.
if(!isset($_SESSION['carrito'])){
  header('Location: ./catalogo.php');
}
//si la variable está creada, la meto dentro de un array que usaré más abajo para imprimir los artículos.
else{
$aCarrito =$_SESSION['carrito'];}
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
    <form action="./final_compra.php" method="post">
      <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12">
            <!--
            <div class="border p-4 rounded" role="alert">
              Returning customer? <a href="#">Click here</a> to login
            </div>
            -->
          </div>
        </div>
        <!-- Comienzo datos del envío-->
        <div class="row">
            <div class="col-md-6 mb-5 mb-md-0">
            <h2 class="h3 mb-3 text-black">Información de envío</h2>
            <div class="p-3 p-lg-5 border">
              <div class="form-group">
                <label for="c_country" class="text-black">País<span class="text-danger">*</span></label>
                <select id="c_country" class="form-control" name="country" required>
                  <option value="">-- Selecciona un país-- </option>    
                  <option value="España">España</option>    
                  <option value="Portugal">Portugal</option>        
                </select>
              </div>
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="c_fname" class="text-black">Nome<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_fname" name="c_fname"  required>
                </div>
                <div class="col-md-6">
                  <label for="c_lname" class="text-black">Apelidos<span class="text-danger" >*</span></label>
                  <input type="text" class="form-control" id="c_lname" name="c_lname" required>
                </div>
              </div>
            <!--
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_companyname" class="text-black">Nome empresa </label>
                  <input type="text" class="form-control" id="c_companyname" name="c_companyname">
                </div>
              </div>
            -->
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_address" class="text-black">Dirección<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_address" name="c_address" placeholder="rúa, número, escaleira, piso..."  required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="c_state_country" class="text-black">Provincia<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_state_country" name="c_state_country"  required>
                </div>
                <div class="col-md-6">
                  <label for="c_postal_zip" class="text-black">C.P.<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_postal_zip" name="c_postal_zip"  required>
                </div>
              </div>

              <div class="form-group row mb-5">
                <div class="col-md-6">
                  <label for="c_email_address" class="text-black">Dirección de email <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_email_address" name="c_email_address"  required>
                </div>
                <div class="col-md-6">
                  <label for="c_phone" class="text-black">Número de teléfono <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_phone" name="c_phone" placeholder="Número de teléfono"  required>
                </div>
              </div>
               
              <div class="form-group">
                <label for="c_create_account" class="text-black" data-toggle="collapse" href="#create_an_account" role="button" aria-expanded="false" aria-controls="create_an_account"><input type="checkbox" value="1" id="c_create_account"> Crea unha conta de usuario/a?</label>
                <div class="collapse" id="create_an_account">
                  <div class="py-2">
                    <p class="mb-3">Crea una conta introducindo os teus datos a continuación.</p>
                    <div class="form-group">
                      <label for="c_account_password" class="text-black">Contrasinal</label>
                      <input type="password" class="form-control" id="c_account_password" name="c_account_password" placeholder="">
                    </div>
                  </div>
                </div>
              </div>

             <!--
              <div class="form-group">
                <label for="c_ship_different_address" class="text-black" data-toggle="collapse" href="#ship_different_address" role="button" aria-expanded="false" aria-controls="ship_different_address"><input type="checkbox" value="1" id="c_ship_different_address"> Ship To A Different Address?</label>
                <div class="collapse" id="ship_different_address">
                  <div class="py-2">

                    <div class="form-group">
                      <label for="c_diff_country" class="text-black">País <span class="text-danger">*</span></label>
                      <select id="c_diff_country" class="form-control" name="pais">
                      <option value="1">Selecciona un país</option>    
                      <option value="2">España</option>    
                     <option value="3">Portugal</option>   
                      </select>
                    </div>


                    <div class="form-group row">
                      <div class="col-md-6">
                        <label for="c_diff_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_diff_fname" name="c_diff_fname">
                      </div>
                      <div class="col-md-6">
                        <label for="c_diff_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_diff_lname" name="c_diff_lname">
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <div class="col-md-12">
                        <label for="c_diff_companyname" class="text-black">Company Name </label>
                        <input type="text" class="form-control" id="c_diff_companyname" name="c_diff_companyname">
                      </div>
                    </div>
                     
                    <div class="form-group row">
                      <div class="col-md-12">
                        <label for="c_diff_address" class="text-black">Address<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_diff_address" name="c_diff_address" placeholder="Street address">
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-md-6">
                        <label for="c_diff_state_country" class="text-black">State / Country <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_diff_state_country" name="c_diff_state_country">
                      </div>
                      <div class="col-md-6">
                        <label for="c_diff_postal_zip" class="text-black">Posta / Zip <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_diff_postal_zip" name="c_diff_postal_zip">
                      </div>
                    </div>

                    <div class="form-group row mb-5">
                      <div class="col-md-6">
                        <label for="c_diff_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_diff_email_address" name="c_diff_email_address">
                      </div>
                      <div class="col-md-6">
                        <label for="c_diff_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_diff_phone" name="c_diff_phone" placeholder="Número de teléfono">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              -->
              <div class="form-group">
                <label for="c_order_notes" class="text-black">Anotacións</label>
                <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Escribe indicacións adicionáis aquí..."></textarea>
              </div>

            </div>
          </div>
          <div class="col-md-6">
       
             <!-- Final datos del envío-->
             <!-- Comnienzo datos del pedido--> 
            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">O teu pedido</h2>
                <div class="p-3 p-lg-5 border">
                  <table class="table site-block-order-table mb-5">
                    <thead>
                      <th>Instrumento</th>
                      <th>Total</th>
                    </thead>
                    <tbody>

                    <?php
                    /*aquí es donde creo la lógica para imprirmir los artículos seleccionados en el carro de la compra
                    Primero creo una variable total, que recogerá el total de todos los artículos del carro.
                    La inicializo a cero*/ 
                     $total =0;
                     //Creo un bucle para recorrer el array que creé al principio de esta página en el cual está incluida la variable de sesión
                     for($i=0; $i<count($aCarrito); $i++){
                      //en la variable total, voy sumando el precio de cada artículo
                      $total=$total+ ($aCarrito[$i]['Precio']);
                      /*dentro de este bucle voy imprimiendo de cada artículo:
                       - la estructura html
                       - los valores de cada artículo*/
                       ?>     

                      <tr>
                        <td><?php echo $aCarrito[$i]['Nombre'];?></td>
                        <td><?php echo $aCarrito[$i]['Precio'];?> Eu.</td>
                      </tr>

                       <?php
                      //final de cada vuelta del bucle for
                        }?>

                      <!--
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Subtotal</strong></td>
                        <td class="text-black">$350.00</td>
                      </tr>
                     -->

                      <tr>
                        <td class="text-black font-weight-bold"><strong>Total do pedido</strong></td>
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
                        <p class="mb-0">Fai o teu pago directamente na nosa conta bancaria. Utiliza o teu ID de pedido como referencia de pago. O teu pedido non se enviará ata que se eliminen os fondos na nosa conta.</p>
                      </div>
                    </div>
                  </div>
                      <!--Final de las formas de pago-->  

                  <div class="form-group">
                    <button class="btn btn-primary btn-lg py-3 btn-block" type="submit">Finaliza o pedido</button>
                  </div>

                </div>
              </div>
            </div>

          </div>
          
      
        </div>
        
      </div>
      </div>
    </form>
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

  <script src="js/main.js"></script>
    
  </body>
</html>