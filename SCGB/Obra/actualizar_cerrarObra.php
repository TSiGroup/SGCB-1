<?php
include '../Conexion.php';
$cn = new Conexion();
$CODIGOOBRA = $_POST['CODIGOOBRA'];
$FECHATERMINO = $_POST['FECHATERMINO'];

$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("UPDATE  OBRA SET O_FECHATERMINO ='$FECHATERMINO',O_ESTADO='2' WHERE CODIGOOBRA='$CODIGOOBRA'");
$cn->Desconectar();
?>