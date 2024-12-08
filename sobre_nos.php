<?php
//inicio sesión 
  session_start();  
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
    <!--Se incluye logo oficial y textos de descripción de la tienda --> 
    <div class="site-section border-bottom" data-aos="fade">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6">
            <div class="block-16">
              <figure>
                <img src="imagenes/icono.svg" alt="Logo tenda" class="img-fluid rounded">
                <a href="#"><span class="ion-md-play"></span></a>
              </figure>
            </div>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-5">
            <div class="site-section-heading pt-3 mb-4">
              <h2 class="text-black">Sobre nós</h2>
            </div>
              <p>Vella Serenata foi xestada polo desexo de amosar á xente esas pezas de madeira e metal case esquecidas durante anos nos trasteiros.
                 Nun tempo no que no que coidar o noso entorno e os seus recursos naturais é primordial,
                  tamén xurde a necesidade de recuperar obras de arte feitas para perdurar.</p>
            </div>
        </div>
      </div>
    </div>
      <!--Sección de marcas --> 
    <div class="site-section border-bottom" data-aos="fade">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Marcas</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-3">
      <!--Primera marca --> 
            <div class="block-38 text-center">
              <div class="block-38-img">
                <div class="block-38-header">
                  <a href="busqueda.php?texto=Cincinnati">
                  <img src="imagenes/brand_01.png" alt="Image placeholder" class="mb-4"></a>
                  <h3 class="block-38-heading h4">Cincinnati Wahsboards Co.</h3>
                  <p class="block-38-subheading">Arxentina</p>
                </div>
                <div class="block-38-body">
                  <p>Corría 1944 no Mar de plata, Arxentina. Lucho e o seu curmán Rodri, un enxeñeiro industrial, amañaron una táboa de lavar rota
                     e un anaco de metal antes dun concerto, e así naceu una compañia moi popular de Washboards. </p>
                </div>
              </div>
            </div>
          </div>
      <!--Segunda marca --> 
          <div class="col-md-6 col-lg-3">
            <div class="block-38 text-center">
              <div class="block-38-img">
                <div class="block-38-header">
                  <a href="busqueda.php?texto=National">
                  <img src="imagenes/brand_02.png" alt="Image placeholder" class="mb-4"></a>
                  <h3 class="block-38-heading h4">National Resophonic</h3>
                  <p class="block-38-subheading">USA</p>
                </div>
                <div class="block-38-body">
                  <p>A National String Instrument Corporation foi a primeira compañía en fabricar as guitarras resonadoras orixinais. 
                    Máis adiante produciu ukeleles resonadores e mandolinas resonadoras...  </p>
                </div>
              </div>
            </div>
          </div>
      <!--Tercera marca --> 
          <div class="col-md-6 col-lg-3">
            <div class="block-38 text-center">
              <div class="block-38-img">
                <div class="block-38-header">
                <a href="busqueda.php?texto=Kalamazoo">
                  <img src="imagenes/brand_03.png" alt="Image placeholder" class="mb-4"></a>
                  <h3 class="block-38-heading h4">Kalamazoo</h3>
                  <p class="block-38-subheading">USA</p>
                </div>
                <div class="block-38-body">
                  <p>Kalamazoo é o nome de dúas liñas de instrumentos diferentes producidas por Gibson.
                     Ambas liñas sempre foron económicas. Hoxe en día é case imposible de atopar. </p>
                </div>
              </div>
            </div>
          </div>
       <!--Cuarta marca -->   
          <div class="col-md-6 col-lg-3">
            <div class="block-38 text-center">
              <div class="block-38-img">
                <div class="block-38-header">
                 <a href="busqueda.php?texto=Hohner">
                  <img src="imagenes/brand_04.png" alt="Image placeholder" class="mb-4"></a>
                  <h3 class="block-38-heading h4">Hohner</h3>
                  <p class="block-38-subheading">Alemania</p>
                </div>
                <div class="block-38-body">
                  <p>Orixinalmente a empresa Hohner Musikinstrumente GmbH & Co. KG foi constituida no ano 1857 por Matthias Hohner. </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
         
   <!--Sección servicios adicionales --> 
    <div class="site-section site-section-sm site-blocks-1 border-0" data-aos="fade">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
            <div class="icon mr-4 align-self-start">
              <span class="icon-truck"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Envío en 24h</h2>
              <p>Eficiencia nos envíos. E ademáis, completamente protexidos e asegurados, para que os recibas con total seguridade.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
            <div class="icon mr-4 align-self-start">
              <span class="icon-refresh2"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Proba sen compromiso</h2>
              <p>Achégate a experimentar o tacto e o son dos instrumentos. Asesorámoste nas túas inquietudes.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
            <div class="icon mr-4 align-self-start">
              <span class="icon-help"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Buscamos por ti</h2>
              <p>Se tes algunha peza en mente que non a temos no catálogo, escríbenos, non o dubides. Sempre andamos á procura de pezas novas.</p>
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