<?php
include '../Conexion.php';
$cn = new Conexion();
$id_insumo = $_GET['id_insumo'];
$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("SELECT p.CODIGOPRODUCTO,p.P_NOMBRE,p.P_MARCA,p.P_MODELO,p.P_OBSERVACION,i.I_MEDIDA,i.I_TIPOMEDIDA,i.I_TIPOUNIDAD,i.I_CANTIDAD,s.S_CANTIDADMINIMA FROM INSUMO i,PRODUCTO p,STOCK s WHERE p.CODIGOPRODUCTO=i.CODIGOPRODUCTO and p.CODIGOPRODUCTO=s.CODIGOPRODUCTO and p.CODIGOPRODUCTO = '$id_insumo'");

while ($row = $cn->getRespuesta($res)){
    $array['CODIGO'] = $row['CODIGOPRODUCTO'];
    $array['NOMBRE'] = $row['P_NOMBRE'];
    $array['MARCA'] = $row['P_MARCA'];
	$array['MODELO'] = $row['P_MODELO'];
	$array['OBSERVACION'] = $row['P_OBSERVACION'];
    $array['MEDIDA'] = $row['I_MEDIDA'];
	$array['TIPOMEDIDA'] = $row['I_TIPOMEDIDA'];
	$array['UNIDAD'] = $row['I_TIPOUNIDAD'];
	$array['CANTIDAD'] = $row['I_CANTIDAD'];
	$array['CANTIDADMINIMA'] = $row['S_CANTIDADMINIMA'];
    array_push($return_arr, $array);
}

$cn->Desconectar();
echo json_encode($return_arr);
?>