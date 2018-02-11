<?php
  session_start();
  if(isset($_SESSION['Usuario'])){

  }else{
     header('location:../Login.php');
  }
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>PROYECTO SEX SHOP</title>
	<link rel="stylesheet" href="css/contenedor.css"  type="text/css">
	<link rel="stylesheet" type="text/css" href="css/Slider.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/Slider.js"></script>
</head>
<body>
	<div id="contened">
		<header>
			<div id="title">
				<div id="img">
				</div>
			</div>
			<div style="clear:both"></div>
			<div style="clear:both"></div>
			<nav>
				<ul class="nav">
					<li><a href="home.php">Inicio</a></li>
					<li><img src="../img/Slider/navsep.gif" alt="" width="40" height="13" /></li>
					<li><a href="Clientes.php">Clientes</a></li>
					<li><img src="../img/Slider/navsep.gif" alt="" width="40" height="13" /></li>
					<li><a href="Proveedores.php">Proveedores</a></li>
					<li><img src="../img/Slider/navsep.gif" alt="" width="40" height="13" /></li>
					<li><a href="Categorias.php">Categoria</a>
					<li><img src="../img/Slider/navsep.gif" alt="" width="40" height="13" /></li>
					<li><a href="Productos.php">Productos</a></li>
					<li><img src="../img/Slider/navsep.gif" alt="" width="40" height="13" /></li>
					<li><a href="">Acerca</a>
						 <ul>
						 	<li><a href="">Acerca de..</a></li>
						 	<li><a href="">Ayuda</a></li>
						 </ul>
					</li>
					<li><img src="../img/Slider/navsep.gif" alt="" width="40" height="13" /></li>
					<li><a href="php/cerrarsesion.php">Salir</a></li>
				</ul>
			</nav>
			<div style="clear:both"></div></br>
		</header>
		<section>
			<h1><center>Bienvenido al sistema</center></h1><br>
			<h3><center>Tienda "SEX SHOP"</center></h3>
		</section>
		<div style="clear:both"></div></br>
		<footer>
		Inicio| Productos| Conocenos<br />
        Copyright © 2015 SEX SHOP "Hay te voy" universidad tecnologica de la huasteca hidalguense
		</footer>
	</div>
</body>
</html>