<?php
  session_start();
  if(isset($_SESSION['Usuario'])){

  }else{
     header('location:../Login.php');
  }
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>PROYECTO SEX SHOP</title>
	<link rel="stylesheet" href="css/contenedor.css"  type="text/css">
	<link rel="stylesheet" type="text/css" href="css/Slider.css">
	<link rel="stylesheet" type="text/css" href="css/table.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/Slider.js"></script>
  <script type="text/javascript" src="js/Clientes.js"></script>
  <script type="text/javascript" src="js/jquery.numeric.js"></script>
</head>
<body>
	<div id ="div_bloque"></div>
  <div id="oculto"> 
          <p>&nbsp;</p>
          <div id="id">
            <p class="tit" align="center" id="ptit">&quot;Registro de Clientes&quot;</p>
          </div>
          <p>&nbsp; </p>
          <form id="frmregiscate" name="frmregiscate" method="post" action="">
            <p>&nbsp;</p>
            <table width="351" border="0" align="center">
              <tr>Datos Generales</tr>
              <tr>
                  <td width="130" align="right" valign="middle" class="prf">Clave:</td>
                  <td width="211" align="left" valign="middle">
                  <input name="txt_curp" type="text" class="txt_text" id="txt_ID" maxlength="10" value="" required/></td>
              </tr>
              <tr>
                  <td width="130" align="right" valign="middle" class="prf">RFC:</td>
                  <td width="211" align="left" valign="middle">
                  <input name="txt_curp" type="text" class="txt_text" id="txt_rfc" maxlength="10" required value=""/></td>
              </tr>
              <tr>
                  <td align="right" valign="middle" class="prf">Nombre:</td>
                  <td align="left" valign="middle">
                  <input name="txt_nombre" type="text" class="txt_text" id="txt_nombre" maxlength="30" required /></td>
              </tr>
              <tr>
                  <td align="right" valign="middle" class="prf">Apellido Paterno:</td>
                  <td align="left" valign="middle">
                  <input name="txt_nombre" type="text" class="txt_text" id="txt_ap" maxlength="30"  required /></td>
              </tr>
              <tr>
                  <td align="right" valign="middle" class="prf">Apellido Materno:</td>
                  <td align="left" valign="middle">
                  <input name="txt_nombre" type="text" class="txt_text" id="txt_am" maxlength="30" required /></td>
              </tr>
              <tr>
                  <td align="right" valign="middle" class="prf">Direccion:</td>
                  <td align="left" valign="middle">
                  <input name="txt_nombre" type="text" class="txt_text" id="txt_direc" maxlength="30" required /></td>
              </tr>
              <tr>
                  <td align="right" valign="middle" class="prf">Telefono:</td>
                  <td align="left" valign="middle">
                  <input name="txt_nombre" type="text" class="txt_text" id="txt_tel" maxlength="10" required /></td>
              </tr>
              <tr>
                  <td align="right" valign="middle" class="prf">Email:</td>
                  <td align="left" valign="middle">
                  <input name="txt_nombre" type="text" class="txt_text" id="txt_email" maxlength="30" required /></td>
              </tr>
               <tr>
                <td class="subt">Seguridad</td>
                <td align="left" valign="middle">&nbsp;</td>
              </tr>
              <tr>
                  <td align="right" valign="middle" class="prf">Usuario:</td>
                  <td align="left" valign="middle">
                  <input name="txt_nombre" type="text" class="txt_text" id="txt_user" maxlength="30" required /></td>
              </tr>
              <tr>
                  <td align="right" valign="middle" class="prf">Contraseña:</td>
                  <td align="left" valign="middle">
                  <input name="txt_nombre" type="text" class="txt_text" id="txt_pass" maxlength="30" required /></td>
              </tr>
              <tr>
                  <td align="right" valign="middle" class="prf"></td>
                  <td align="left" valign="middle">
                  <input name="txt_nombre" type="hidden" class="txt_text" id="txt_tipo" maxlength="30" value="cliente" /></td>
              </tr>
              <tr>
                  <td>&nbsp;</td>
                  <td align="left" valign="middle">&nbsp;</td>
              </tr>
              <tr>
                  <td align="right" valign="middle"><input name="btn_guardar" type="submit" class="btn" id="btn_guardar_ca" value="GUARDAR" /></td>
                  <td align="left" valign="middle"><input name="btn_salir" type="submit" class="btn" id="btn_salir" value="SALIR" /></td>
              </tr>
            </table>
            <p>
              </p>
          </p>
          </form>
      </div>
