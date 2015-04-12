<?php
include '../Conexion.php';
$cn = new Conexion();
$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("SELECT ID_CALENDARIO,CL_TITULO,CL_DESCRIPCION,CL_FECHA,CL_CLASS,CL_USUARIO FROM calendario WHERE CL_CLASS='label label-important'");

while ($row = $cn->getRespuesta($res)){
    $array['id'] = $row['ID_CALENDARIO'];
	$array['title'] = $row['CL_TITULO'];
	$array['description'] = $row['CL_DESCRIPCION'].". Ingresado por el Usuario: ".$row['CL_USUARIO'];
    $array['start'] = $row['CL_FECHA'];
	$array['end'] = $row['CL_FECHA'];
	$array['className'] = $row['CL_CLASS'];
    array_push($return_arr, $array);
}

$cn->Desconectar();
echo json_encode($return_arr);
?>