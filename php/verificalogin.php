<?php
 session_start();
 include_once('Conexion.php');
 $us=$_POST['txt_user'];
 $con=$_POST['txtps_password'];
 $conexio = new Conexion();
 $tipo="";
 $consulta= $conexio->Consulta("SELECT * FROM tbl_clientes WHERE Usuario ='$us' AND Contrasena='$con'");
 while ($f=mysql_fetch_array($consulta)) {
 		$tipo=$f[10];
		$arreglo[]=array('ID'=>$f[0],'Nombre'=>$f[2],
			'Apellido'=>$f[3],'Imagen'=>$f['Imagen']);
	}
	if(isset($arreglo)){
		if ($tipo=="ADMINISTRADOR") {
		 	$_SESSION['Usuario']=$arreglo;
			header("Location: ../Private/home.php");
		}else{
			if ($tipo=="CLIENTE" || $tipo=="Cliente") {
				$_SESSION['Cliente']=$arreglo;
				header("Location: ../index.php");
			}
		}
	}else{
		header("Location: ../login.php?error=1");
	}
?>