<script src="js/funciones.js"></script>
<?php
//Incluyo el archivo con las variables de conexión a  la base de datos
include('./conexion.php');
if (isset($_POST['c_email_sus'])){
//inserto en la tabla correspondiente el correo 
$conexion->query("INSERT INTO suscripciones (email)
values(
'".$_POST['c_email_sus']."')")or die($conexion->error);
//redirecciono al incio
header("Location: /vella_serenata/inicio.php");
}
?>