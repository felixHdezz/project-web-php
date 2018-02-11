<?php
 session_start();
 if(isset($_SESSION['Cliente'])) 
 $login=$_SESSION['Cliente'];else $login=false; 
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>PROYECTO SEX SHOP</title>
	<link rel="stylesheet" href="css/contenedor.css"  type="text/css">
	<link rel="stylesheet" type="text/css" href="css/Slider.css">
	<link rel="stylesheet" type="text/css" href="css/EtiloCategorias">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/Login.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/login.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="js/wowslider.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="FuncionAjax.js"></script>
</head>
<body>
	<?php 
	if ($login) {
		foreach($login as $k => $v){
	?>
	<div id="cliente">
		<div id="img2"><img src="phone/cliente.png" width="30" height="30"></div> Nombre: <?php echo $v['Nombre']?> <?php echo $v['Apellido']?>  <a href="php/cerrarsesion.php">Cerar sesion</a>
	</div>
	<?php
		}
	 }else{}
	?>
	<div id="contened">
		<header>
			<div id="title">
				<div id="img">
				</div>
			</div>
			<div style="clear:both"></div>
			<div style="clear:both"></div>
			<?php
			if($login){
			?>
			<nav>
				<ul class="nav">
					<li><a href="index.php">Inicio</a></li>
					<li><img src="img/Slider/navsep.gif" alt="" width="40" height="13" /></li>
					<li><a href="Productos.php">Productos</a></li>
					<li><img src="img/Slider/navsep.gif" alt="" width="40" height="13" /></li>
					<li><a href="VerCarrito.php">Carrito</a></li>
					<li><img src="img/Slider/navsep.gif" alt="" width="40" height="13" /></li>
					<li><a href="NuestraEmpresa.php">Nuestra Empresa</a></li>
					<li><img src="img/Slider/navsep.gif" alt="" width="40" height="13" /></li>
          			<li><a href="Contacto.php">Contacto</a></li>
					<li><img src="img/Slider/navsep.gif" alt="" width="40" height="13" /></li>
					<li><a href="">Acerca</a>
						 <ul>
						 	<li><a href="">Ayuda</a></li>
						 </ul>
					</li>
				</ul>
			</nav>
			<?php
			}else{
			?>
				<nav>
				<ul class="nav">
					<li><a href="index.php">Inicio</a></li>
					<li><img src="img/Slider/navsep.gif" alt="" width="40" height="13" /></li>
					<li><a href="Productos.php">Productos</a></li>
					<li><img src="img/Slider/navsep.gif" alt="" width="40" height="13" /></li>
					<li><a href="VerCarrito.php">Carrito</a></li>
					<li><img src="img/Slider/navsep.gif" alt="" width="40" height="13" /></li>
					<li><a href="NuestraEmpresa.php">Nuestra Empresa</a></li>
					<li><img src="img/Slider/navsep.gif" alt="" width="40" height="13" /></li>
          			<li><a href="Contacto.php">Contacto</a></li>
          			<li><img src="img/Slider/navsep.gif" alt="" width="40" height="13" /></li>
					<li><a href="Login.php">Login</a></li>
					<li><img src="img/Slider/navsep.gif" alt="" width="40" height="13" /></li>
					<li><a href="">Acerca</a>
						 <ul>
						 	<li><a href="">Ayuda</a></li>
						 </ul>
					</li>
				</ul>
			</nav>
			<?php
			}
			?>
			<div style="clear:both"></div></br>
		</header>
		<section>
			<div id="blanco"></div>
			<div id="inc">
				<div id="intro">
				<!-- Start WOWSlider.com BODY section -->
	  				<div id="wowslider-container1">
						<div class="ws_images">
							<ul>

								<li><img src="img/Slider/slider_1.jpg" alt="slider_1" title="slider_1" id="wows1_0"/></li>
								<li><img src="img/Slider/slider_2.jpg" alt="slider_2" title="slider_2" id="wows1_1"/></li>
								<li><img src="img/Slider/slider_4.jpg" alt="slider_4" title="slider_4" id="wows1_2"/></li>
							</ul>
						</div>
						<div class="ws_bullets">
							<div>
								<a href="#" title="slider_1"><img src="img/Slider/slider_1.jpg" alt="slider_1"/>1</a>
								<a href="#" title="slider_2"><img src="img/Slider/slider_2.jpg" alt="slider_2"/>2</a>
								<a href="#" title="slider_4"><img src="img/Slider/slider_4.jpg" alt="slider_4"/>3</a>
							</div>
				</div>
				<span class="wsl"><a href="http://wowslider.com">Responsive Slideshow</a> by WOWSlider.com v4.9</span>
				<div class="ws_shadow"></div>
				</div>
			</div><br>
			<div id="B"></div>
			<div id="im"></div>
				BIENVENIDO!<br>
				Encuentra en sexshop 'hay te voy ' todo para tu entretenimiento<br><br>
				<p>Navega a través de nuestro catálogo y descubre como tus sentidos te pueden llevar a explorar nuevas sensaciones. Ofrecemos toda clase de productos para todos los gustos.
				Además en nuestro blog encontraras mucha información que hará que tus experiencias sean aun mejores; con tips, información e historias descubrirás que el mundo del sexo no tiene límites.
				</p>
			</div>
		</section>
		<div style="clear:both"></div></br>
		<footer>
		<a href="Index.php">Inicio</a>|<a href="Productos.php">Productos</a>|<a href="#">Conocenos</a><br/>
        Copyright © 2015 SEX SHOP "Ay te voy" universidad tecnologica de la huasteca hidalguense<br>
        <a href="Terminos.php">Termino y condiciones</a>
		</footer>
	</div>
</body>
</html>