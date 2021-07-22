<?php
session_start(); //se verifica que la sesion este activa;
$arreglo=$_SESSION['carrito'];// el arreglo toma el valor de lo que este guardado en la sesion carrito
for ($i=0; $i <count($arreglo) ; $i++) { //a traves del for se busca el elemento que quiere serv eliminado
	if ($arreglo[$i]['id']!=$_POST['id']) {//si entra al if quiere decir que existe mas de un producto en el carrito
		$arregloNuevo[]=array(//almacena los productos que encuentra en estte nuevo arreglo
			 'id'=>$arreglo[$i]['id'], 
			 'nombre'=>$arreglo[$i]['nombre'],
			 'precio'=>$arreglo[$i]['precio'],
			 'imagen'=>$arreglo[$i]['imagen'],
			 'cantidad'=>$arreglo[$i]['cantidad']

		);
	}
}
if (isset($arregloNuevo)) {//si no entra al if anterior quiere decir que solo existe un producto en el carrito por lo que entra a este if
   $_SESSION['carrito']=$arregloNuevo;//el arrglo de la sesion asigana sus valores al arreglo nuevo
}else{
	unset($_SESSION['carrito']);//con la funcion unset se elimina el registro del carrito
}
echo "listo"; //se retorna un mensaje al eliminar el producto
?>