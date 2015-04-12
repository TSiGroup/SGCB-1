<?php
include '../Conexion.php';
$cn = new Conexion();
$id_proveedor = $_GET['id_proveedor'];
$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("SELECT RUT,PD_NOMBRE,PD_DIRECCION,PD_TELEFONO,PD_EMAIL FROM  PROVEEDOR WHERE RUT='$id_proveedor'");

while ($row = $cn->getRespuesta($res)){
    $array['RUT'] = $row['RUT'];
    $array['NOMBRE'] = $row['PD_NOMBRE'];
    $array['DIRECCION'] = $row['PD_DIRECCION'];
	$array['TELEFONO'] = $row['PD_TELEFONO'];
	$array['EMAIL'] = $row['PD_EMAIL'];
    array_push($return_arr, $array);
}

$cn->Desconectar();
echo json_encode($return_arr);
?>



