<?php
	session_start();
	if(!isset($_SESSION['usuario'])){
		echo'<script>
			alert("¡Inicia sesión para acceder!");
			window.location="acceso.html";
		</script>';
		session_destroy();
		die();
	}else{
		include("php/datos_usuario.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Mi perfil-(Kyandī)</title>
	<meta charset="utf-8">
	<meta name="description" content="Dulceria, Japon, Kawaii"/>
	<meta name="keywords" content="Pocky, Kokeiya, Honkaku"/>
	<meta name="robot" content="index,follow"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>

<body>
	<!--Encabezado: Titulo y logotipos-->
	<div class="header container-fluid">
		<div class="row">
			<div class="col-4">
				<img src="img/logo1.png" alt="Logo 1">
			</div>
			<div class="col-4">
				<p>キャンディー<br>= Kyandī =</p>
			</div>
			<div class="col-4">
				<a href="#"><img src="img/user.png" alt="Logo 2" class="float-right" style="padding-top: 22px;" title="Mi perfil"></a>
			</div>
		</div>
	</div>
	<div class="col" style="box-shadow: 0 0 10px .25px black;"></div>

	<!--Barra de navegación-->
	<nav class="navigation">
		<ul>
			<li><a href="index.html">Inicio</a></li>
			<li><a href="novedades.html">Novedades</a></li>
			<li><a href="#">Ofertas</a></li>
		</ul>
	</nav>
	<div class="col" style=" position: relative; height: 3px; border-color: #c5930a; background-color: #e94e77"></div>
		
	<!--Contenido principal de la pagina-->
	<main class="offer">
		
		<div class="row">
			<div class="col-5" style="display:block;">
				<b style="font-size: 25px;"><br><?php
					echo($nombre.' '. $primer_apellido.' '.$segundo_apellido
						);?></b><br>
				<img src="img/heart_cat.jpg" alt="Gato-Corazón" width="300" height="300" style="margin-left: 10px;"><br><br>
				<b style="font-size: 25px;">Correo:</b><p style="font-size: 20px;"><?php echo($correo);?></p>
				<b style="font-size: 25px;">Teléfono:</b><p style="font-size: 20px;"><?php echo($telefono);?></p>
				
			</div>
			
			<div class="col-5" style="display:block; padding-left: 50px;">
				<b style="font-size: 25px;"><br>Dirección de envío:</b><br><br>
				<b style="font-size: 20px;">Estado:</b><p><?php echo($estado);?></p>
				<b style="font-size: 20px;">Municipio:</b><p><?php echo($municipio);?></p>
				<b style="font-size: 20px;">Colonia:</b><p><?php echo($colonia);?></p>
				<b style="font-size: 20px;">Código Postal:</b><p><?php echo($codigo_postal);?></p>
				<b style="font-size: 20px;">Calle y número:</b><p><?php echo($calle);?></p><br><br>		
				
				<a href="editar_perfil.php"><button type="button" class="btn btn-primary" style="background: #d68189; border-color: #d68189">Editar Datos</button></a>
				<a href="php/cerrar_sesion.php"><button type="button" class="btn btn-primary" style="background: #d68189; border-color: #d68189">Cerrar Sesión</button></a>
			</div>

		</div>

	</main>
	
	<footer>		
		<!--Pie de pagina 1-->
	<div class="footer1">
	<div class="row">
		<div class="col-2"></div>
		<div class="col-2">
			<ul>
				<li style="font-size: 20px; font-family: Georgia;">
					<a href="terminos_codiciones.html" style="color: inherit;"><h6>Terminos y Condiciones</h6></a>
				</li>
			</ul>
		</div>
		<div class="col-4">
			<p style="font-size: 15px; font-family: Georgia; text-align: justify;">Hecho en México, todos los derechos reservados 2021. Esta página ha sido desarrollada por estudiantes de la Facultad de Estudios Superiores Cuautitlán.</p>
		</div>
		<div class="col-3">
				<a href="#" style="color: inherit;"><li style="font-size: 18px; font-family: Georgia;">Aviso de privacidad</li></a>
		</div>
	</div>		
	</div>


	<!--Pie de pagina 2-->
	<div class="footer2">
		<p style="font-size: 18px; color: #ffffff; font-family: Arial; text-align: center;"><br>Facultad de Estudios Superiores Cuautitlán<br>Licenciatura en Informática<br>2021.</p>
	</div>
	</footer>
</body>
</html>