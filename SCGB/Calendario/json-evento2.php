<?php
include '../Conexion.php';
$cn = new Conexion();
$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("SELECT CODIGOHISTORICOTRABAJADOR,RUN,HT_FECHAINICIO,HT_OBSERVACION FROM historico_trabajador ");

while ($row = $cn->getRespuesta($res)){
    $array['id'] = $row['CODIGOHISTORICOTRABAJADOR'];
	$array['title'] = $row['RUN'];
	$array['description'] = $row['HT_OBSERVACION'];
    $array['start'] = $row['HT_FECHAINICIO'];
	$array['end'] = $row['HT_FECHAINICIO'];
	$array['className'] = "label label-important";
    array_push($return_arr, $array);
}

$cn->Desconectar();
echo json_encode($return_arr);
?>