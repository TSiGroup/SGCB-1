<?php
include '../Conexion.php';
$cn = new Conexion();
$RUN = $_POST['RUN'];
$FECHA = $_POST['FECHA'];
$CARGO = $_POST['CARGO'];

$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("INSERT INTO HISTORICO_TRABAJADOR(CODIGOHISTORICOTRABAJADOR,RUN,HT_FECHAINICIO,HT_FECHATERMINO,HT_OBSERVACION,HT_CARGO) VALUES(NULL,'$RUN','$FECHA',NULL,NULL,'$CARGO')");
$cn->Desconectar();
?>