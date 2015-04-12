<?php
include '../Conexion.php';
$cn = new Conexion();
$id_herramienta = $_GET['id_herramienta'];
$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("SELECT p.CODIGOPRODUCTO,p.P_NOMBRE,p.P_MARCA,p.P_MODELO,p.P_OBSERVACION,h.H_TIPOHERRAMIENTA,h.H_FRECUENCIA,h.H_POTENCIAMAXIMA,s.S_CANTIDADMINIMA FROM  HERRAMIENTA h,PRODUCTO p,STOCK s WHERE p.CODIGOPRODUCTO=h.CODIGOPRODUCTO and p.CODIGOPRODUCTO=s.CODIGOPRODUCTO and p.CODIGOPRODUCTO='$id_herramienta'");

while ($row = $cn->getRespuesta($res)){
    $array['CODIGO'] = $row['CODIGOPRODUCTO'];
    $array['NOMBRE'] = $row['P_NOMBRE'];
    $array['MARCA'] = $row['P_MARCA'];
	$array['MODELO'] = $row['P_MODELO'];
	$array['OBSERVACION'] = $row['P_OBSERVACION'];
	$array['TIPOHERRAMIENTA'] = $row['H_TIPOHERRAMIENTA'];
	$array['FRECUENCIA'] = $row['H_FRECUENCIA'];
	$array['POTENCIA'] = $row['H_POTENCIAMAXIMA'];
	$array['CANTIDADMINIMA'] = $row['S_CANTIDADMINIMA'];
    array_push($return_arr, $array);
}

$cn->Desconectar();
echo json_encode($return_arr);
?>