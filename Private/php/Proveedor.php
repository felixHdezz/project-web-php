<?php 
require_once('../php/Conexion.php');
 $conex = new Conexion();
$con = mysql_connect("localhost","root","") or die('Error en conexion a la DB');
mysql_select_db('db_sexshop', $con) or die('Error al seleccionar la DB');

$id=$_POST['id'];
$Emp=$_POST['emp'];
$direcc=$_POST['direc'];
$tel=$_POST['tel'];
$email=$_POST['email'];
$clave=$_GET['id'];
if (isset($_POST['accion'])) {
	$accion=$_POST['accion'];
}else{
	$accion=$_GET['accion'];
}

switch ($accion) {
	case 'insertar':
		$res = mysql_query("INSERT INTO tbl_proveedores values('$id','$Emp','$direcc','$tel','$email')");
		if(mysql_affected_rows()>0){
			echo "1";
		}else{
			echo "2";
		}
		break;
	case 'eliminar':
		$res = mysql_query("DELETE FROM tbl_proveedores WHERE Id_Proveedor ='$id'");
		if(mysql_affected_rows()>0){
			echo "1";
		}else{
			echo "2";
		}
		break;
	case 'modificar':
		$resul = mysql_query("UPDATE tbl_proveedores SET NombreEmpresa ='$Emp', Direccion='$direcc', Telefono='$tel', Email='$email' WHERE Id_Proveedor ='$id'");
		if(mysql_affected_rows()>0){
		  
		}else{
		
		  echo "2";
		}
		break;
	case 'seleccionado':
		$resul = $conex->trae_datos("SELECT * FROM tbl_proveedores WHERE Id_Proveedor='$clave'");
		break;
	case 'consulta':
			$conex->trae_datos("SELECT MAX(Id_Proveedor)+1 AS 'numero' FROM tbl_proveedores");
			break;
	default:

		break;
	}
?>