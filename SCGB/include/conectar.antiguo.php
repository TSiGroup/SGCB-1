<?

	function conectar() {
		
		$host="127.0.0.1";
		$base = "tsigroup_proyecto";
		$user="tsigroup_proyect";
		$pass="tuKKrWy49k4T";
		global $conexion;
		
		if($conexion = mysql_connect ($host,$user,$pass)){
			mysql_select_db($base,$conexion);
			
			}else{
					echo "No se pudo conectar a la base de datos..";
				}
	}
?>
