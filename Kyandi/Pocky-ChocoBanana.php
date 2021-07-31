<!--funcion que permite atraves del metodo get colocar un id a cada producto de la base de datos dando dinamismo a la pagina -->
<?php
 include("./php/conexioncarrito.php");
 if (isset($_GET['id'])) {
 	$resultado=$conexion->query("select * from productos where id=".$_GET['id'])or die($conexion->error);
 	if (mysqli_num_rows($resultado)>0) { // verifica que al ingresar a la base de datos exista por lo menos una fila de productos 
 		$fila= mysqli_fetch_row($resultado); // convierte a la fila obtenida en un arreglo 
 	}else{ 
 		header("Location: ./index.html");
 	}
 }
 else{
 	header("Location: ./index.php");
 }
?>
<!--se agrega el cabecero-->
<?php
    require './php/cabecero.php'
  ?>

	<!--Contenido principal de la pagina-->
	<main class="offer">
		<div class="row">
			<div class="col-6" style="display:block;">
				<img src="img/productos/<?php echo $fila[7];?>"  width="350" height="500" style="margin-left: 25px;"><!-- arreglo que agrega la imagen desde la base de datos-->
				<p style="font-size: 25px; text-align: justify;"><br><?php echo $fila[2];?><!-- itroduccion dinamica de la descripcion del producto-->
				</p><br>
				
				<iframe width="420" height="300" src="https://www.youtube.com/embed/UOOvZWernHs" title="YouTube video player" frameborder="0" allow="autoplay; picture-in-picture" allowfullscreen></iframe>
			</div>
			
			<div class="col-6" style="display:block; padding-left: 45px;">
				<b style="font-size: 25px; text-align: justify;"><br><?php echo $fila[1];?></b><br><br><br>
				<b>Contenido:</b><p><?php echo $fila[10];?></p><!-- introduccion dinamica de la cantidad-->
				<b>Caducidad:</b><p><?php echo $fila[5];?></p>
				<b style="font-size: 25px; color: #d68189">$<?php echo $fila[6];?> pza.</b> <!-- introduccion dinamica del precio-->
				<p style="color: #d68189">(IVA incluído)</p>
				
				<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="Q3TK4QLNU5BCW">
				
				<a href="carrito.php?id=<?php echo $fila[0]?>"><img src="img/carrito(v2).png" alt="" width="100" height="100"></a>
				
				<br><b>¡Añadir al carrito!</b>
				</form><br>
				<b>Ingredientes:</b><p style="text-align: justify"><?php echo $fila[3];?><!-- introduccion dinamica de los ingredientes-->
				</p>
				<b>Información nutricional:</b><p style="text-align: justify"><?php echo $fila[4];?>
				</p><br>
				<b>Tambien te podría interesar:</b>
				<img src="img/snoop.png" height="200" width="400">
				
			</div>
		</div>
		
	</main>
	
<?php
    require './php/footer.php'
  ?>