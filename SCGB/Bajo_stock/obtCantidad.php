<?php
include '../Conexion.php';
$cn = new Conexion();
$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("SELECT s.S_CANTIDAD,s.S_CANTIDADMINIMA,s.S_CANTIDAD - s.S_CANTIDADMINIMA AS RESTA FROM PRODUCTO p,STOCK s WHERE p.CODIGOPRODUCTO=s.CODIGOPRODUCTO AND p.P_ESTADO=1 ORDER BY RESTA ASC");

while ($row = $cn->getRespuesta($res)){
    $array['CANTIDAD'] = $row['S_CANTIDAD'];
    $array['CANTIDADMINIMA'] = $row['S_CANTIDADMINIMA'];
    array_push($return_arr, $array);
}

$cn->Desconectar();
echo json_encode($return_arr);
?>