</div>
	<div id="contened">
		<header>
			<div id="title">
				<div id="img">
				</div>
			</div>
			<div style="clear:both"></div>
			<div style="clear:both"></div>
			<nav>
				<ul class="nav">
          <li><a href="home.php">Inicio</a></li>
          <li><img src="../img/Slider/navsep.gif" alt="" width="40" height="13" /></li>
          <li><a href="Clientes.php">Clientes</a></li>
          <li><img src="../img/Slider/navsep.gif" alt="" width="40" height="13" /></li>
          <li><a href="Proveedores.php">Proveedores</a></li>
          <li><img src="../img/Slider/navsep.gif" alt="" width="40" height="13" /></li>
          <li><a href="Categorias.php">Categoria</a>
          <li><img src="../img/Slider/navsep.gif" alt="" width="40" height="13" /></li>
          <li><a href="Productos.php">Productos</a></li>
          <li><img src="../img/Slider/navsep.gif" alt="" width="40" height="13" /></li>
          <li><a href="">Acerca</a>
             <ul>
              <li><a href="">Acerca de..</a></li>
              <li><a href="">Ayuda</a></li>
             </ul>
          </li>
          <li><img src="../img/Slider/navsep.gif" alt="" width="40" height="13" /></li>
          <li><a href="php/cerrarsesion.php">Salir</a></li>
        </ul>
			</nav>
			<div style="clear:both"></div></br>
		</header>
		<section>
			<div id="templatemo_content_right"> 
         		<p>&nbsp;</p>
         		<div id="id">
          		<p class="tit">&quot;Registro de Clientes&quot;</p>
          		</div>
          		<p>&nbsp; </p>
          		<form id="form1" name="form1" method="post" action="">
                 <input name="txt_nombre" type="hidden" class="txt_text" id="txtopcion" maxlength="30" value="insertar" placeholder="Categoria" required/>
           		    <table width="780" border="0">
           		 <!--Codigo de la imagen que se muestra.-->
              		   	<tr>
              		 		
                      </tr>
              			<!--Codigo de los botones Nuevo, Modificar y eliminar.-->
              			<tr>
               		 		<td height="39" align="left" valign="middle"><input name="btn_nuevo" type="button" class="btn" id="btn_nuevo" value="NUEVO" /> <input name="button" type="button" class="btn" id="btn_modificar" value="MODIFICAR" /> <input name="button2" type="submit" class="btn" id="btn_eliminar" value="ELIMINAR" /></td>
              			</tr>
            		</table>
            		<p>&nbsp;</p>
            		<div id="divcuerpo">
            			<table width="750" border="1" align="center" class="tbl1" id="tbl_contenido">
              				<tr>
               			 		<th width="148" align="center" valign="middle" scope="col">CLAVE</th>
                        <th width="148" align="center" valign="middle" scope="col">RFC</th>
                				<th width="271" align="center" valign="middle" scope="col">NOMBRE</th>
                        <th width="271" align="center" valign="middle" scope="col">A PATERNO</th>
                        <th width="271" align="center" valign="middle" scope="col">A MATERNO</th>
                        <th width="271" align="center" valign="middle" scope="col">DIRECCION</th>
                        <th width="271" align="center" valign="middle" scope="col">TELEFONO</th>

                				<th width="93" scope="col">OPCIÓN</th>
              				</tr>
                       <?php
                        include_once('php/Conexion.php');
                        $con=new Conexion();
                        $consul=$con->consulta("SELECT * FROM tbl_clientes");
                        while ($fila=mysql_fetch_array($consul)) {
                          echo ("<tr>
                            <td>".$fila[0]."</td><td>".$fila[1]."</td><td>".$fila[2]."</td><td>".$fila[3]."</td><td>".$fila[4]."</td><td>".$fila[5]."</td><td>".$fila[6]."</td><td><input type='radio' name='rbd_cat' value=".$fila[0]."></td>
                            </tr>");
                        }
                      ?>
            			</table>
            		</div>
                </form>
            </div>
		</section>
		<div style="clear:both"></div></br>
		<footer>
		Inicio| Productos| Conocenos<br />
        Copyright © 2015 SEX SHOP "Hay te voy" universidad tecnologica de la huasteca hidalguense
		</footer>
	</div>
</body>
</html>