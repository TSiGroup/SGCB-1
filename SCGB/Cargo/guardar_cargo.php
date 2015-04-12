<?php
include '../Conexion.php';
$cn = new Conexion();
$NOMBRE = $_POST['NOMBRE'];
$DESCRIPCION = $_POST['DESCRIPCION'];
$cn->Conectar();
$res = $cn->Consulta("INSERT INTO CARGO(CODIGOCARGO,C_NOMBRE,C_DESCRIPCION,C_ESTADO) VALUES(NULL,'$NOMBRE','$DESCRIPCION',1)");
$cn->Desconectar();
?>