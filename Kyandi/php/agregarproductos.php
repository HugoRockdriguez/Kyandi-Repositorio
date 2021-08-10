<?php
require_once "crudproductos.php";// recibimos los datos del formulario atravez del metodo post
$crud= new crudproductos();
$nombre=$_POST['nombreproducto'];
$caducidad=$_POST['caducidad'];
$precio=$_POST['precio'];
$info=$_POST['infnutricional'];
$descripcion=$_POST['descripcion'];
$ingredientes=$_POST['ingredientes'];
$inventario=$_POST['inventario'];
$sabor=$_POST['sabor'];
$categoria=$_POST['categoria'];
$cantidad=$_POST['cantidad'];
$idcategoria="";
$imagen=$_FILES['imagen']['name'];//se obtiene el nombre de la imagen
$ruta=$_FILES["imagen"]["tmp_name"];//se obtiene el directorio de donde se esta tomando la imagen
$destino="../img/productos/".$imagen;//atrves de la variable destino agregamos la ruta a la cual queremos copiar la imagen seleccionada
move_uploaded_file($ruta,$destino);//atrves de esta funcion copiamos la imagen selccionada desde la ruta  original hasta la ruta donde se va a guardar nuestra imagen 
switch ($categoria) {//este switch asigna un valor numerico a la categoria y lo recepciona la variable idcategoria
	case 'Galletas':
		$idcategoria=1;
		break;
    case 'Bebidas':
		$idcategoria=2;
		break;
	case 'Snacks':
		$idcategoria=3;
		break;
	case 'Ramen':
		$idcategoria=4;
		break;		
}

if ($_GET['id']==1) { //atravez del metodo get identificamos el valor del id para ejecutar la funcion correcta 
$var=$crud->agregar($nombre,$caducidad,$precio,$info,$descripcion,$ingredientes,$inventario,$sabor,$idcategoria,$cantidad,$imagen);	
if($var==1){
echo("
    <script>
      alert('Producto Agregado Correctamente');
      location.href='../insertarproductos.php';
    </script>
	");
}
else{
 echo("
    <script>
      alert('Error al agregar el producto'.$var);
      location.href='../insertarproductos.php';
    </script>
	"); 	
}
}// if ($_GET['id']==1)


if ($_GET['id']==2) { //atravez del metodo get identificamos el valor del id para ejecutar la funcion correcta 
$codbar=$_POST['id'];
$sql="";

if ($imagen=="") {
$sql="UPDATE `productos` SET `nombre`='$nombre',`descripcion`='$descripcion',`ingredientes`='$ingredientes',`inf_nutricional`='$info',`caducidad`='$caducidad',`precio`='$precio',`inventario`='$inventario',`id_categoria`='$idcategoria',`cantidad`='$cantidad',`sabor`='$sabor' WHERE id=$codbar";
}else{
	$sql="UPDATE `productos` SET `nombre`='$nombre',`descripcion`='$descripcion',`ingredientes`='$ingredientes',`inf_nutricional`='$info',`caducidad`='$caducidad',`precio`='$precio',`imagen`='$imagen',`inventario`='$inventario',`id_categoria`='$idcategoria',`cantidad`='$cantidad',`sabor`='$sabor' WHERE id=$codbar";
}

$var=$crud->actulizar($sql);//$nombre,$caducidad,$precio,$info,$descripcion,$ingredientes,$inventario,$sabor,$idcategoria,$cantidad,$codbar

if($var==1){
echo("
    <script>
      alert('Producto Actualizado Correctamente');
      location.href='../actualizarproducto.php';
    </script>
	");
}
else{
 echo("
    <script>
      alert('Error al actualizar el producto'.$var);
      location.href='../actualizarproducto.php';
    </script>
	"); 	
}
}// if ($_GET['id']==2)


if ($_GET['id']==3) { //atravez del metodo get identificamos el valor del id para ejecutar la funcion correcta 
$codbar=$_POST['id'];
$sql="DELETE FROM `productos` WHERE id='$codbar'";
$var=$crud->eliminar($sql);//$nombre,$caducidad,$precio,$info,$descripcion,$ingredientes,$inventario,$sabor,$idcategoria,$cantidad,$codbar

if($var==1){
echo("
    <script>
      alert('Producto Eliminado Correctamente');
      location.href='../actualizarproducto.php';
    </script>
	");
}
else{
 echo("
    <script>
      alert('Error al actualizar el producto'.$var);
      location.href='../actualizarproducto.php';
    </script>
	"); 	
}
}// if ($_GET['id']==3)


?>
