<?php
	session_start();
	include_once('php/Conexion.php');
	$con = new Conexion();
	$id=$_POST['txtid'];
	$TipoCompra=$_POST['cmb_elige'];
	$cantidad=$_POST['int_cantidad'];
	$id=$_GET['id'];
	if(isset($_SESSION['carrito'])){
		if (isset($_POST['txtid'])) {
			$arreglo=$_SESSION['carrito'];
			$encontro=false;
			$numero=0;
			for($i=0;$i<count($arreglo);$i++){
				if($arreglo[$i]['Id']==$_POST['txtid']){
					$encontro=true;
					$numero=$i;
				}
			}
			if($encontro==true){
				$arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+$cantidad;
				$_SESSION['carrito']=$arreglo;
			}else{
				$id="";
				$nombre="";
				$precio=0;
				$imagen="";
				if($TipoCompra==1){
					$re=$con->Consulta("select * from tbl_Productos where Id_Producto=".$_POST['txtid']);
					while ($fila=mysql_fetch_array($re)) {
						$id=$fila[0];
						$nombre=$fila[1];
						$precio=$fila[4];
						$imagen=$f[2];
						$descuento=$fila[10];
						$tipo="Caja";
					}
					$datosNuevos=array('Id'=>$id,
						'Nombre'=>$nombre,
						'Precio'=>$precio,
						'Imagen'=>$imagen,
						'Cantidad'=>$cantidad,
						'Descuento'=>$descuento,
						'TipoCompra'=> $tipo);
					array_push($arreglo, $datosNuevos);
					$_SESSION['carrito']=$arreglo;

				}else{
					$re=$con->Consulta("select * from tbl_Productos where Id_Producto=".$_POST['txtid']);
					while ($fila=mysql_fetch_array($re)) {
						$id=$fila[0];
						$nombre=$fila[1];
						$precio=$fila[5];
						$imagen=$fila[2];
						$descuento=$fila[10];
						$tipo="Unitario";
					}
					$datosNuevos=array('Id'=>$id,
						'Nombre'=>$nombre,
						'Precio'=>$precio,
						'Imagen'=>$imagen,
						'Cantidad'=>$cantidad,
						'Descuento'=>$descuento,
						'TipoCompra'=> $tipo);
					array_push($arreglo, $datosNuevos);
					$_SESSION['carrito']=$arreglo;

				}
			}
 		 }else{
			if(isset($_GET['id'])){
				$arreglo=$_SESSION['carrito'];
				$encontro=false;
				$numero=0;
				for($i=0;$i<count($arreglo);$i++){
					if($arreglo[$i]['Id']==$_GET['id']){
						$encontro=true;
						$numero=$i;
					}
				}
				if($encontro==true){
					$arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
					$_SESSION['carrito']=$arreglo;
				}else{
					$id="";
					$nombre="";
					$precio=0;
					$imagen="";
					$re=$con->Consulta("select * from tbl_Productos where Id_Producto=".$_GET['id']);
					while ($fila=mysql_fetch_array($re)) {
						$id=$fila[0];
						$nombre=$fila[1];
						$precio=$fila[5];
						$imagen=$f[2];
						$descuento=$fila[10];
						$tipo="Unitario";
					}
					$datosNuevos=array('Id'=>$id,
						'Nombre'=>$nombre,
						'Precio'=>$precio,
						'Imagen'=>$imagen,
						'Cantidad'=>1,
						'Descuento'=>$descuento,
						'TipoCompra'=> $tipo);
					array_push($arreglo, $datosNuevos);
					$_SESSION['carrito']=$arreglo;
				}
			}
		}
	}else{
		if(isset($_POST['txtid'])){
			$id="";
			$nombre="";
			$precio=0;
			$imagen="";
			if($TipoCompra==1){
				$re=$con->Consulta("select * from tbl_Productos where Id_Producto=".$_POST['txtid']);
				while ($fila=mysql_fetch_array($re)) {
					$id=$fila[0];
					$nombre=$fila[1];
					$precio=$fila[4];
					$imagen=$fila[2];
					$descuento=$fila[10];
					$tipo="Caja";
				}
				$arreglo[]=array('Id'=>$id,
					'Nombre'=>$nombre,
					'Precio'=>$precio,
					'Imagen'=>$imagen,
					'Cantidad'=>$cantidad,
					'Descuento'=>$descuento,
					'TipoCompra'=> $tipo);
				$_SESSION['carrito']=$arreglo;
			}else{
				$re=$con->Consulta("select * from tbl_Productos where Id_Producto=".$_POST['txtid']);
				while ($fila=mysql_fetch_array($re)) {
					$id=$fila[0];
					$nombre=$fila[1];
					$precio=$fila[5];
					$imagen=$fila[2];
					$descuento=$fila[10];
					$tipo="Unitario";
				}
				$arreglo[]=array('Id'=>$id,
					'Nombre'=>$nombre,
					'Precio'=>$precio,
					'Imagen'=>$imagen,
					'Cantidad'=>$cantidad,
					'Descuento'=>$descuento,
					'TipoCompra'=> $tipo);
				$_SESSION['carrito']=$arreglo;
			}	
		}else{
			if(isset($_GET['id'])){
				$id="";
				$nombre="";
				$precio=0;
				$imagen="";
				$re=$con->Consulta("select * from tbl_Productos where Id_Producto=".$_GET['id']);
				while ($fila=mysql_fetch_array($re)) {
					$id=$fila[0];
					$nombre=$fila[1];
					$precio=$fila[5];
					$imagen=$fila[2];
					$descuento=$fila[10];
					$tipo="Unitario";
				}
				$arreglo[]=array('Id'=>$id,
					'Nombre'=>$nombre,
					'Precio'=>$precio,
					'Imagen'=>$imagen,
					'Cantidad'=>1,
					'Descuento'=>$descuento,
					'TipoCompra'=> $tipo);
				$_SESSION['carrito']=$arreglo;
			}
		}
	}
header("location:Productos.php");
?>