<?php
//inicio sesión para luego meter dentro de un array la variable de sesión
session_start();
$a = $_SESSION['carrito'];
/* recorre el array y si no coincide el artículo a eliminar con el que le estoy enviando mediante ajax el método POST,
se va creando un nuevo array en el cual voy introduciendo los valores de cada registro*/ 
for ($i=0;$i<count($a);$i++){
    if($a[$i]['Id'] != $_POST['id']){
        $aNuevo[]= array(
            'Id' =>$a[$i]['Id'],
            'Nombre' =>$a[$i]['Nombre'],
            'Precio' =>$a[$i]['Precio'],
            'Imagen' =>$a[$i]['Imagen'],
            'Cantidad' =>$a[$i]['Cantidad'],
        );
    }
}
/*después de crear el nuevo array con los registros del carro menos el que nos coincidía, que es el que queríamos eliminar,
creo la nueva variable de sesión con el array nuevo, sin el registro eliminado*/
if(isset($aNuevo)){
   $_SESSION['carrito']=$aNuevo;
}
else{
    /*aquí entra cuando el instrumento a eliminar es el único que había en el carro de la compra , 
    por tanto, elimino la varibale de sesión*/
    unset($_SESSION['carrito']);
}
//cuando termina de eliminar el instrumento, mandamos mensaje que recogeremos en el script y lo mostraremos por pantalla
echo "Instrumento eliminado do carro";
?>