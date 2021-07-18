<?php
	include('conexion.php');
	$correo=$_POST['correo'];
	$contrasena=$_POST['contrasena'];
	$contrasena=hash('sha512',$contrasena);
	session_start();

	//Validar datos del formulario
	$sql_validar=mysqli_query($conexion,"SELECT * FROM usuario WHERE correo='$correo' AND contrasena='$contrasena'");

	if($correo==$_SESSION['usuario'] && mysqli_num_rows($sql_validar)>0){
		//Eliminar registro de la BD
		$delete_sql=mysqli_query($conexion,"DELETE FROM usuario WHERE correo='$correo' AND contrasena='$contrasena'");
		session_destroy();
		echo'<script>
			alert("¡Gracias por navegar en Kyandi!");
			window.location="../index.html";
		</script>';
	}else{
		echo'<script>
			alert("Los datos no coinciden, verifica tú correo y contraseña.");
			window.location="../eliminar_perfil.php";
		</script>';
	}
?>