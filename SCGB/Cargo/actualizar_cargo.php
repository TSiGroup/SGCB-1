<?php
include '../Conexion.php';
$cn = new Conexion();
$CODIGOCARGO = $_POST['CODIGOCARGO'];
$NOMBRE = $_POST['NOMBRE'];
$DESCRIPCION = $_POST['DESCRIPCION'];
$cn->Conectar();
$res = $cn->Consulta("UPDATE  CARGO SET C_NOMBRE='$NOMBRE', C_DESCRIPCION ='$DESCRIPCION', C_ESTADO=1 WHERE CODIGOCARGO='$CODIGOCARGO'");
$cn->Desconectar();
?>