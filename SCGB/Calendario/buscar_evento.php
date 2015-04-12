<?php
include '../Conexion.php';
$cn = new Conexion();
$ID = $_GET['ID'];
$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("SELECT ID_CALENDARIO,CL_TITULO,CL_DESCRIPCION,CL_CLASS FROM calendario WHERE ID_CALENDARIO='$ID'");

while ($row = $cn->getRespuesta($res)){
	$array['CODIGO'] = $row['ID_CALENDARIO'];
    $array['TITULO'] = $row['CL_TITULO'];
    $array['DESCRIPCION'] = $row['CL_DESCRIPCION'];
    $array['CLASS'] = $row['CL_CLASS'];
	array_push($return_arr, $array);
}

$cn->Desconectar();
echo json_encode($return_arr);
?>
         