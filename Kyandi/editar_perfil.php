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

<?php
    require './php/cabecero.php'
  ?>	
	<!--Contenido principal de la pagina-->
	<main class="offer">
		
		<form action="php/editar_perfil.php" method="post">
		<div class="row">
			<div class="col-5" style="display:block;">
				<b style="font-size: 25px;"><br><?php
					echo($nombre.' '. $primer_apellido.' '.$segundo_apellido
						);?></b><br>
				<img src="img/heart_cat.jpg" alt="Gato-Corazón" width="300" height="300" style="margin-left: 10px;">
				<b style="font-size: 25px;">Teléfono:</b><input type="text" name="telefono" class="form-control" value="<?php echo($telefono);?>"/><br>
				<b style="font-size: 25px;">Correo:</b><p style="font-size: 20px;"><?php echo($correo);?></p>
			</div>
			
			<div class="col-5" style="display:block; padding-left: 50px;">
				<b style="font-size: 25px;"><br>Dirección de envío:</b><br><br>
				<b style="font-size: 20px;">Estado:</b><input type="text" name="estado" class="form-control" value="<?php echo($estado);?>"/>
				<b style="font-size: 20px;">Municipio:</b><input type="text" name="municipio" class="form-control" value="<?php echo($municipio);?>"/>
				<b style="font-size: 20px;">Colonia:</b><input type="text" name="colonia" class="form-control" value="<?php echo($colonia);?>"/>
				<b style="font-size: 20px;">Código Postal:</b><input type="text" name="codigo_postal" class="form-control" value="<?php echo($codigo_postal);?>"/>
				<b style="font-size: 20px;">Calle y número:</b><input type="text" name="calle" class="form-control" value="<?php echo($calle);?>"/><br>
				
				<button type="submit" class="btn btn-primary" style="background: #d68189; border-color: #d68189">Guardar cambios</button>
				</form>
				<a href="eliminar_perfil.php"><button type="button" class="btn btn-primary" style="background: #d68189; border-color: #d68189">Eliminar cuenta</button></a>
			</div>
		</div>

	</main>
<<?php
    require './php/footer.php'
  ?>