<?php
require './php/cabecero2.php'
?>
	<!--Contenido principal de la pagina-->
	<main>

	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h3> Formulario de registro</h3>
			</div>
		</div><br>
		<div class="row">
			<div class="col-sm-12">
				<form action="php/registrar.php" method="post">
					<!--Nombre-->
				<div class="form-row">
					<div class="form-group col-sm-4">
						<label for="nombre"><h5>Nombre:</h5></label>
						<input type="text" name="nombre" class="form-control" required/>
					</div>
					<div class="form-group col-sm-4">
						<label for="primer_apellido"><h5>Primer Apellido:</h5></label>
						<input type="text" name="primer_apellido" class="form-control" required/>
					</div>
					<div class="form-group col-sm-4">
						<label for="segundo Apellido"><h5>Segundo Apellido:</h5></label>
						<input type="text" name="segundo_apellido" class="form-control" required/>
					</div>
				</div>
					<!--Dirección-->
				<div class="form-row">
					<div class="form-group col-sm-4">
						<label for="numCuenta"><h5>Estado:</h5></label>
						<input type="text" name="estado" class="form-control" />
					</div>
					<div class="form-group col-sm-4">
						<label for="numCuenta"><h5>Municipio:</h5></label>
						<input type="text" name="municipio" class="form-control" />
					</div>
					<div class="form-group col-sm-4">
						<label for="numCuenta"><h5>Colonia:</h5></label>
						<input type="text" name="colonia" class="form-control" />
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-sm-4">
						<label for="numCuenta"><h5>Código Postal:</h5></label>
						<input type="text" name="codigo_postal" class="form-control" />
					</div>
					<div class="form-group col-sm-4">
						<label for="numCuenta"><h5>Calle y número:</h5></label>
						<input type="text" name="calle" class="form-control" />
					</div>
					<div class="form-group col-sm-4">
						<label for="numCuenta"><h5>Teléfono:</h5></label>
						<input type="text" name="telefono" class="form-control" />
					</div>
				</div>
				<!--Correo-->
				<div class="form-group">
					<label for="correo"><h5>Correo:</h5></label>
					<input type="email" class="form-control" name="correo" placeholder="correo@mail.com" required>
				</div>
				<div class="form-group">
					<label for="contrasena"><h5>Contraseña</h5></label>
					<input type="password" class="form-control" name="contrasena" placeholder="Password" required>
				</div>
				<div class="form-group">
					<input id="tipo" name="tipo" type="hidden" value="1">
				</div>
				<button type="submit" class="btn btn-primary" style="background: #d68189; border-color: #d68189">Enviar</button>
			</form>
		</div>
	</div>
	</div><br>
	</main>
<?php
require './php/footer.php'
?>