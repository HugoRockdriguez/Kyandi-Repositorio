<?php
session_start(); 
include ("./php/conexioncarrito.php"); // incluimos la conexion a la base de datos
if (isset($_SESSION['carrito'])) {//comprueba que no exista la variable session 
	if (isset($_GET['id'])) { // si existe la variable session solicita el id del producto
		
		$arreglo=$_SESSION['carrito'];//asigna a la variable arreglo el valor de la funcion session
		$bandera=false;
		$numero=0;

		for ($i=0; $i <count($arreglo); $i++) { // atraves de este ciclo busca si el producto no ha sido agregado con anterioridad al carrito 
			if ($arreglo[$i]['id']==$_GET['id']) {
				$bandera=true;
				$numero=$i;
			}
		}
		if ($bandera==true) {// esta condicion solo se activa en caso de que exista el producto el carrito de existir agrega +1 a la cantidad para no repetir el mismo producto en una fila nueva
			$arreglo[$numero]['cantidad']=$arreglo[$numero]['cantidad']+1;
			$_SESSION['carrito']=$arreglo;
			header("Location: ./carrito.php");//al momento de agregar el producto al carrito redirecciona a la misma pagina, para evitar que se agrege dos veces
		
		}else{
		$nombre="";
		$precio="";
		$imagen="";
		$res=$conexion->query('select * from productos where id='.$_GET['id'])or die($conexion->error);// se realizar un query para solicitar a la base de datos que nos traiga todos los datos del producto agregado al carrito
		$arreglocarrito=mysqli_fetch_row($res);// convierte la variable res en un arreglo
		$nombre=$arreglocarrito[1];
		$precio=$arreglocarrito[6];
		$imagen=$arreglocarrito[7]; 
		$arreglo2= array( //se crea otro arreglo para guaradar los datos 
			'id'=>$_GET['id'],
			'nombre'=>$nombre,
			'precio'=>$precio,
			'imagen'=>$imagen,
			'cantidad'=> 1
		);
		array_push($arreglo, $arreglo2);
		$_SESSION['carrito']=$arreglo;
		header("Location: ./carrito.php");//al momento de agregar el producto al carrito redirecciona a la misma pagina, para evitar que se agrege dos veces
		}
	}
}else{
 // se crea la variable sesion
	if (isset($_GET['id'])) {//atravez del metodo get obtenemos el id del producto que se va a agregar al carrito
		$nombre="";
		$precio="";
		$imagen="";
		$res=$conexion->query('select * from productos where id='.$_GET['id'])or die($conexion->error);// se realizar un query para solicitar a la base de datos que nos traiga todos los datos del producto agregado al carrito
		$arreglocarrito=mysqli_fetch_row($res);// convierte la variable res en un arreglo
		$nombre=$arreglocarrito[1];
		$precio=$arreglocarrito[6];
		$imagen=$arreglocarrito[7]; 
		$arreglo[]= array( //se crea otro arreglo para guaradar los datos 
			'id'=>$_GET['id'],
			'nombre'=>$nombre,
			'precio'=>$precio,
			'imagen'=>$imagen,
			'cantidad'=> 1
		);
		$_SESSION['carrito']=$arreglo; // los datos del arreglo se pasan al metodo session
		header("Location: ./carrito.php");//al momento de agregar el producto al carrito redirecciona a la misma pagina, para evitar que se agrege dos veces
	}
}

?>
<?php
    require './php/cabecero.php'
  ?>



  <table class="table table-bordered"> <!--se crea la tabla donde se iran acomodando los productos-->
                <thead>
                  <tr>
                    <th class="product-thumbnail">Imagen</th>
                    <th class="product-name">Producto</th>
                    <th class="product-price">Precio</th>
                    <th class="product-quantity">Cantidad</th>
                    <th class="product-total">Total</th>
                    <th class="product-remove">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
  <?php
  if (isset($_SESSION['carrito'])) { //comprueba que la dfuncion session exista
  	$arreglocarrito=$_SESSION['carrito'];
  	for ($i=0; $i <count($arreglocarrito) ; $i++) { // count es el equivalente de .lenght, este for ira creando la tabla para ir agregando productos
  		// code...
  	 ?>
                  <tr>
                    <td class="product-thumbnail">
                      <img src="img/productos/<?php echo $arreglocarrito[$i]['imagen'];?>" alt="Image"  width="100" height="100" class="img-fluid">
                    </td>
                    <td class="product-name">
                      <h2 class="h6 text-black"><?php echo $arreglocarrito[$i]['nombre'];?></h2>
                    </td>
                    <td><?php echo $arreglocarrito[$i]['precio'];?></td>
                    <td>
                      <div align="center">	
                      <div class="input-group mb-3" style="max-width: 120px;">

                        <input type="text" class="form-control text-center txtCantidad" 
                        data-precio="<?php echo $arreglocarrito[$i]['precio'];?>"
                        data-id="<?php echo $arreglocarrito[$i]['id'];?>"
                        value="<?php echo $arreglocarrito[$i]['cantidad'];?>" placeholder="1" value="1" aria-label="Example text with button addon" aria-describedby="button-addon1">

                      </div>
                      </div>
                    </td>
                    <td class="cant<?php echo $arreglocarrito[$i]['id'];?>"><?php echo $arreglocarrito[$i]['precio']*$arreglocarrito[$i]['cantidad'];?></td>
                    <td><a href="#" class="btn btn-primary btn-sm btnEliminar" data-id="<?php echo $arreglocarrito[$i]['id']?>">Eliminar</a></td><!--el boton de elminar se le agrega el atributo id para identificarlo al momento de hacer uso de ello-->
                  </tr>
    <?php }} ?>              
              </tbody>
          </table>


<?php
    require './php/footer.php'
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> <!-- se incluye la libreria de jquery -->
<script>
	$(document).ready(function() {//se crea una funcion anonima en jquery
	$(".btnEliminar").click(function(event){
    event.preventDefault();//con esta funcion evitamos que el evento por defecto(recargar ) no suceda
    var id=$(this).data('id'); //la variable id toma el valor del id que tiene el boton
    var boton=$(this);
    $.ajax({ //atraves del metodo ajax solicitamos que envien atraves del metod post el id del objeto que deseamos eliminar
    	// alert(id);
    	method: 'POST',
    	url: './php/eliminarCarrito.php',
    	data:{
    		id:id
    	}
    }).done(function(respuesta){//se recibe el valor retornado por la funcion eliminarcarrito.php
    	boton.parent('td').parent('tr').remove();//se eliminan las celdas del producto eliminado 
      alert(respuesta);//se imprime el valor retornado por la funcion eliminarcarrito.php
    });
	});
	$(".txtCantidad").keyup(function(){
		var cantidad=$(this).val();
		var precio=$(this).data('precio');
		var id=$(this).data('id');
		var multipicacion=parseFloat(cantidad)* parseFloat(precio);
		$(".cant"+id).text(multipicacion);

		$.ajax({ //atraves del metodo ajax solicitamos que envien atraves del metod post el id del objeto que deseamos eliminar
		    	// alert(id);
		    	method: 'POST',
		    	url: './php/actualizarCarrito.php',
		    	data:{
		    		id:id,
		    		cantidad:cantidad
		    	}
		    }).done(function(respuesta){//se recibe el valor retornado por la funcion eliminarcarrito.php
		
		});
	});

});
</script>