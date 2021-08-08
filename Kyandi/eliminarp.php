<?php
 include("./php/conexioncarrito.php");
 if (isset($_GET['id'])) {
 	$resultado=$conexion->query("select * from productos where id=".$_GET['id'])or die($conexion->error);
 	$fila= mysqli_fetch_row($resultado); // convierte a la fila obtenida en un arreglo 
}
?>


<?php
require ("./php/cabecero2.php");
?>
	<!--Contenido principal de la pagina-->
	<main>

	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h3> Agregar Productos</h3>
			</div>
		</div><br>
		<div class="row">
			<div class="col-sm-12">
				<form action="./php/agregarproductos.php?id=3" method="post" enctype="multipart/form-data"><!-- atraves del formulario agregamos un id pra enviarselo por metodo get a la clase agregagrproductos.php, la clase enctype=multipart/form-data, sirve para poder enviar imagenes atraves de este formulario -->
					<!--Nombre-->
				<div class="form-row">
					<div class="form-group col-sm-4">
						<label><h5>Nombre:</h5></label>
						<input type="text"  name="nombreproducto" class="form-control" value="<?php echo $fila[1];?>" />
					</div>
					<div class="form-group col-sm-4">
						<label><h5>Caducidad:</h5></label>
						<input type="date" name="caducidad" class="form-control" value="<?php echo $fila[5];?>"/>
					</div>
					<div class="form-group col-sm-4">
						<label><h5>Precio:</h5></label>
						<input type="number" name="precio" class="form-control" value="<?php echo $fila[6];?>"/>
					</div> 
				</div>
					<!--Dirección-->
				<div class="form-row">
					<div class="form-group col-sm-5">
						<label><h5>informacion nutricional:</h5></label>
						<textarea rows="5" cols="20" name="infnutricional" class="form-control"><?php echo $fila[4];?></textarea>
					</div>
					<div class="form-group col-sm-4">
						<label><h5>Descripcion:</h5></label>
						<textarea rows="5" cols="20" class="form-control" name="descripcion"><?php echo $fila[2];?></textarea> 
					</div>
					<div class="form-group col-sm-3">
						<label><h5>Ingredientes: </h5></label>
						<textarea rows="5" cols="20" name="ingredientes" class="form-control"><?php echo $fila[3];?></textarea>
					</div>
				</div>

				<div class="form-row">
					
					<div class="form-group col-sm-4">
						<label><h5>Numero de piezas:</h5></label>
						<input type="number" name="inventario" class="form-control" value="<?php echo $fila[8];?>"/>
					</div>
					<div class="form-group col-sm-4">
						<label><h5>Sabor:</h5></label>
						<input type="text"  name="sabor" class="form-control" value="<?php echo $fila[11];?>"/> 
					</div>
					<div class="form-group col-sm-4">
						<label><h5>Categoria:</h5></label>
						<input list="Categoria" name="categoria" class="form-control"value="<?php echo $nombrecategoria;?>">
						<datalist id="Categoria">
                           <option value="Galletas"/>
                           <option value="Bebidas"/>
                           <option value="Snacks"/>
                           <option value="Ramen"/>
                        </datalist>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-sm-6">
						<label><h5>Cantidad del producto:</h5></label>
						<input type="text"  name="cantidad" class="form-control" value="<?php echo $fila[10];?>"/>
					</div>	
					<div class="form-group col-sm-4">
						<input type="hidden"  name="id" class="form-control" value="<?php echo $fila[0];?>" />
				</div>
			</div>
					<div class="form-group col-sm-4">
						<label><h5>Imagen:</h5></label>
						<input type="file" name="imagen"/>
					 </div>		
				<button type="submit" class="btn btn-primary" style="background: #d68189; border-color: #d68189">eliminar</button>
				<a href="vistaadmin.php"><img src="./img/interfaz/regresar.png" width="50" height="50"></a>
			</form>
		</div>

	</div>
	</div><br>
	</main>
<?php
require './php/footer.php'
?>