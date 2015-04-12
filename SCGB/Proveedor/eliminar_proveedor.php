<?php
include '../Conexion.php';
$cn = new Conexion();
$CODIGO = $_POST['CODIGO'];

$cn->Conectar();
$return_arr = array();

$res = $cn->Consulta("UPDATE  proveedor SET PD_ESTADO=0 WHERE RUT='$CODIGO'");


$cn->Desconectar();
?>