<?php
include '../Conexion.php';
$cn = new Conexion();
$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("Select count(CODIGOPRODUCTO)+1 AS ID from HERRAMIENTA");

while ($row = $cn->getRespuesta($res)){
    $array['CODIGO'] = $row['ID'];
    array_push($return_arr, $array);
}
$cn->Desconectar();
echo json_encode($return_arr);
?>