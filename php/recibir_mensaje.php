<?php
//Incluyo el archivo con las variables de conexión a  la base de datos
include('./conexion.php');
//inserto en la tabla correspondiente los datos del formulario que ha rellenado el ususario
$conexion->query("INSERT INTO formulario_contacto (nombre, apellidos, email, asunto, mensaje)
values(
'".$_POST['c_fname']."',
'".$_POST['c_lname']."',
'".$_POST['c_email']."',
'".$_POST['c_subject']."',
'".$_POST['c_message']."')")or die($conexion->error);

//redirecciono a la página de inicio
header("Location: /vella_serenata/inicio.php");
?>