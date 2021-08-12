<?php
 require("./php/cabecero2.php");
?>

<table class="table table-bordered"> <!--se crea la tabla donde se iran acomodando los productos-->
                <thead>
                  <tr>
                    <th class="product-thumbnail">Id</th>
                    <th class="product-name">Transaccion</th>
                    <th class="product-price">fecha</th>
                    <th class="product-quantity">Correo</th>
                    <th class="product-total">Total</th>
                    <th class="product-status">Status Paypal</th>
                    <th class="product-remove">Status</th>
                  </tr>
                </thead>
                <tbody>
               
<?php   
include('./php/conexioncarrito.php');
$resultado= $conexion -> query("select * from ventas") or die($conexion -> error);
while($fila = mysqli_fetch_array($resultado)){
$status;
$var=$fila['paypal'];
if($var!=""){
$status="Aprobado";
}else{
$status="Pendiente";  
}
?>
 <tr>
    <td class="product-thumbnail">
    <a href="vistaproductos.php?id=<?php echo $fila['id'];?>"><?php echo $fila['id'];?></a>
    </td><!-- agrega imagen a la tabla del carrito -->
    <td class="product-name">
    <?php echo $fila['clave_transaccion'];?>
    </td>
    <td class="product-price">
    <?php echo $fila['fecha'];?>
    </td>
    <td class="product-quantity">
    <a href="vistadireccion.php?op=<?php echo $fila['correo'];?>"><?php echo $fila['correo'];?></a>
    </td>
    <td class="product-total">
    <?php echo $fila['total'];?>
    </td>
    <td class="product-status">
    <?php echo $status;?>
    </td>
    <td class="product-remove">
    <a href="#" class="btn btn-primary btn-sm btnActualizar" data-id="<?php echo $fila['id']?>"><?php echo $fila['status'];?></a>
    </td>


</tr>
<?php } ?>

</tbody>
</table>
<br>


<?php
 require("./php/footer.php");
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> <!-- se incluye la libreria de jquery -->

<script>
  $(document).ready(function() {//se crea una funcion anonima en jquery
  $(".btnActualizar").click(function(event){
    event.preventDefault();//con esta funcion evitamos que el evento por defecto(recargar ) no suceda
    var id=$(this).data('id'); //la variable id toma el valor del id que tiene el boton
    var boton=$(this);
    $.ajax({ //atraves del metodo ajax solicitamos que envien atraves del metod post el id del objeto que deseamos eliminar
      // alert(id);
      method: 'POST',
      url: './php/actualizarstatus.php',
      data:{
        id:id
      }
    }).done(function(respuesta){//se recibe el valor retornado por la funcion eliminarcarrito.phps
      alert(respuesta);//se imprime el valor retornado por la funcion eliminarcarrito.php 
      parent.window.location.reload(true);//recarga la pagina
     
    });
  });
  });
</script>
