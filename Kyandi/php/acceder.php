<?php
	include('conexioncarrito.php');
	$correo=$_POST['correo'];
	$contrasena=$_POST['contrasena'];
	$contrasena=hash('sha512',$contrasena);

	session_start();

	//Validar datos del formulario
	$sql_validar=mysqli_query($conexion,"SELECT * FROM usuario WHERE correo='$correo' AND contrasena='$contrasena'");

	if(mysqli_num_rows($sql_validar)>0){
		$_SESSION['usuario']=$correo;
		header("location: ../perfil.php");
	}else{
		session_destroy();
		echo'<script>
			alert("Los datos no coinciden, verifica tú correo y contraseña o resgistrate si aun no lo haz hecho.")
			window.location="../acceso.html";
		</script>';
	}
?>

<!-- unset en php --> 
<!-- unset($_SESSION['carrito']);
 -->


<!--  https://www.php.net/manual/en/function.unset.php -->
<!-- https://www.php.net/manual/es/index.php
 -->