<?php
include '../Conexion.php';
$cn = new Conexion();
$cn2 = new Conexion();
$NOMBRE = $_POST['NOMBRE'];
$DESCRIPCION = $_POST['DESCRIPCION'];
$cn->Conectar();
$cn2->Conectar();
$res2 = $cn2->Consulta("SELECT CODIGOCARGO FROM  CARGO WHERE C_NOMBRE='$NOMBRE'");
while ($row = $cn2->getRespuesta($res2)){
    $CODIGOCARGO = $row['CODIGOCARGO'];
}

$res = $cn->Consulta("UPDATE  CARGO SET C_NOMBRE='$NOMBRE', C_DESCRIPCION ='$DESCRIPCION', C_ESTADO=1 WHERE CODIGOCARGO='$CODIGOCARGO'");
$cn2->Desconectar();
$cn->Desconectar();
?>