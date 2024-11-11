<?php 
//incluyo el fichero para conectarse a la base de datos y compruebo que todos los campos necesarios estén completos
   include "./conexion.php";
   if( isset($_POST['nombre'])&& isset($_POST['apellidos']) && isset($_POST['telefono'])  && isset($_POST['email']) && isset($_POST['pass'] ) 
    && isset($_POST['pass2'] )){
        //compruebo que la contraseñas coincidan
        if($_POST['pass'] == $_POST['pass2'] ){
            //asigno a las variables el valor de cada campo introducido
            $nombre=$_POST['nombre'];
            $apellidos=$_POST['apellidos'];
            $tfno=$_POST['telefono'];
            $email=$_POST['email'];
            $pass=sha1($_POST['pass']);
            //introduzco los datos en la tabla de usuarios de la base de datos
            $conexion->query("INSERT INTO usuario (nombre, apellidos, telefono, email, password) 
            values('$nombre','$apellidos','$tfno','$email','$pass')  ")or die($conexion->error);
               
            echo "Registro completado";
            //redirecciono para inicar sesión con el usuario que se acaba de registrar
            header("Location:/vella_serenata/loguearse.php");
            }
        else{
            /*si no coinciden las contraseñas al registrarlas redireccióno a la misma página de registro
            pero pasando en la url por método GET un error que usaré para mostrar mensaje en dicha página*/
            header("Location:/vella_serenata/registrarse.php?error=contrasinais non coinciden");

        }
    }

?>