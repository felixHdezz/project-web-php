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
	<script type="text/javascript" src="js/Validaciones.js"></script>
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
					<div id="blanc">
				        <div id="CatalogoProductos">
				          <div id="CatalogoProduc">
							<form class="contact_form" action="" method="post" name="contact_form">
				              	<ul>
							    	<li>
							         	
							   		</li>
							   		<li>
							        	<label for="name">Nombre:</label>
							        	<input type="text" name="name" id="txt_nombre" required/>
							    	</li>
							    	<li>
									    <label for="website">Email:</label>
									    <input type="text" name="website" id="txt_correo" required/>
									</li>
									<li>
									    <label for="email">Asunto:</label>
									    <input type="text" name="email" id="txt_asunto" required/>
									</li>
									<li>
									    <label for="message">Mensaje:</label>
									    <textarea name="message"cols="45" rows="5" maxlength="300" required></textarea>
									</li>
									<li>
									    <button name="btnenviar" type="submit" class="btn" id="btn_enviar" value="Enviar">Enviar</button>
									</li>
							 	</ul>
		        		    </form>
		        		</div>
	        		</div>
	        	</div>
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