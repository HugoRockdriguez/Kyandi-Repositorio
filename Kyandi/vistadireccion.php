<?php
 require("./php/cabecero2.php");
?>


<table class="table table-bordered"> <!--se crea la tabla donde se iran acomodando los productos-->
                <thead>
                  <tr>
                    <th class="product-thumbnail">Estado</th>
                    <th class="product-name">Municipio</th>
                    <th class="product-price">colonia</th>
                    <th class="product-quantity">Codigo Postal</th>
                    <th class="product-total">Calle</th>
                    <th class="product-remove">Telefono</th>
                  </tr>
                </thead>
                <tbody>
               
<?php   
include('./php/conexioncarrito.php');
$correo=$_GET['op'];
$resultado= $conexion -> query("select * from usuario where correo='$correo'") or die($conexion -> error);
while($fila = mysqli_fetch_array($resultado)){
?>
 <tr>
    <td class="product-thumbnail">
    <?php echo $fila['estado'];?>
    </td><!-- agrega imagen a la tabla del carrito -->
    <td class="product-name">
    <?php echo $fila['municipio'];?>
    </td>
    <td class="product-price">
    <?php echo $fila['colonia'];?>
    </td>
    <td class="product-quantity">
    <?php echo $fila['codigo_postal'];?>
    </td>
    <td class="product-total">
    <?php echo $fila['calle'];?>
    </td>
    <td class="product-remove">
    <?php echo $fila['telefono'];?>
    </td>


</tr>
<?php } ?>

</tbody>
</table>
<br>


<?php
 require("./php/footer.php");
?>