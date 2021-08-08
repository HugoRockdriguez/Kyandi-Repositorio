<?php
 require("./php/cabecero.php");
?>

	<!--Contenido principal de la pagina-->
	<main>

	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h3>¡Bienvenido!</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<img src="img/candy_cat.jpg" style="height: 250px; width: 300px; padding-left: 50px;">
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<p style="font-size: 20px; padding-left: 50px;">Porfavor, ingresa tus datos para poder acceder al sistema.</p>
			</div>
		</div>
	
		<div class="row">
			<div class="col-sm-12">
				<p style="font-size: 18px;">¿No tienes usuario?</p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<a href="form.html"><button class="btn btn-primary" style="background: #d68189; border-color: #d68189;">Registrarse</button></a>
			</div>
		</div><br>
		
		<div class="row">
			<div class="col-sm-12">
				<h4>Iniciar sesión:</h4>
			</div>
		</div><br>
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-8">
				<form action="php/acceder.php" method="post">
				<!--Correo-->
				<div class="form-group">
					<label for="email"><h5>Correo:</h5></label>
					<input type="email" class="form-control" name="correo" placeholder="correo@mail.com" required>
				</div>
				<div class="form-group">
					<label for="contraseña"><h5>Contraseña</h5></label>
					<input type="password" class="form-control" name="contrasena" placeholder="Password" required>
				</div>
				<button type="submit" class="btn btn-primary" style="background: #d68189; border-color: #d68189">Enviar</button>
				</form>
			</div>
			<div class="col-sm-2"></div>
		</div><br><br>
	</div>
	</main>
		
<?php
 require("./php/footer.php");
?>