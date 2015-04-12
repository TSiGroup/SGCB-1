<?php
include '../Conexion.php';
if (empty($_GET['term'])) exit ;
$q = strtolower($_GET["term"]);
$cn = new Conexion();$cn->Conectar();
$items=array();
$res = $cn->Consulta("SELECT CODIGOPRODUCTO,P_NOMBRE FROM PRODUCTO");
while($row = $cn->getRespuesta($res)){
	   $items[$row['P_NOMBRE']]=$row['P_NOMBRE'];  
	}

$result = array();
foreach ($items as $key=>$value) {
	if (strpos(strtolower($key), $q) !== false) {
		array_push($result, array("id"=>$value, "label"=>$key, "value" => strip_tags($key)));
	}
	if (count($result) > 11)
		break;
}

// json_encode is available in PHP 5.2 and above, or you can install a PECL module in earlier versions
echo json_encode($result);

?>