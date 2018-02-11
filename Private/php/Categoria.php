<?php
 require_once('../php/Conexion.php');
 $conex = new Conexion();
$con = mysql_connect("localhost","root","") or die('Error en conexion a la DB');
mysql_select_db('db_sexshop', $con) or die('Error al seleccionar la DB');
 
$nombre = $_POST['id'];
$pass = $_POST['cat'];
$accion="";
$id=$_GET['id'];
if (isset($_POST['accion'])) {
	$accion=$_POST['accion'];
}
else{
	$accion=$_GET['accion'];
}

switch ($accion) {
	case 'insertar':
		$res = mysql_query("INSERT INTO tbl_categorias VALUES('$nombre','$pass')");
		if(mysql_affected_rows()>0){
		echo "1";
		}else{
			echo "2";
		}
		break;
	case 'eliminar':
		$resul = mysql_query("DELETE FROM tbl_categorias WHERE Id_Categoria='$nombre'");
		if(mysql_affected_rows()>0){
		  
		}else{
		
		  echo "2";
		}
		break;
	case 'modificar':
		$resul = mysql_query("UPDATE tbl_categorias SET categoria ='$pass' WHERE Id_Categoria ='$nombre'");
		if(mysql_affected_rows()>0){
		  
		}else{
		
		  echo "2";
		}
		break;
	case 'seleccionado':
		$resul = $conex->trae_datos("SELECT * FROM tbl_categorias WHERE Id_Categoria='$id'");

		break;
	case 'consulta':
			$conex->trae_datos("SELECT MAX(Id_Categoria)+1 AS 'numero' FROM tbl_categorias");
			break;
	default:
		# code...
		break;
}
?>