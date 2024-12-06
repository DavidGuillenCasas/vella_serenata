
<footer class="site-footer border-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="row">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Vella Serenata</h3>
              </div>
              <!-- Al hacer click en las diferentes secciones nos lleva a las páginas correspondientes -->
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="inicio.php">Inicio</a></li>
                  <li><a href="sobre_nos.php">Sobre nós</li>
                  <li><a href="catalogo.php">Catálogo</a></li>
                </ul>
              </div>
             <!-- Al hacer click en las diferentes tipos de instrumentos nos lleva al catálogo pero con el tipo de instrumeto filtrado -->
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="/vella_serenata/busqueda.php?texto=1">Corda</a></li>
                  <li><a href="/vella_serenata/busqueda.php?texto=2">Vento</a></li>
                  <li><a href="/vella_serenata/busqueda.php?texto=3">Percusión</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="contacto.php">Contacta</a></li>
                </ul>
              </div>
            </div>
          </div>
        <!-- Nos muestra la info de contacto de la tienda -->
          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Información de contacto</h3>
              <ul class="list-unstyled">
                <li class="address">Campo de la Estrada,A Coruña, Galicia, España</li>
                <li class="phone"><a href="tel://34658150077">+34 658 15 00 77</a></li>
                <li class="email">info@vellaserenata.com</li>
              </ul>
            </div>
        <!-- Sección para intruducir correo y suscrbirse a boletíon de noticias de la tienda.
         Se envían los del formulacio por metodo post a la página que continene el algorimo 
         para tratar esa información e introducirla en la tabla correspondiente de la base de datos -->
            <div class="block-7">
              <form action="./php/recibir_suscripcion.php" method="post">
                <label for="email_subscribe" class="footer-heading">Suscríbete</label>
                <div class="form-group">
                  <input type="email" class="form-control py-4" id="email_subscribe" name="c_email_sus" placeholder="Email" required>
                  <input type="submit"  class="btn btn-sm btn-primary" value="Envía">
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            Copyright &copy;
       <!-- Pequeño script para mostrar el año actual y el autor de la página -->
            <script>document.write(new Date().getFullYear());</script> Vella Serenata | 
            Deseñado por David Guillén Casas <i  aria-hidden="true"></i>
          </p>
          </div>
        </div>
      </div>
    </footer>