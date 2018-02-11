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
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/Slider.js"></script>
	<script type="text/javascript" src="js/login.js"></script>
	<script type="text/javascript" src="js/wowslider.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="js/Validacion.js"></script>
	<script type="text/javascript" src="js/jquery.numeric.js"></script>
	<script type="text/javascript" src="FuncionAjax.js"></script>
	<script type="text/javascript" src="js/tipoletras.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<script type="text/javascript">
	$(document).ready(function(){
		$('#int_cantidad').numeric();
		$('#txt_tel').numeric();
		$('#btn_agregar').click(function(){
		var cmbCategoria = document.getElementById('cmb_elige');
		var categoria = cmbCategoria.options[cmbCategoria.selectedIndex].value;
		var caja = $('#int_exicaja').val();
		var total= $('#int_totalexis').val();
		var canti =$('#int_cantidad').val();
		if(categoria == 1){
			if(parseInt(canti) > parseInt(caja)){
				alert("La cantidad "+canti +" es mayor a la exsistencia");
				document.getElementById('int_cantidad').focus();
				return false;
			}
		}else{
			if(parseInt(canti) > parseInt(total)){
				alert("La cantidad "+canti +" es mayor a la exsistencia");
				document.getElementById('int_cantidad').focus();
				return false;
			}
		}
	});
	});
</script>
<script type="text/javascript">
 function seguircomprando(){
 	location.href='productos.php';
 }
 function ValidaSoloNumeros() {
 if ((event.keyCode < 48) || (event.keyCode > 57)) 
  event.returnValue = false;
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
				<div class="white"></div>
					<div id="ProductDetalle">
							<?php
							 $conexion= new Conexion();
							 $consulta=$conexion->Consulta("SELECT * FROM tbl_Productos Where Id_Producto=".$_GET['id']);
							 while ($fila=mysql_fetch_array($consulta)) {
							 	$id=$fila[0];
							 	$nombre=$fila[1];
							 	$imagen=$fila[2];
							 	$des=utf8_encode($fila[3]);
							 	$PrecioPresentacio=$fila[4];
							 	$PrecioUnitario=$fila[5];
							 	$ExistenciaPresentacio=$fila[6];
							 	$ExistenciaTotal=$fila[7];
							 	$ExistenciaTotalProduc=$fila[8];
							 ?>
							 <form id="form1" name="form1" method="POST" action="AgergarCarrito.php">
							 	<h3><center><?php echo $nombre?></center></h3><br>
							 	<div class="cajas"><img src="img/<?php echo $imagen?>"  width="250" height ="250"></div>
							 	<div class="descrip"><p> Descripcion:<br> <?php echo $des?></p><br>
								 	<p>Existencia por caja : <?php echo $ExistenciaPresentacio?></p>
								 	<p>Existencia Unitario: <?php echo $ExistenciaTotal ?></p>
								 	<p>Precio por Caja:  $ <?php echo $PrecioPresentacio ?></p>
								 	<p>Precio Unitario:  $ <?php echo $PrecioUnitario ?></p>
								 	<p>Elige como desea comprar el producto:</p>
								 	<select name="cmb_elige" class="cmb2" id="cmb_elige">
								 		<option value="0" selected="selected">--- Elige una opcion ---</option>
										<option value="1">Por Caja</option>
										<option value="2">Unitario</option>
								 	</select><br>
								 	<p>Catidad a comprar</p>
								 	<input name="int_exicaja" type="hidden" id="int_exicaja" value="<?php echo $ExistenciaPresentacio ?>">
								 	<input name="txtid" type="hidden" id="txtid" value="<?php echo$id?>">  
								 	<input name="int_cantotal" type="hidden" id="int_totalexis" value="<?php echo $ExistenciaTotalProduc ?>">
								 	<input name="int_cantidad" type="text" class="txt_num" id="int_cantidad" maxlength="10" placeholder="Cantidad..." required /><br><br>
								 	<input name="btn_agregar" type="submit" class="btn" id="btn_agregar" value="Carrito"></a>
								 	<button type="button" class="btn"  onclick='seguircomprando()'>Ir catalogo</button>
							 	</div>
							 </form>
							 <?php
							 }
							?>
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