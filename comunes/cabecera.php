<header class="site-navbar" role="banner">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
              <form action="./busqueda.php" class="site-block-top-search" method="GET">
                <span class="icon icon-search2"></span>
                <input type="text" class="form-control border-0" placeholder="Búsqueda" name="texto">
              </form>
            </div>

            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <div class="site-logo">
                <a href="inicio.php" class="js-logo-clone">Vella Serenata</a>
              </div>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
                <ul>
                 <li>
                  <a href="loguearse.php">
                  <span class="icon icon-person"></span></a></li>
                 <li>
                    <a href="carro.php" class="site-cart">
                      <span class="icon icon-shopping_cart"></span>
                      <span class="count">
                        <?php
                        //aquí intruduzco el algoritmo para que muestre el número de artículos al lado del icono del carrito
                          if (isset ($_SESSION['carrito'])){
                            echo count($_SESSION['carrito']);
                          }else{
                            echo 0;
                          }?>
                     </span>
                    </a>
                  </li> 
                  <?php
                        //aquí intruduzco el algoritmo para que muestre el número de artículos al lado del icono del carrito
                          if (isset ($_SESSION['usuario'])){
                            echo "<a href='./php/cerrar_sesion.php'>Cerrar Sesión</a>";
                          }?>
                  <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                </ul>
              </div> 
            </div>

          </div>
        </div>
      </div> 
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li>
              <a href="inicio.php">Inicio</a>
            </li>
            <li>
              <a href="sobre_nos.php">Sobre Nós</a>
            </li>
            <li><a href="catalogo.php">Catálogo de Instrumentos</a></li>
            <li><a href="contacto.php">Contacta</a></li>
          </ul>
        </div>
      </nav>
    </header>

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="inicio.php">Inicio</a> <span class="mx-2 mb-0">/</span>
           <strong class="text-black">Compra</strong></div>
        </div>
      </div>
    </div>