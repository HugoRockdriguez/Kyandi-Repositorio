<?php
	//conexión con el servidor
	$conexion=@mysql_connect('localhost','root','');

	//verificar la conexión
	if ($conexion){
		$base_datos=mysql_select_db('carrito');
	}else{
		echo "No se pudo conectar con el servidor.";
	}

	//recuperar variables
	$nombre=$_POST[nombre];
	$primer_apellido=$_POST[primer_apellido];
	$segundo_apellido=$_POST[segundo_apellido];
	$correo=$_POST[correo];
	$contrasena=$_POST[contrasena];

	$sql="INSERT INTO usuario VALUES('$nombre', '$primer_apellido', '$segundo_apellido', '$correo', '$contrasena')";

	$ejecutar=mysql_query($sql);

	i
?>	