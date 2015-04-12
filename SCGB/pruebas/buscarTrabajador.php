<?php
include '../Conexion.php';
if (empty($_GET['term'])) exit ;
$q = strtolower($_GET["term"]);
$cn = new Conexion();$cn->Conectar();
$items=array();
$res = $cn->Consulta("SELECT t.RUN,t.T_NOMBRE,t.T_APELLIDO,c.C_NOMBRE FROM TRABAJADOR t,CARGO c where  c.CODIGOCARGO=t.CODIGOCARGO AND T_ESTADO=1");
while($row = $cn->getRespuesta($res)){
	   $items[$row['RUN']]=$row['T_NOMBRE']."**&**".$row['T_APELLIDO']."**&**".$row['C_NOMBRE']."**&**".$row['RUN'];  
	}
$result = array();
foreach ($items as $key=>$value) {
	if (strpos(strtolower($key), $q) !== false) {
		$porciones = explode("**&**", $value);
		array_push($result, array("id"=>$value, "label"=>$key, "value" => strip_tags($key), "nombre"=>$porciones[0], "apellido"=>$porciones[1], "cargo"=>$porciones[2], "run"=>$porciones[3]));
	}
	if (count($result) > 10)
		break;
}

$cn->Desconectar();
// json_encode is available in PHP 5.2 and above, or you can install a PECL module in earlier versions
echo json_encode($result);

?>