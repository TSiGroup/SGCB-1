<?php
include '../Conexion.php';
$cn = new Conexion();
$cn2 = new Conexion();
$RUN = $_POST['RUN'];
$FECHA = $_POST['FECHA'];
$OBSERVACION = $_POST['OBSERVACION'];
$CODIGOHISTORICO = $_POST['CODIGOHISTORICO'];

$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("UPDATE HISTORICO_TRABAJADOR SET HT_FECHATERMINO='$FECHA',HT_OBSERVACION='$OBSERVACION' WHERE CODIGOHISTORICOTRABAJADOR='$CODIGOHISTORICO'");

$cn2->Conectar();
$return_arr2 = array();
$res2 = $cn2->Consulta("UPDATE TRABAJADOR SET T_ESTADO='2' WHERE RUN='$RUN'");
$cn->Desconectar();
$cn2->Desconectar();
?>