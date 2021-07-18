<?php
	include("php/conexion.php");
	$sesion_actual=$_SESSION['usuario'];
	$consulta="Select * From usuario WHERE correo='$sesion_actual'";
	$datos=mysqli_query($conexion,$consulta);

	if($datos){
		while($row=$datos->fetch_array()){
			$nombre=$row['nombre'];
			$primer_apellido=$row['primer_apellido'];
			$segundo_apellido=$row['segundo_apellido'];
			$estado=$row['estado'];
			$municipio=$row['municipio'];
			$colonia=$row['colonia'];
			$codigo_postal=$row['codigo_postal'];
			$calle=$row['calle'];
			$telefono=$row['telefono'];
			$correo=$row['correo'];
			$contrasena=$row['contrasena'];
			
		}
	}
?>