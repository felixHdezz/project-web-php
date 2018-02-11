<?php
 include_once("php/Conexion.php");
 $producto=$_GET['variable'];
 $conexion= new Conexion();
 $consulta= $conexion->consulta("SELECT * FROM Busqueda where categoria like '%$producto%'");
 while ($fila=mysql_fetch_array($consulta)) {
 	$id=$fila[0];
 	$nombre=$fila[1];
 	$imagen=$fila[2];
 	$preci=$fila[3];
 	?>
 	<link rel="stylesheet" type="text/css" href="css/contenedor.css">
 	<!--<div id="CatalogoProductos">
 		<div id="CatalogoProduc">-->
 			<div class="caja">
 				<h2><?php echo $nombre ?></h2>
 				<img src="img/<?php echo $imagen ?>" width="200" height ="200">
 				<p>precio : $<?php echo number_format($preci,2) ?></p>
 				<div id="opc"><a href="AgergarCarrito.php?id= <?php echo $id ?>">Carrito</a>
 				<a href="Productodetalle.php?id=<?php echo $id ?>">Detalle</a></div>
 			</div>
 	  	<?php
  	}
?>