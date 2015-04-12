<?php
include '../Conexion.php';
$cn = new Conexion();
$RUT = $_POST['RUT'];
$NOMBRE = $_POST['NOMBRE'];
$DIRECCION = $_POST['DIRECCION'];
$TELEFONO = $_POST['TELEFONO'];
$EMAIL = $_POST['EMAIL'];
$cn->Conectar();

$res = $cn->Consulta("INSERT INTO proveedor(RUT,PD_NOMBRE,PD_DIRECCION,PD_TELEFONO,PD_EMAIL,PD_ESTADO) VALUES('$RUT','$NOMBRE','$DIRECCION',$TELEFONO,'$EMAIL',1)");

$cn->Desconectar();
?>