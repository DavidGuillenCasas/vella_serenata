
<?php
//lógica para cerrar sesión de usuario destruyendo las variables de sesión si existen y mandarnos a la página de inicio
    session_start();
    if(isset ($_SESSION['usuario'])){
        unset($_SESSION['carrito']);
        unset($_SESSION['usuario']);
        header("Location:/vella_serenata/inicio.php");
    }
    
?>
