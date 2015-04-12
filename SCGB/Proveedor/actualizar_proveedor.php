<?php
include '../Conexion.php';
$cn = new Conexion();
$RUT = $_POST['RUT'];
$NOMBRE = $_POST['NOMBRE'];
$DIRECCION = $_POST['DIRECCION'];
$TELEFONO = $_POST['TELEFONO'];
$EMAIL = $_POST['EMAIL'];
$cn->Conectar();

$res = $cn->Consulta("UPDATE  proveedor SET PD_NOMBRE='$NOMBRE', PD_DIRECCION ='$DIRECCION', PD_TELEFONO ='$TELEFONO', PD_EMAIL ='$EMAIL', PD_ESTADO=1 WHERE RUT='$RUT'");

$cn->Desconectar();
?>