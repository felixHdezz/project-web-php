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
	<link rel="stylesheet" type="text/css" href="css/EtiloCategorias.css">
	<link rel="stylesheet" type="text/css" href="css/Login.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/Slider.js"></script>
	<script type="text/javascript" src="js/login.js"></script>
	<script type="text/javascript" src="js/wowslider.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="FuncionAjax.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<style type="text/css">
  #error{
    color: red;
    font-size: 16px;
  }
</style>
<script type="text/javascript">
 function private(){
 	location.href="Private/home.php"
 }
</script>
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
			<!--Apartir de este linea de codigo empieza para el menu de navegacion-->
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
				<div id="Buscar">
				<div id="Contenido">
					<input type="text" name="text1" id="text1"placeholder="Buscar...">
					<input type="button" class="btn1"  id="btn_Buscar" onclick="ejecuta(text1.value)"value="Buscar"></input>
				</div>
			</div>
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
				<div id="Buscar">
				<div id="Contenido">
					<input type="text" name="text1" id="text1"placeholder="Buscar...">
					<input type="button" class="btn1"  id="btn_Buscar" onclick="ejecuta(text1.value)"value="Buscar"></input>
				</div>
			</div>
			</nav>
			<?php
			}
			?>
			<!--Aqui termina el menu de navegacion-->
			<div style="clear:both"></div></br>
		</header>
		<section>
			<div id="blancn"></div>
			<div class="cont">
				<div id="MenuCategorias">
					<?php
						/*Aqui incluimos la clase de conexion de la base de datos*/
						include_once('php/Conexion.php');
						/*Aqui realizamos una nueva conexion*/
						$conexion= new Conexion();
						/*consultamos a la base de datos*/
						$consulta=$conexion->Consulta("SELECT * FROM tbl_categorias ORDER BY Id_categoria ASC");
						echo ('<div class="contenedCategoria">');
						echo('<div class="cat">Categorias</div>');
						echo ('<ul>');
						while ($fila=mysql_fetch_array($consulta)) {
							echo ('<li><a href="productos.php?clave='.$fila[0].'">'.utf8_encode($fila[1]).'</a></li>');
						}
						echo('</ul>');
						echo"</div>";
					?>
				</div>
				<div id="espacio"></div>
				<div id="login">
					 <form id="form11" name="form1" method="post"  action="./php/verificalogin.php">
          				     <center>Terminos y condiciones?</center><br>
          				      Condiciones generales<br>

							Al ingresar, navegar y comprar a través de este sitio significa que entiende y acepta los términos y condiciones de nuestro sitio Sex Shop "Ay te voy" Si no está de acuerdo con estos términos de uso, por favor no utilice este sitio web.<br>

							1.- Es persona con capacidad y autoridad de realizar compras y pagos en línea en este sitio.<br>
							2.- Es mayor de 18 años y/o cumple con la mayoría de edad de su país de residencia.<br>
							3.- Ingresa voluntariamente a este sitio con un total conocimiento de la información contenida en el mismo y comprende que puede ser ofensiva para algunas personas, si ese es su caso, por favor abandone nuestro sitio.

       	 			 </form>
       		 	</div>
       		</div>
		</section>
		<div style="clear:both"></div></br>
		<footer>
		<a href="Index.php">Inicio</a>|<a href="Productos.php">Productos</a>|<a href="#">Conocenos</a><br/>
        Copyright © 2015 SEX SHOP "Ay te voy" universidad tecnologica de la huasteca hidalguense
        <a href="Terminos.php">Termino y condiciones</a>
		</footer>
	</div>
</body>
</html>