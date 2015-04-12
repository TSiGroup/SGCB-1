<?php
include '../Conexion.php';
$cn = new Conexion();
$CODIGO = $_POST['CODIGO'];

$cn->Conectar();
$return_arr = array();

$res = $cn->Consulta("UPDATE  CARGO SET C_ESTADO=0 WHERE CODIGOCARGO='$CODIGO'");


$cn->Desconectar();
?>