<?php
include '../Conexion.php';
$cn = new Conexion();
$RUT = $_POST['RUT'];
$CODIGO = $_POST['CODIGO'];
$NOMBRE = $_POST['NOMBRE'];
$APELLIDO = $_POST['APELLIDO'];
$SEXO = $_POST['SEXO'];
$DIRECCION = $_POST['DIRECCION'];
$TELEFONO = $_POST['TELEFONO'];


$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("UPDATE TRABAJADOR SET CODIGOCARGO='$CODIGO', T_NOMBRE='$NOMBRE', T_APELLIDO='$APELLIDO', T_SEXO='$SEXO', T_DIRECCION ='$DIRECCION', T_TELEFONO ='$TELEFONO', T_ESTADO=1 WHERE RUN='$RUT'");
$cn->Desconectar();
?>