<?php
    require './php/cabecero.php'
  ?>
	<!--Contenido principal de la pagina-->
<?php	
include('./php/conexioncarrito.php');
$resultado= $conexion -> query("select * from productos where id_categoria=1") or die($conexion -> error);
while($fila = mysqli_fetch_array($resultado)){
?>
<div class="row">
<div class="col-3" style="display:block">
<a href="Pocky-ChocoBanana.php?id=<?php echo $fila['id']?>">	
<div align="center"><img src="img/productos/<?php echo $fila['imagen'];?>" alt="" width="180" height="250"></div>
<p style="font-size: 20px; text-align: center; color: black;"><br><?php echo $fila['nombre']; ?><br>$<?php echo $fila ['precio']?></p></a>
</div>
</div>
<?php } ?>
	
<?php
    require './php/footer.php'
  ?>	