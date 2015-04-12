<?php
include '../Conexion.php';
$cn = new Conexion();
$id_trabajador = $_GET['id_trabajador'];
$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("SELECT t.T_NOMBRE,t.T_APELLIDO,c.C_NOMBRE FROM TRABAJADOR t,CARGO c WHERE t.CODIGOCARGO=c.CODIGOCARGO AND t.RUN = '$id_trabajador'");

while ($row = $cn->getRespuesta($res)){
	$array['CARGO'] = $row['C_NOMBRE'];
	$array['NOMBRE'] = $row['T_NOMBRE'];
    $array['APELLIDO'] = $row['T_APELLIDO'];
    array_push($return_arr, $array);
}

$cn->Desconectar();
echo json_encode($return_arr);
?>