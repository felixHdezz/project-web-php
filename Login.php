<?php
 session_start();
 if(isset($_SESSION['Cliente'])) 
 $login=$_SESSION['Cliente'];else $login=false; 
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>PROYECTO SEX SHOP</title>
	<link rel="stylesheet" href="css/contenedor.css"  type="text/css">
	<link rel="stylesheet" type="text/css" href="css/Slider.css">
	<link rel="stylesheet" type="text/css" href="css/EtiloCategorias.css">
	<link rel="stylesheet" type="text/css" href="css/Login.css">
  <script type="text/javascript" src="js/jquey-2.1.3.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/Slider.js"></script>
	<script type="text/javascript" src="js/login.js"></script>
	<script type="text/javascript" src="js/wowslider.js"></script>
  <script type="text/javascript" src="./js/ValidaLogin.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
  <script type="text/javascript" src="js/jquery.numeric.js"></script>
  <script type="text/javascript" src="FuncionAjax.js"></script>
  <script type="text/javascript" src="js/Validaciones.js"></script>
  <script type="text/javascript" src="js/Clientes.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<style type="text/css">
  #error{
    color: red;
    font-size: 16px;
  }
</style>
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
                  <input name="txt_nombre" type="password" class="txt_text" id="txt_pass" maxlength="30" required /></td>
              </tr>
              <tr>
                  <td align="right" valign="middle" class="prf"></td>
                  <td align="left" valign="middle">
                  <input name="txt_nombre" type="hidden" class="txt_text" id="txt_tipo" maxlength="30" value="cliente" /></td>
                  <input name="txt_nombre" type="hidden" class="txt_text" id="txtopcion" maxlength="30" value="insertar" placeholder="Categoria" required/>
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
					     <input type="text" name="text1" id="text1" placeholder="Buscar..." required />
					     <input type="submit" id="btn_Buscar" onclick="ejecuta(text1.value)" value="Buscar" />
				   </div>
			  </div>
			</nav>
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
  					<form id="form1" name="form1" method="post"  action="./php/verificalogin.php">
            				<table width="407" border="0" align="center">
                				<tr>
                 					<td width="200" height="24" align="right" valign="middle" class="prf"> 		<label for="txt_user2">Usuario:</label>                
                 					</td>
                 					<td width="197" align="left" valign="middle">
                 						<input name="txt_user" type="text" class="txt_text" id="txt_user" placeholder="Usuario..." maxlength="18" required>
                 					</td>
                				</tr>
                				<tr>
                 					<td align="right" valign="middle" class="prf">Contraseña:</td>
                  				<td align="left" valign="middle"><input name="txtps_password" placeholder="Contraseña..." type="password" class="txt_text" id="txtps_password" maxlength="10" required/></td>
                				</tr>
                				<tr>
                  				<td colspan="2" align="center" valign="middle" class="txt_text">
                  				</td>
               	 			</tr>
               			    <tr>
                  				<td colspan="4" align="right" nowrap="nowrap">
                  					<input name="btn_entrar" type="submit" class="btn" id="btn_entrar" value="Entrar" />
                 					</td>
                				</tr>
             				 </table>
                     <?php 
                      if(isset($_GET['error'])){
                        echo '<center><p id="error">usuario y/o contraseña incorrecto<p></center>';
                      }
                      ?>
         				 </form>
         				 Es usted nuevo usuario haz <a id="link">click aqui para crear una cuenta</a>
  				</div>
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