<?php
//creo la conexión con la base de datos
include ('./php/conexion.php');
if (!isset($_GET['texto'])){
    header("Location: ./catalogo.php"); }
else{
/*creo una variable que dará título al parámetro de la búsqueda y con un switchs le asigno un valor según el id de la consulta de la categoría
y si no le asigno el texto que he usado como parámetro de categoría. Lo hago así para que valga tanto para el campo de búsqueda cpomo para el filtro de categoría*/
  $busqueda="";
  switch($_GET['texto']){
    case "1": $busqueda="Corda";
    break;
    case "2": $busqueda="Vento";
    break;
    case "3": $busqueda="Percusión";
    break;
    default: $busqueda=$_GET['texto'];
  }  
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
                <div class="float-md-left mb-4"><h2 class="text-black h5">Selección de resultados para <?php  echo $busqueda;?></h2></div>
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
              
               /*en esta variable guardo la conexión con la consulta concreta a la bae de datos, en la cual:
               - Hago un join de la tabla productos con marcas
               - Necesito 8 campos de la tabla productos y una de la de marcas (el nombre de la misma).
               - Incluyo varias coincidencias con la variable Texto que vienen por el método GET:
                        - Coincidencia con el campo nombre
                        - Coincidencia con el campo descripción
                        - Coincidencia con el campo especificaciones
                        - Coincidencia con el campo marca
                - Tienen que tener obligatoria mente el valor  1 en el campo inventario*/
               $resultado=$conexion ->query 
               ("SELECT b.id, b.nombre, b.descripcion, b.precio, b.imagen, b.inventario, b.id_categoria, a.marca, b.especificaciones  
               FROM productos b INNER JOIN marcas a ON b.id_marca = a.id WHERE (
               b.nombre LIKE '%".$_GET['texto']. "%' OR
               b.id_categoria LIKE '%".$_GET['texto']. "%' OR
               a.marca LIKE '%".$_GET['texto']. "%') AND b.inventario =1 " ) Or die ($conexion -> error);
                //incluyo un condicional,el cual muestra por pantalla los resultadoa de la búsqueda con el sigueinte bucle, que se explica
               if (mysqli_num_rows($resultado) > 0){
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
            <?php } }
            //Si no encuentra resultados para la búsqueda, se muestra un mensaje indicativo
                else { echo '<h2> Non temos resultados para a túa búsqueda<h2>';}
            ?>


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


<!-- Sección en la que se puede filtrar instrumentos por categorías y con la cantidad calculada enterior mete de cada una -->
<div class="col-md-3 order-1 mb-5 mb-md-0">
            <div class="border p-4 rounded mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Categorías</h3>
              <ul class="list-unstyled mb-0">
              <?php 
              //Hago una consulta a la tabla de categorías para que me las muestre todas de manera dinámica posteriormente
              $resultado= $conexion->query("SELECT * FROM categorias ");
              while ($fila=mysqli_fetch_array($resultado)){
              ?>  
                <li class="mb-1"><a href="./busqueda.php?texto=<?php echo $fila['id'] ?>" class="d-flex"><span><?php echo $fila['nombre'];?></span> 
                <span class="text-black ml-auto">
                  <?php
                  /*Encierro la lógica para colcular cuantos registros hay de cada categoría cogiendo el i de categoría
                  de la consulta anterior y así me cuenta los registros de cada producto dentro de la misma categoría*/
                  $resultado2=$conexion->query("SELECT COUNT(*) FROM productos WHERE inventario =1 AND id_categoria=".$fila['id'] );
                  $fila2=mysqli_fetch_row($resultado2);
                echo $fila2[0];?>
                </span></a></li>
              <?php }?> 
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