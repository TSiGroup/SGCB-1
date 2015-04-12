<?php
include '../Conexion.php';
$cn = new Conexion();
$id_obra = $_GET['id_obra'];
$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("SELECT CODIGOOBRA,O_NOMBRE,O_FECHAINICIO FROM  OBRA WHERE CODIGOOBRA='$id_obra'");

while ($row = $cn->getRespuesta($res)){
    $array['CODIGOOBRA'] = $row['CODIGOOBRA'];
    $array['NOMBRE'] = $row['O_NOMBRE'];
    $array['FECHAINICIO'] = $row['O_FECHAINICIO'];
    array_push($return_arr, $array);
}

$cn->Desconectar();
echo json_encode($return_arr);
?>