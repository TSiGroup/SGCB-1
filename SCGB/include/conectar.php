<?

	function conectar() {
		$host="localhost";
		$base = "proyecto";
		$user="root";
		$pass="";
		global $conexion;
		if($conexion = mysql_connect ($host,$user,$pass)){
			mysql_select_db($base,$conexion);
			
			}else{
					echo "No se pudo conectar a la base de datos..";
				}
	}
?>
