
<?php
//Inicio sesión, incluyo el fichero de conexión y compruebo si está creado el campo email y pass
    session_start();
    include "conexion.php";

    if( isset($_POST['email']) && isset($_POST['pass'] )){
    //asigno a estas variables los campos introducidos para consultarlos después en la BD
       $email =$_POST['email'];
       $password = sha1($_POST['pass']);
       $res = $conexion->query("SELECT id, nombre, apellidos, telefono, email, password FROM usuario 
       WHERE email='$email' 
       AND password='$password'")or die($conexion->error);
    // si obtiene conicidencia creo un array para guardar los doatos de ese susuario existente en a BD
    if( mysqli_num_rows($res) > 0 ){
        while ($fila=mysqli_fetch_array($res)){
               $a[]= array(
                'Id_usuario'=> $fila['id'],
                'Nombre'=> $fila['nombre'],
                'Apellidos'=> $fila['apellidos'],
                'Telefono'=> $fila['telefono'],
                'Email'=> $fila['email']);};
            if(isset($a)){
                $_SESSION['usuario']=$a;
               
                //redireciono a la pantalla del carrito de la compra
                header("Location:/vella_serenata/carro.php");}
    }else{
        /*redireccióno a la misma página de login pero pasando en la url por método GET un error
         que usaré para mostrar mensaje en dicha página*/
        header("Location:/vella_serenata/loguearse.php?error=datos incorrectos");
    }
    
}
?>
