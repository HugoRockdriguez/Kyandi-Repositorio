<?php
session_start();
require './php/cabecero.php';
require ("./php/conexioncarrito.php");
?>


<?php
     $total=100;
     $sid=session_id();
     $correo=$_SESSION['usuario'];
     $arreglocarrito=$_SESSION['carrito'];
     $paypal=$_GET['payment'];
     if($_SESSION['usuario']){
        for ($i=0; $i <count($arreglocarrito) ; $i++) { 
            $total=$total+$arreglocarrito[$i]['precio']*$arreglocarrito[$i]['cantidad'];
        }
     }
    global $conexion;
   $sentencia=$conexion->query("INSERT INTO `ventas` (`id`,`paypal`,`clave_transaccion`,`fecha`, `correo`, `total`, `status`) VALUES ( NULL,'$paypal','$sid',NOW(),'$correo','$total', 'pendiente');");//inserta los datos en la tabal ventas

   $idrow=0;//se declara una variable que contendra el ultimo id de nuetsra tabala ventas
   $rs = $conexion->query("SELECT MAX(id) AS id FROM ventas;");//ejecutamos la consulta sql para traer el ultimo resultado de la tabla ventas
   $fila=mysqli_fetch_row($rs);//se convierte la variable $rs en un arreglo
   if ($fila) {
      $idrow = trim($fila[0]);//la variable $idrow cambia su valor de 0 al ultimo id agreagado a la tabla ventas
}
   for ($i=0; $i <count($arreglocarrito) ; $i++) {//atraves de for insertamos uno por uno los productos vendidos del carrito
   $subtotal=$arreglocarrito[$i]['precio']*$arreglocarrito[$i]['cantidad']; 
   $id=$arreglocarrito[$i]['id'];
   $precio=$arreglocarrito[$i]['precio'];
   $cant=$arreglocarrito[$i]['cantidad'];
   $sentencia2=$conexion->query("INSERT INTO `productos_venta`(`id_venta`, `id_producto`, `cantidad`, `precio`, `subtotal`) VALUES ('$idrow','$id','$cant','$precio','$subtotal');")or die($conexion->error);  
   $sentencia3=$conexion->query("UPDATE `productos` SET `inventario`=(`inventario`-$cant) WHERE id=$id;")or die($conexion->error);
        }

   unset($_SESSION['carrito']);//borramos la informacion carrito de la varaibale session 

  
 ?>
  <div class="jumbotron text-center">
    <h1 class="display-4">¡Muchas felicidades Pago exitoso Completado!</h1>
    <hr class="my-4">
    
   <div id="paypal-button-container"></div>


</p>     
 </div>