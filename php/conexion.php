<?php
//variables para realizar la conexión
    $servidor="localhost";
    $nombreBd="vella_serenata";
    $usuario="root";
    $pass="";
    $conexion =new mysqli($servidor, $usuario, $pass, $nombreBd);
    
    if($conexion -> connect_error ){
        //mensaje de error si no se puede conectar a la base de datos
        die("Non se pudo conectar á base de datos da tenda");

    }
?>