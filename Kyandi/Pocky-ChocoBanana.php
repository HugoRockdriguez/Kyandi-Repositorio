<?php
 include("./php/conexioncarrito.php");
 if (isset($_GET['id'])) {
 	$resultado=$conexion->query("select * from productos where id=".$_GET['id'])or die($conexion->error);
 	if (mysqli_num_rows($resultado)>0) {
 		$fila= mysqli_fetch_row($resultado);
 	}else{ 
 		header("Location: ./index.html");
 	}
 }
 else{
 	header("Location: ./index.php");
 }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pocky Choco-Banana</title>
	<meta charset="utf-8">
	<meta name="description" content="Dulceria, Japon, Kawaii"/>
	<meta name="keywords" content="Pocky, Kokeiya, Honkaku"/>
	<meta name="robot" content="index,follow"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
	<!--Encabezado: Titulo y logotipos-->
	<div class="header container-fluid">
		<div class="row">
			<div class="col-4">
				<img src="img/logo1.png" alt="Logo 1">
			</div>
			<div class="col-4">
				<p>キャンディー<br>= Kyandī =</p>
			</div>
			<div class="col-4">
				<a href="acceso.html"><img src="img/user.png" alt="Logo 2" class="float-right" style="padding-top: 22px;" title="Mi perfil"></a>
			</div>
		</div>
	</div>
	<div class="col" style="box-shadow: 0 0 10px .25px black;"></div>

	<!--Barra de navegación-->
	<nav class="navigation">
		<ul>
			<li><a href="index.html">Inicio</a></li>
			<li><a href="#">Novedades</a></li>
			<li><a href="#">Ofertas</a></li>
		</ul>
	</nav>
	<div class="col" style=" position: relative; height: 3px; border-color: #c5930a; background-color: #e94e77"></div>

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
				<input type="image" src="img/carrito(v2).png" border="0" name="submit" alt="PayPal" width="90" height="90">
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
	
	<footer>		
		<!--Pie de pagina 1-->
	<div class="footer1">
	<div class="row">
		<div class="col-2"></div>
		<div class="col-2">
			<ul>
				<li style="font-size: 20px; font-family: Georgia;">
					<a href="terminos_codiciones.html" style="color: inherit;"><h6>Terminos y Condiciones</h6></a>
				</li>
			</ul>
		</div>
		<div class="col-4">
			<p style="font-size: 15px; font-family: Georgia; text-align: justify;">Hecho en México, todos los derechos reservados 2021. Esta página ha sido desarrollada por estudiantes de la Facultad de Estudios Superiores Cuautitlán.</p>
		</div>
		<div class="col-3">
				<li style="font-size: 18px; font-family: Georgia;">Aviso de privacidad</li>
		</div>
	</div>		
	</div>


	<!--Pie de pagina 2-->
	<div class="footer2">
		<p style="font-size: 18px; color: #ffffff; font-family: Arial; text-align: center;"><br>Facultad de Estudios Superiores Cuautitlán<br>Licenciatura en Informática<br>2021.</p>
	</div>
	</footer>
</body>
</html>