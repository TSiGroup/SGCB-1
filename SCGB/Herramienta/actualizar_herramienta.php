<?php
include '../Conexion.php';
$cn = new Conexion();
$CODIGO = $_POST['CODIGO'];
$TIPOHERRAMIENTA = $_POST['TIPOHERRAMIENTA'];
$FRECUENCIA = $_POST['FRECUENCIA'];
$POTENCIA = $_POST['POTENCIA'];

$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("UPDATE  HERRAMIENTA SET H_TIPOHERRAMIENTA ='$TIPOHERRAMIENTA', H_FRECUENCIA ='$FRECUENCIA', H_POTENCIAMAXIMA ='$POTENCIA' WHERE CODIGOPRODUCTO='$CODIGO'");
$cn->Desconectar();
?>