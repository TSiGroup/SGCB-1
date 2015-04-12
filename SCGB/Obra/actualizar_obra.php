<?php
include '../Conexion.php';
$cn = new Conexion();
$CODIGOOBRA = $_POST['CODIGOOBRA'];
$NOMBRE = $_POST['NOMBRE'];
$FECHAINICIO = $_POST['FECHAINICIO'];

$cn->Conectar();
$return_arr = array();

$res = $cn->Consulta("UPDATE  OBRA SET O_NOMBRE='$NOMBRE', O_FECHAINICIO ='$FECHAINICIO' WHERE CODIGOOBRA='$CODIGOOBRA'");


$cn->Desconectar();
?>