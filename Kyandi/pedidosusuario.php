<?php
 require("./php/cabecero.php");
?>


<table class="table table-bordered"> <!--se crea la tabla donde se iran acomodando los productos-->
                <thead>
                  <tr>
                    <th class="product-thumbnail">imagen</th>
                    <th class="product-name">nombre</th>
                    <th class="product-price">cantidad</th>
                    <th class="product-quantity">precio</th>
                  </tr>
                </thead>
                <tbody>
               
<?php   
include('./php/conexioncarrito.php');
$id=$_GET['id'];
$resultado= $conexion -> query("select * from productos_venta where id_venta='$id'") or die($conexion -> error);
while($fila = mysqli_fetch_array($resultado)){
$idproducto=$fila['id_producto'];
$resultado2= $conexion -> query("select * from productos where id='$idproducto'") or die($conexion -> error);
$fila2 = mysqli_fetch_array($resultado2);
?>

 <tr>
 	<td class="product-thumbnail">
    <img src="./img/productos/<?php echo $fila2['imagen'];?>" alt="Image"  width="100" height="100" class="img-fluid">
    </td>
    <td class="product-name">
    <?php echo $fila2['nombre'];?>
    </td>
    <td class="product-price">
    <?php echo $fila['cantidad'];?>
    </td>
    <td class="product-quantity">
    <?php echo $fila['precio'];?>
    </td>

</tr>
<?php } ?>

</tbody>
</table>
<br>


<?php
 require("./php/footer.php");
?>