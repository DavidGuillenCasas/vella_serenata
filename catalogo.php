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

   <!--Título que encabeza el catálogo propiamente dicho --> 
    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-9 order-2">
            <div class="row">
              <div class="col-md-12 mb-5">
                <div class="float-md-left mb-4"><h2 class="text-black h5">Selección de Instrumentos</h2></div>
               <!--  
                <div class="d-flex">
                  <div class="dropdown mr-1 ml-md-auto">
                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Categorías
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                      <a class="dropdown-item" href="#">Corda</a>
                      <a class="dropdown-item" href="#">Vento</a>
                      <a class="dropdown-item" href="#">Percusión</a>
                    </div>
                  </div>
                  <div class="btn-group">
                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuReference" data-toggle="dropdown">Reference</button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                      <a class="dropdown-item" href="#">Relevancia</a>
                      <a class="dropdown-item" href="#">Nome, A ata Z</a>
                      <a class="dropdown-item" href="#">Nome, Z ata A</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Precio, barato a caro</a>
                      <a class="dropdown-item" href="#">Precio, caro a barato</a>
                    </div>
                  </div>
                </div>
                -->

              </div>
            </div>
            <div class="row mb-5">

 <!--Sección en la que se va imprimiendo dinámicamente cada instrumento con su información alojada en la base de datos --> 
              <?php
              //creo la conexión con la base de datos
               include ('./php/conexion.php');
               /*en esta variable guardo la conexión con la consulta concreta a la bae de datos, en la cual:
               - Hago un join de la tabla productos con marcas.
               - Necesito 8 campos de la tabla productos y una de la de marcas (el nombre de la misma).
               - Sólo muestro los productos que tienen en el campo inventario 1, es decir, los que tienen stock disponible*/
               $resultado=$conexion ->query 
               ("SELECT b.id, b.nombre, b.descripcion, b.precio, b.imagen, b.inventario, b.id_categoria, a.marca, b.especificaciones  
               FROM productos b INNER JOIN marcas a ON b.id_marca = a.id WHERE b.inventario =1 ORDER BY id DESC ") Or die ($conexion -> error);
               //creo un bucle para imprimir el resultado
               while ($fila= mysqli_fetch_array($resultado)){
              ?>
               <!--Estructura Html común que se repite para cada instrumento -->
              <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                <div class="block-4 text-center border">
                  <figure class="block-4-image">
                    <a href="compra_instrumento.php?id=<?php echo $fila['id'];?>">
                    <img src="imagenes/<?php echo $fila['imagen'];?>" alt="<?php echo $fila['nombre'];?>" class="img-fluid"></a>
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="compra_instrumento.php?id=<?php echo $fila['id'];?>"><?php echo $fila['nombre'];?></a></h3>
                    <p class="mb-0"><?php echo $fila['marca'];?></p>
                    <p class="text-primary font-weight-bold"><?php echo $fila['precio'];?> Eu.</p>
                  </div>
                </div>
              </div>
            <?php }?>


            </div>
            <div class="row" data-aos="fade-up">
              <div class="col-md-12 text-center">
                <div class="site-block-27">
                  <ul>
                    <li><a href="#">&lt;</a></li>
                    <li class="active"><span>1</span></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&gt;</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

<!-- En esta parte calcularé la cantidad de instrumentos de cada categoría para luego mostrarlos -->
          <?php
              //creo la conexión a la base de datos
               include ('./php/conexion.php');
               /*hago la consulta con todos los campos a la tabla productos e incializo 
               a cero las variables para guardar las cantidades de cada categoría*/
               $resultado=$conexion ->query ("SELECT * FROM productos WHERE inventario=1 ORDER BY id DESC") OR die ($conexion -> error);
               $cantidad_cuerda=0;
               $cantidad_viento=0;
               $cantidad_percusion=0;
               // recorro el resultado y según el id de categoría aumento la varibale correspondiente
               while ($fila= mysqli_fetch_array($resultado)){
                 switch ($fila['id_categoria']) {
                    case 1:
                      $cantidad_cuerda++;
                        break;
                    case 2:
                      $cantidad_viento++;
                        break;
                    case 3:
                      $cantidad_percusion++;
                        break; }}
          ?>
<!-- Sección en la que se puede filtrar instrumentos por categorías y con la cantidad calculada enterior mete de cada una -->
          <div class="col-md-3 order-1 mb-5 mb-md-0">
            <div class="border p-4 rounded mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Categorías</h3>
              <ul class="list-unstyled mb-0">
                <li class="mb-1"><a href="#" class="d-flex"><span>Corda</span> <span class="text-black ml-auto"><?php echo $cantidad_cuerda;?></span></a></li>
                <li class="mb-1"><a href="#" class="d-flex"><span>Vento</span> <span class="text-black ml-auto"><?php echo $cantidad_viento;?></span></a></li>
                <li class="mb-1"><a href="#" class="d-flex"><span>Percusión</span> <span class="text-black ml-auto"><?php echo $cantidad_percusion;?></span></a></li>
              </ul>
            </div>
<!-- Sección en la que se puede filtrar instrumentos por rango de precios -->
            <div class="border p-4 rounded mb-4">
              <div class="mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Filtrar por precio</h3>
                <div id="slider-range" class="border-primary"></div>
                <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
              </div>

             <!-- 
              <div class="mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Medidas</h3>
                <label for="s_sm" class="d-flex">
                  <input type="checkbox" id="s_sm" class="mr-2 mt-1"> <span class="text-black">Pequeno (2,319)</span>
                </label>
                <label for="s_md" class="d-flex">
                  <input type="checkbox" id="s_md" class="mr-2 mt-1"> <span class="text-black">Medio (1,282)</span>
                </label>
                <label for="s_lg" class="d-flex">
                  <input type="checkbox" id="s_lg" class="mr-2 mt-1"> <span class="text-black">Longo (1,392)</span>
                </label>
              </div>
               -->
            <!-- <div class="mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Cor</h3>
                <a href="#" class="d-flex color-item align-items-center" >
                  <span class="bg-danger color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Red (2,429)</span>
                </a>
                <a href="#" class="d-flex color-item align-items-center" >
                  <span class="bg-success color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Green (2,298)</span>
                </a>
                <a href="#" class="d-flex color-item align-items-center" >
                  <span class="bg-info color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Blue (1,075)</span>
                </a>
                <a href="#" class="d-flex color-item align-items-center" >
                  <span class="bg-primary color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Purple (1,075)</span>
                </a>
              </div> -->

            </div>
          </div>
        </div>
<!--
        <div class="row">
          <div class="col-md-12">
            <div class="site-section site-blocks-2">
                <div class="row justify-content-center text-center mb-5">
                  <div class="col-md-7 site-section-heading pt-4">
                    <h2>Categories</h2>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
                    <a class="block-2-item" href="#">
                      <figure class="image">
                        <img src="images/women.jpg" alt="" class="img-fluid">
                      </figure>
                      <div class="text">
                        <span class="text-uppercase">Collections</span>
                        <h3>Women</h3>
                      </div>
                    </a>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
                    <a class="block-2-item" href="#">
                      <figure class="image">
                        <img src="images/children.jpg" alt="" class="img-fluid">
                      </figure>
                      <div class="text">
                        <span class="text-uppercase">Collections</span>
                        <h3>Children</h3>
                      </div>
                    </a>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
                    <a class="block-2-item" href="#">
                      <figure class="image">
                        <img src="images/men.jpg" alt="" class="img-fluid">
                      </figure>
                      <div class="text">
                        <span class="text-uppercase">Collections</span>
                        <h3>Men</h3>
                      </div>
                    </a>
                  </div>
                </div>
              
            </div>
          </div>
        </div>
-->       
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
    
  </body>
</html>