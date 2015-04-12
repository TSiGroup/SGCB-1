<?php
include '../Conexion.php';
$cn = new Conexion();
$id_cargo = $_GET['id_cargo'];
$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("SELECT CODIGOCARGO,C_NOMBRE,C_DESCRIPCION FROM  CARGO WHERE CODIGOCARGO='$id_cargo'");

while ($row = $cn->getRespuesta($res)){
    $array['CODIGOCARGO'] = $row['CODIGOCARGO'];
    $array['NOMBRE'] = $row['C_NOMBRE'];
    $array['DESCRIPCION'] = $row['C_DESCRIPCION'];
    array_push($return_arr, $array);
}

$cn->Desconectar();
echo json_encode($return_arr);
?>