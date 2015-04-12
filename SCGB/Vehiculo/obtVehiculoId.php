<?php
include '../Conexion.php';
$cn = new Conexion();
$id_vehiculo = $_GET['id_vehiculo'];
$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("SELECT p.CODIGOPRODUCTO,p.P_NOMBRE,p.P_MARCA,p.P_MODELO,p.P_OBSERVACION,v.V_PERMISO,v.V_YEAR,v.V_CONDICION,v.V_PATENTE,s.S_CANTIDADMINIMA FROM VEHICULO v,PRODUCTO p,STOCK s WHERE p.CODIGOPRODUCTO=v.CODIGOPRODUCTO AND p.CODIGOPRODUCTO=s.CODIGOPRODUCTO AND p.CODIGOPRODUCTO='$id_vehiculo'");

while ($row = $cn->getRespuesta($res)){
    $array['CODIGO'] = $row['CODIGOPRODUCTO'];
	$array['NOMBRE'] = $row['P_NOMBRE'];
    $array['MARCA'] = $row['P_MARCA'];
	$array['MODELO'] = $row['P_MODELO'];
	$array['OBSERVACION'] = $row['P_OBSERVACION'];
    $array['PERMISO'] = $row['V_PERMISO'];
	$array['YEAR'] = $row['V_YEAR'];
	$array['CONDICION'] = $row['V_CONDICION'];
	$array['PATENTE'] = $row['V_PATENTE'];
	$array['CANTIDADMINIMA'] = $row['S_CANTIDADMINIMA'];
    array_push($return_arr, $array);
}

$cn->Desconectar();
echo json_encode($return_arr);
?>