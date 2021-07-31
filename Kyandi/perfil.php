<?php
	session_start();
	if(!isset($_SESSION['usuario'])){
		echo'<script>
			alert("¡Inicia sesión para acceder!");
			window.location="acceso.php";
		</script>';
		session_destroy();
		die();
	}else{
		include("php/datos_usuario.php");
	}
?>

<?php
require './php/cabecero.php'
?>

		
	<!--Contenido principal de la pagina-->
	<div>
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
	</div>
<?php
require './php/footer.php'
?>
