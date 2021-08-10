 <?php
    require './php/cabecero.php'
  ?>
		<!--Carrusel-->
<div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel" style="background-color: #DADCFF">
	  <ol class="carousel-indicators">
	    <li data-target="#carouselExampleIndicators1" data-slide-to="0" class="active"></li>
	    <li data-target="#carouselExampleIndicators1" data-slide-to="1"></li>
	    <li data-target="#carouselExampleIndicators1" data-slide-to="2"></li>
  </ol>
	  <div class="carousel-inner" role="listbox">
	    <div class="carousel-item active"> <a href="#"><img src="img/fanta.png" alt="First slide" width="700" height="300" class="d-block mx-auto"></a>
        </div>
	    <div class="carousel-item"> <a href="#"><img src="img/poke.jpg" alt="Second slide" width="700" height="300" class="d-block mx-auto"></a>
        </div>
	    <div class="carousel-item"> <a href="#"><img src="img/pocky.png" alt="Third slide" width="700" height="300" class="d-block mx-auto"></a>
        </div>
  </div>
	  <a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
</div>
	
	<!--Contenido principal de la pagina-->
	<main class="offer">
		<div class="row">
			<div class="col-5">
				<a href="galletas.php"><img src="./img/galleta_icon(v2).png" alt="Galletas" width="250" height="250"></a>
			</div>
			<div class="col-5">
				<a href="bebidas.php"><img src="./img/soda-icon(v2).png" title="Portada" alt="Bebidas" width="250" height="250"></a>
			</div>
		</div>
		
		<div class="row">
			<div class="col-5">
				<a href="snacks.php"><img src="./img/snack-icon.png" alt="Snacks" width="250" height="250"></a>
			</div>
			<div class="col-5">
				<a href="ramen.php"><img src="./img/ramen-icon(v2).png" alt="ramen" width="250" height="250"></a>
			</div>
		</div>

	</main>
	
<?php
    require './php/footer.php'
  ?>
