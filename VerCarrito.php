<?php
 session_start();
 if(isset($_SESSION['carrito'])) 
 $carro=$_SESSION['carrito'];else $carro=false; 

if(isset($_SESSION['Cliente'])) 
 	$login=$_SESSION['Cliente'];
	else 
		$login=false;

?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>PROYECTO SEX SHOP</title>
	<link rel="stylesheet" href="css/contenedor.css"  type="text/css">
	<link rel="stylesheet" type="text/css" href="css/Slider.css">
	<link rel="stylesheet" type="text/css" href="css/EtiloCategorias">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/Slider.js"></script>
	<script type="text/javascript" src="js/login.js"></script>
	<script type="text/javascript" src="js/wowslider.js"></script>
	<script type="text/javascript" src="FuncionAjax.js"></script>
	<script type="text/javascript" src="js/Validaciones.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
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
						<h3 align="center">Mi carrito de compras</h3>
						<?php  
						if($carro){ 
						?>
						<form name="frmregiscate" method="POST" action="">
						<table width="720" border="0" align="center"cellspacing="0" cellpadding="0" align="center"> 
						<tr  class="tit">  
						<td width="105" align="center">Producto</td> 
						<td width="70" align="center">Precio</td> 
						<td width="100" align="center">Descuento</td>
						<td width="105" align="center">Tipo Compra</td>
						<td colspan="2" align="center">Cantidad</td> 
						<td width="100" align="center">Opcion</td> 
						</tr> 
						<?php 
						$color=array("#ffffff","#F0F0F0"); 
						$contador=0; 
						$suma=0;
						$suma2=0;
						foreach($carro as $k => $v){ 
							$subto=$v['Cantidad']*$v['Precio']; 
							$Total =$v['Cantidad']*$v['Precio']-($v['Precio'] * $v['Descuento']/100);
							$suma=$suma+$subto;
							$suma2=$suma2+$Total;
							$contador++;
							?> 
						<form name="a<?php echo $v['Id'] ?>" method="post" action="agregacar.php?<?php echo SID ?>" id="a<?php echo $v['identificador'] ?>"> 
						<tr bgcolor="<?php echo $color[2]; ?>" class='prod'>  
						<td width="105" align="center"><?php echo $v['Nombre'] ?></td> 
						<td width="70" align="center"><?php echo $v['Precio'] ?></td> 
						<td width="100" align="center"><?php echo $v['Descuento']?>%</td> 
						<td width="60" align="center"><?php echo $v['TipoCompra'] ?></td>
						<td width="43" align="center"><?php echo $v['cantidad'] ?></td> 
						<td width="80" align="center">  
						<input name="cantidad" type="text" id="cantidad" value="<?php echo $v['Cantidad'] ?>" size="5"> 
						<input name="id" type="hidden" id="id" value="<?php echo $v['id'] ?>"> </td> 
						<td align="center"><a href="php/EliminarProductoCarrito.php?<?php echo SID ?>id=<?php echo $v['Id'] ?>">Eliminar</a></td> 
						</tr></form> 
						<?php 
						} 
						?> 
						</table> 
						<div id="c">
							<input type="submit" class="btn" id="vaciarcarrito" value="Vaciar Carrito">
							<?php
							 if($login){
							?>
							 	<form name="frmregiscate" method="POST" action="php/Ventas.php">
									<input type="submit" class="btn" id="compra" value="Realizar Compra"/>
						</form>
							<?php
							 }else{

							 }
							 ?>
							
						</div>
						</form>
						<div align="center"><span class="prod">Total de Artículos: <?php echo count($carro); 
						 ?></span>  
						</div><br> 
						<div align="center"><span class="prod">Subtotal de venta: $<?php echo number_format($suma,2); 
						?></span>  
						</div><br> 
						<div align="center"><span class="prod">Total venta: $<?php echo number_format($suma2,2); 
						?></span>  
						</div><br> 
						<div align="center"><span class="prod">Continuar la selección de productos</span>  
						<a href="Productos.php?<?php echo SID;?>">Continuar 
						</a>  
						</div> 
						<?php }else{ ?> 
						<p align="center"> <span class="prod">No hay productos seleccionados</span> 
						<a href="Productos.php?<?php echo SID;?>"> 
						Ir a Catalogos</a>  
						<?php 
						}
						if($suma!=0){
							//echo '<center><a href="./compras/compras.php" class="aceptar">Comprar</a></center>';
						?>
						
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post" id="formulario">
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="upload" value="1">
							<input type="hidden" name="business" value="lfhlx2013@hotmail.com">
							<input type="hidden" name="currency_code" value="MXN">
							<?php 
								for($i=0;$i<count($carro);$i++){
							?>
								<input type="hidden" name="item_name_<?php echo $i+1;?>" value="<?php echo $carro[$i]['Nombre'];?>">
								<input type="hidden" name="amount_<?php echo $i+1;?>" value="<?php echo $carro[$i]['Precio'];?>">
								<input	type="hidden" name="quantity_<?php echo $i+1;?>" value="<?php echo $carro[$i]['Cantidad'];?>">	
							<?php 
								}
							if($login){
							?>
							<center><input type="submit" value="Finalizar compra" class="btn"></center>
							<?php
							}else{}
							?>	
						</form>
						<?php
						}
						?>	
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