<?php
include '../Conexion.php';
$cn = new Conexion();
$CODIGO = $_POST['CODIGO'];
$MEDIDA = $_POST['MEDIDA'];
$TIPOMEDIDA = $_POST['TIPOMEDIDA'];
$UNIDAD = $_POST['UNIDAD'];
$CANTIDAD = $_POST['CANTIDAD'];;
$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("UPDATE  INSUMO SET I_MEDIDA='$MEDIDA',I_TIPOMEDIDA='$TIPOMEDIDA',I_TIPOUNIDAD='$UNIDAD',I_CANTIDAD='$CANTIDAD' WHERE CODIGOPRODUCTO='$CODIGO'");
$cn->Desconectar();
?>