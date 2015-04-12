<?php
include '../Conexion.php';
$cn = new Conexion();
$NOMBRE = $_POST['NOMBRE'];
$FECHAINICIO = $_POST['FECHAINICIO'];

$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("INSERT INTO OBRA(CODIGOOBRA,O_NOMBRE,O_FECHAINICIO,O_ESTADO) VALUES(NULL,'$NOMBRE','$FECHAINICIO',1)");
$cn->Desconectar();
?>