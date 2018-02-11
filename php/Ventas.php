<?php
include_once('Conexion.php');
$conex = new Conexion();
$con = mysql_connect("localhost","root","") or die('Error en conexion a la DB');
mysql_select_db('db_sexshop', $con) or die('Error al seleccionar la DB');

session_start();
	$arreglo = $_SESSION['carrito'];
	$login = $_SESSION['Cliente'];
	$id="";
	$suma=0;
	$numeroventa=0;

	$re=mysql_query("SELECT * from tbl_ventas order by Id_Venta DESC limit 1") or die(mysql_error());	
	while (	$f=mysql_fetch_array($re)) {
			$numeroventa=$f['Id_Venta'];	
	}
	if($numeroventa==0){
		$numeroventa=1;
	}else{
		$numeroventa=$numeroventa+1;
	}
	
	$fecha="2015-03-24";
	for($i=0;$i<count($login);$i++){
		$id= $login[$i]['Id'];
	}
	for($i=0;$i<count($arreglo);$i++){
		$subtotal = $subtotal +($arreglo[$i]['Cantidad'] * $arreglo[$i]['Precio']);
		$totalVenta = $arreglo[$i]['Cantidad'] * $arreglo[$i]['Precio'] -($arreglo[$i]['Precio'] * $arreglo[$i]['Descuento']/ 100);
		$suma = $suma + $totalVenta;
	}
	for( $i =0; $i <count($arreglo); $i++){
		if ($arreglo[$i]['TipoCompra'] == "Unitario") {
			$re=mysql_query("INSERT INTO tbl_ventas values('$numeroventa','$fecha','$subtotal','$suma','2')");
			for($i=0; $i<count($arreglo); $i++){
				$res=mysql_query("INSERT INTO tbl_ventadetalle values(
				'".$numeroventa."',
				'".$arreglo[$i]['Id']."',	
				'".$arreglo[$i]['Cantidad']."',
				'".$arreglo[$i]['Precio']."'
				)");
				$resp= mysql_query("CALL ModificaExistencia1('".$arreglo[$i]['Id']."','".$arreglo[$i]['Cantidad']."')");
			}
		}else{
			$re=mysql_query("INSERT INTO tbl_ventas values('$numeroventa','$fecha','$subtotal','$suma','2')");

			for($i=0; $i<count($arreglo); $i++){
				$res=mysql_query("INSERT INTO tbl_ventadetalle values(
				'".$numeroventa."',
				'".$arreglo[$i]['Id']."',	
				'".$arreglo[$i]['Cantidad']."',
				'".$arreglo[$i]['Precio']."'
				)");
				$resp= mysql_query("CALL ModificaExistencia2('".$arreglo[$i]['Id']."','".$arreglo[$i]['Cantidad']."')");
			}
		}
	}
	
	header('location:../VerCarrito.php');
?>