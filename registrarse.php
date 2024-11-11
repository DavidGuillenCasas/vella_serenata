<!DOCTYPE html>
<html lang="gl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vella Serenata - Rexistro Conta</title>    
    <!-- Cargando e icono de la tienda en la parte superior de la pestaña -->
    <link rel="shortcut icon" type="image/x-icon" href="imagenes/icono.ico">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">
<body>
    <div class="container">
        <div class="row justify-content-md-center" style="margin-top:10%">
            <form class="col-3" method="POST" action="./php/registrar.php">
                <h2>Rexistro</h2>
                <div class="mb-3">
                    <label for="Nombre" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="Nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Apelidos</label>
                    <input type="text" class="form-control" id="Apellidos" name="apellidos" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Número de teléfono</label>
                    <input type="tel" class="form-control" id="telefono" name="telefono" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Dirección de correo</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" required>
                    
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Contrasinal</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="pass" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword2" class="form-label">Confirmar Contrasinal</label>
                    <input type="password" class="form-control" id="exampleInputPassword2" name="pass2" required>
                </div>
                <?php
                    if(isset ($_GET['error'])){
                        echo "<h4 class='text-red'>As contrasináis non coinciden</h4>";}
                    ?>
                <button type="submit" class="btn btn-primary">Rexistrarse</button>
                <button type="submit" class="btn btn-primary btn-lg" onclick="window.location ='inicio.php'">Salir</button>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>