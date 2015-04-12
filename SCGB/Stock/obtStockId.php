<?php
include '../Conexion.php';
$cn = new Conexion();
$id_factura = $_GET['id_factura'];
$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("SELECT CODIGOPRODUCTO,IP_CANTIDAD,NUMEROFACTURA FROM  INGRESO_PRODUCTO WHERE NUMEROFACTURA='$id_factura'");

while ($row = $cn->getRespuesta($res)){
    $array['CODIGOPRODUCTO'] = $row['CODIGOPRODUCTO'];
    $array['CANTIDAD'] = $row['IP_CANTIDAD'];
	$array['NUMEROFACTURA'] = $row['NUMEROFACTURA'];
    array_push($return_arr, $array);
}

$cn->Desconectar();
echo json_encode($return_arr);
?>