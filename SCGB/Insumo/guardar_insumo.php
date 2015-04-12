<?php
include '../Conexion.php';
$cn = new Conexion();
$CODIGO = $_POST['CODIGO'];
$MEDIDA = $_POST['MEDIDA'];
$TIPOMEDIDA = $_POST['TIPOMEDIDA'];
$UNIDAD = $_POST['UNIDAD'];
$CANTIDAD = $_POST['CANTIDAD'];
$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("INSERT INTO INSUMO(CODIGOPRODUCTO,I_MEDIDA,I_TIPOMEDIDA,I_TIPOUNIDAD,I_CANTIDAD) VALUES('$CODIGO','$MEDIDA','$TIPOMEDIDA','$UNIDAD',$CANTIDAD)");

$cn2 = new Conexion();
$return_arr2 = array();
$res2 = $cn2->Consulta("Select count(CODIGOPRODUCTO)+1 AS ID from INSUMO");
while ($row = $cn2->getRespuesta($res2)){
  echo $CODIGOProducto=$row['ID'];
    }
$cn2->Desconectar();
$cn->Desconectar();
?>