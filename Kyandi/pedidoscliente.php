<?php
 require("./php/cabecero.php");
?>
<?php 
session_start();
if (isset($_SESSION['usuario'])) {
	// code...
 ?>

<table class="table table-bordered"> <!--se crea la tabla donde se iran acomodando los productos-->
                <thead>
                  <tr>
                    <th class="product-thumbnail">id pedido</th>
            
                    <th class="product-price">Fecha de Compra</th>
                    <th class="product-name">status</th>
                    <th class="product-quantity"></th>
                  </tr>
                </thead>
                <tbody>
               
<?php   
include('./php/conexioncarrito.php');
$corrreo=$_SESSION['usuario'];
$resultado= $conexion -> query("select * from ventas where correo='$corrreo'") or die($conexion -> error);
while($fila = mysqli_fetch_array($resultado)){
$idv=$fila['id'];	
$resultado2=$conexion-> query("select * from productos_venta where id_venta='$idv'") or die($conexion -> error);
$fila2=mysqli_fetch_array($resultado2);	
?>

 <tr>
 	<td class="product-thumbnail">
 	<a href="pedidosusuario.php?id=<?php echo $fila2['id_venta'];?>"><?php echo $fila['paypal'];?></a>	
    </td>
    <td class="product-name">
    <?php echo $fila['fecha'];?>
    </td>
    <td class="product-name">
    <?php echo $fila['status'];?>
    </td>
    

</tr>
<?php } ?>

</tbody>
</table>
<br>

<?php } ?>
<?php
 require("./php/footer.php");
?>