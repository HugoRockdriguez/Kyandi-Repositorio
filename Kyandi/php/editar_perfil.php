<?php
	include("conexion.php");
	session_start();

	//Recuperar datos del formulario
	$perfil=$_SESSION['usuario'];
	$estado=$_POST['estado'];
	$municipio=$_POST['municipio'];
	$colonia=$_POST['colonia'];
	$codigo_postal=$_POST['codigo_postal'];
	$calle=$_POST['calle'];
	$telefono=$_POST['telefono'];
	//Sentencia INSERT sql
	$update_sql="UPDATE usuario SET estado='$estado', municipio='$municipio', colonia='$colonia', codigo_postal='$codigo_postal', calle='$calle', telefono='$telefono' WHERE correo='$perfil'";

	//Enviar los datos del formulario a la BD
		$ejecutar=mysqli_query($conexion,$update_sql);
			if ($ejecutar){
				echo'<script> 
					alert("¡Registro exitoso!");
					window.location="../perfil.php";
					</script>';
			}
?>