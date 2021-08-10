<?php
include('conexioncarrito.php');
$resultado= $conexion -> query("UPDATE `ventas` SET `status`='enviado' WHERE id=".$_POST['id']) or die($conexion -> error);
echo "Producto enviado";
?>