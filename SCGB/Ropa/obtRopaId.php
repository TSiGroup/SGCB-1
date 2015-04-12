<?php
include '../Conexion.php';
$cn = new Conexion();
$id_insumo = $_GET['id_insumo'];
$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("SELECT p.CODIGOPRODUCTO,p.P_NOMBRE,p.P_MARCA,p.P_MODELO,p.P_OBSERVACION,i.R_TALLA,i.R_COLOR,i.R_MATERIAL,s.S_CANTIDADMINIMA FROM ROPA i,PRODUCTO p,STOCK s WHERE p.CODIGOPRODUCTO=i.CODIGOPRODUCTO and p.CODIGOPRODUCTO=s.CODIGOPRODUCTO and p.CODIGOPRODUCTO = '$id_insumo'");

while ($row = $cn->getRespuesta($res)){
    $array['CODIGO'] = $row['CODIGOPRODUCTO'];
    $array['NOMBRE'] = $row['P_NOMBRE'];
    $array['MARCA'] = $row['P_MARCA'];
	$array['MODELO'] = $row['P_MODELO'];
	$array['OBSERVACION'] = $row['P_OBSERVACION'];
    $array['TALLA'] = $row['R_TALLA'];
	$array['COLOR'] = $row['R_COLOR'];
	$array['MATERIAL'] = $row['R_MATERIAL'];
	$array['CANTIDADMINIMA'] = $row['S_CANTIDADMINIMA'];
    array_push($return_arr, $array);
}

$cn->Desconectar();
echo json_encode($return_arr);
?>