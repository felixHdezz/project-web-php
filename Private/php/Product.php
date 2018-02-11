<?php
require_once('../php/Conexion.php');
$conex = new Conexion();
$con = mysql_connect("localhost","root","") or die('Error en conexion a la DB');
mysql_select_db('db_sexshop', $con) or die('Error al seleccionar la DB');

$id=$_POST['id'];
$nomb=$_POST['nom'];
$imgn=$_POST['img'];
$des=$_POST['des'];
$preca=$_POST['preca'];
$preuni=$_POST['preuni'];
$exCaja=$_POST['exica'];
$exUni=$_POST['exiuni'];
$extotal=$_POST['extotal'];
$desc=$_POST['desc'];
$can=$_POST['cant'];
$cat=$_POST['cat'];
$prove=$_POST['prov'];

$clave=$_GET['id'];
if (isset($_POST['accion'])) {
	$accion=$_POST['accion'];
}else{
	$accion=$_GET['accion'];
}

switch ($accion) {
	case 'seleccionado':
		$resul = $conex->trae_datos("SELECT * FROM tbl_categorias");
		break;
	case 'comboProvee':
		$resul = $conex->trae_datos("SELECT * FROM tbl_proveedores");
		break;
	case 'insertar':
		$res = mysql_query("INSERT INTO tbl_productos VALUES('$id','$nomb','$imgn','$des','$preca','$preuni','$exCaja','$exUni','$extotal','$can','$desc','$cat','$prove')");
		$resul = mysql_query("CALL AumentaProducto('$id','$can')");
		if(mysql_affected_rows()>0){
			echo "1";
		}else{
			echo "2";
		}
		break;
	case 'eliminar':
		$ar =array();
		$res = mysql_query("DELETE FROM tbl_productos where Id_Producto ='$id'");
		if(mysql_affected_rows()>0){
			$ar['val']=1;	
		}else{
			$ar['val']=1;	
		}
		echo json_encode($ar);
		break;
	case 'modificar':
		$resul = mysql_query("UPDATE tbl_productos SET Producto='$nomb', Imagen='$imgn', Descripcion ='$des', PrecioxPresentacion='$preca', PrecioUnitario ='$preuni', ExistenciaPresentacion='$exCaja', Existenciaunitario='$exUni', ExistenciaTotal= '$extotal', Cantidad='$can', Descuento='$desc', Id_categoria='$cat', Id_Proveedor='$prove' WHERE Id_Producto ='$id'");
		$resul = mysql_query("CALL AumentaProducto('$id','$can')");
		if(mysql_affected_rows()>0){
		  echo "1";
		}else{
		
		  echo "2";
		}
		break;
	case 'selecciona':
		$resul = $conex->trae_datos("SELECT * FROM tbl_productos WHERE Id_Producto='$clave'");
		break;
	case 'consulta':
			$conex->trae_datos("SELECT MAX(Id_Producto)+1 AS 'numero' FROM tbl_productos");
			break;
	default:
		# code...
		break;
	}
?>