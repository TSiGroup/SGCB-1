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

$res = $cn->Consulta("INSERT INTO TRABAJADOR(RUN,CODIGOCARGO,T_NOMBRE,T_APELLIDO,T_SEXO,T_DIRECCION,T_TELEFONO,T_ESTADO) VALUES('$RUT',$CODIGO,'$NOMBRE','$APELLIDO','$SEXO','$DIRECCION',$TELEFONO,1)");


$cn->Desconectar();
?>