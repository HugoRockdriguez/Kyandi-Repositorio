<?php
	include("conexion.php");

	//Recuperar datos del formulario
	$nombre=$_POST['nombre'];
	$primer_apellido=$_POST['primer_apellido'];
	$segundo_apellido=$_POST['segundo_apellido'];
	$estado=$_POST['estado'];
	$municipio=$_POST['municipio'];
	$colonia=$_POST['colonia'];
	$codigo_postal=$_POST['codigo_postal'];
	$calle=$_POST['calle'];
	$telefono=$_POST['telefono'];
	$correo=$_POST['correo'];
	$contrasena=$_POST['contrasena'];
	$contrasena=hash('sha512',$contrasena);
	
	//Sentencia INSERT sql
	$insert_sql="INSERT INTO usuario(nombre, primer_apellido, segundo_apellido, estado, municipio, colonia, codigo_postal, calle, telefono, correo, contrasena) VALUES('$nombre','$primer_apellido','$segundo_apellido', '$estado', '$municipio', '$colonia', '$codigo_postal', '$calle', '$telefono', '$correo','$contrasena')";

	//Verificar que no se repita el correo en la BD
	$verificar_correo= mysqli_query($conexion,"SELECT * FROM usuario WHERE correo='$correo'");
	if(mysqli_num_rows($verificar_correo)>0){
		echo'<script> 
				alert("El correo ya se encuantra registrado.");
				window.location="../form.html";
			</script>';
	}else{
	//Enviar los datos del formulario a la BD
		$ejecutar=mysqli_query($conexion,$insert_sql);
			if ($ejecutar){
				session_start();
				$_SESSION['usuario']=$correo;
				echo'<script> 
					alert("¡Registro exitoso!");
					window.location="../perfil.php";
					</script>';
			}
	}

?>