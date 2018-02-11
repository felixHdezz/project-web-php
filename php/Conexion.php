<?php
	class Conexion
	{
		public $conexion;
		/*Metodo de establece la conexion en la base de datos*/
		public function Conexion()
		{
			/*Verificamos si no hay un conexion. sino hay establecemos una conexion*/ 
			if(!isset($this->conexion)){
				$this->conexion=mysql_connect("localhost","root","") or die(mysql_error());
				/*$this->conexion= sqlite_open("base.sql")*/

				/*Aqui selecccionamos la base de datos que utilizaremos*/
				mysql_select_db("db_sexshop",$this->conexion) or die(mysql_error());
			}
		}
		/*Metodo para realizar consultas*/
		public function Consulta($sql)
		{
			$consul = mysql_query($sql, $this->conexion) or die(mysql_error());
			return $consul;
		}
		public function num_regis($sql)
		{
			return mysql_num_rows($sql);	
		}
		public function arreglo($sql)
		{
			return mysql_fetch_array($sql);
		}
		
		public function acciones($sql)
		{
			$res=mysql_query($sql, $this->conexion);
			if(!$res)
			{
				echo "MySQL error: ".mysql_error();
				mysql_free_result($sql); 
				mysql_close();
			}
			else
			{
				mysql_close();
				return 1;
			}
		}
		public function trae_datos($sql)
		{
			$result = mysql_query($sql) or die(mysql_error());
			$json = array();
			$total_records = mysql_num_rows($result);
			if($total_records >= 1){
			  while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
				$json[] = $row;
			  }
			}
			echo json_encode($json);
		}
		
		public function trae_num_filas($sql)
		{
			$resultado = $this->consulta($sql);
			$total = $this->num_regis($resultado);
			$json = array();
			if ($total >= 1)
			{
				while ($row = mysql_fetch_array($resultado, MYSQL_ASSOC))
				{
					$json[] = $row;
				}
			}
			echo json_encode($json);
		}
	}
?>