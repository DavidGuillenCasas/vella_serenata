
<?php
//
    session_start();
    if(isset ($_SESSION['usuario'])){
        unset($_SESSION['carrito']);
        unset($_SESSION['usuario']);
        header("Location:/vella_serenata/inicio.php");
    }
    
?>
