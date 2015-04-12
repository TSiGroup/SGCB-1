<?php
include '../Conexion.php';
$cn = new Conexion();
$CODIGO = $_POST['CODIGO'];
$NOMBRE = $_POST['NOMBRE'];
$MARCA = $_POST['MARCA'];
$MODELO = $_POST['MODELO'];
$OBSERVACION = $_POST['OBSERVACION'];

$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("UPDATE  PRODUCTO SET P_NOMBRE='$NOMBRE', P_MARCA ='$MARCA', P_MODELO ='$MODELO', P_OBSERVACION ='$OBSERVACION' WHERE CODIGOPRODUCTO='$CODIGO'");
$cn->Desconectar();
?>