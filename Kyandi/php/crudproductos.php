<?php 
require ("conexioncarrito.php");

class crudproductos{
 	
 	public function __construct(){}

    public function agregar($nombre,$caducidad,$precio,$info,$descripcion,$ingredientes,$inventario,$sabor,$idcategoria,$cantidad,$imagen){
    global $conexion;
    $insertar= $conexion -> query("INSERT INTO `productos`(`nombre`, `descripcion`, `ingredientes`, `inf_nutricional`, `caducidad`, `precio`, `imagen`, `inventario`, `id_categoria`, `cantidad`, `sabor`) VALUES ('$nombre','$descripcion','$ingredientes','$info','$caducidad','$precio','
	$imagen','$inventario','$idcategoria','$cantidad','$sabor')")or die($conexion  -> error);
	return $insertar;
}

    public function actulizar($sql){
    global $conexion;
    $insertar= $conexion -> query($sql)or die($conexion  -> error);
    return $insertar;
}
    public function eliminar($sql){
    global $conexion;
    $insertar= $conexion -> query($sql)or die($conexion  -> error);
    return $insertar;
}
//    public function buscar($buscar){
//     $sql="SELECT * FROM `productos` WHERE 'id'LIKE %'.$buscar.'% OR nombre LIKE %'.$buscar.'%"
//    global $conexion;
//     $insertar= $conexion -> query($sql)or die($conexion  -> error);
//     return $insertar;
// }
}
?>