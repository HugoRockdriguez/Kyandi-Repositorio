<?php
session_start();
$arreglo=$_SESSION["carrito"];
include('conexioncarrito.php');
$resultado= $conexion -> query("select * from productos where id=".$_POST['id']) or die($conexion -> error);
$fila = mysqli_fetch_array($resultado);
for ($i=0; $i <count($arreglo) ; $i++) { //comienza un for por el areglo "$arreglo" para buscar 
	if ($arreglo[$i]['id']==$_POST['id']) {//en caso de encontrar el valor buscado entra a este if
		if($fila['inventario']>=$_POST['cantidad']){//aqui compara si la cantidad enviada es menor a la existencia del producto 
		$arreglo[$i]['cantidad']=$_POST['cantidad'];//la variable arreglo toma el valor enviado atraves del metodo post
		$_SESSION['carrito']=$arreglo;//la variable $_session toma el valor del arreglo
		break;//rompe el ciclo para que no siga buscando
	}else{// en caso de que la cantidad requerida supere el inventario se le enviara este mensaje 
		echo "cantidad insuficiente en inventario solo hay: ".$fila['inventario']." piezas";
	}
	}
}
?>