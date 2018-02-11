<?php 
	require_once('../php/Conexion.php');
	$conex = new Conexion();
	$con = mysql_connect("localhost","root","") or die('Error en conexion a la DB');
	mysql_select_db('db_sexshop', $con) or die('Error al seleccionar la DB');
	$id=$_POST['id'];
	$rfc=$_POST['rfc'];
	$nom=$_POST['nom'];
	$ap=$_POST['ap'];
	$am=$_POST['am'];
	$direc=$_POST['direc'];
	$tel=$_POST['tel'];
	$email=$_POST['email'];
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	$tipo=$_POST['tipo'];
	$clave=$_GET['id'];
	if (isset($_POST['accion'])) {
		$accion=$_POST['accion'];
	}else{
		$accion=$_GET['accion'];
	}
	switch ($accion) {
		case 'insertar':
			$res = mysql_query("INSERT INTO tbl_clientes values('$id','$rfc','$nom','$ap','$am','$direc','$tel','$email','$user','$pass','$tipo')");
			if(mysql_affected_rows()>0){
				echo "1";
			}else{
				echo "2";
			}
			break;
		case 'eliminar':
			$res = mysql_query("DELETE FROM tbl_clientes where Id_Cliente ='$id'");
			if(mysql_affected_rows()>0){
				echo "1";
			}else{
				echo "2";
			}
			break;
		case 'modificar':
			$resul = mysql_query("UPDATE tbl_clientes SET rfc ='$rfc', Nombre='$nom', ApellidoP='$ap', ApellidoM='$am',Direccion='$direc',Telefono ='$tel',Email='$email',Usuario='$user',Contrasena='$pass' WHERE Id_Cliente ='$id'");
			if(mysql_affected_rows()>0){
			  
			}else{
			
			  echo "2";
			}
			break;
		case 'seleccionado':
			$resul = $conex->trae_datos("SELECT * FROM tbl_clientes WHERE Id_Cliente='$clave'");
			break;
		case 'consulta':
				$conex->trae_datos("SELECT MAX(Id_Cliente)+1 AS 'numero' FROM tbl_clientes");
				break;
		default:
			break;
	}
?>