<?php
include '../Conexion.php';
$cn = new Conexion();
$CODIGO = $_POST['CODIGO'];
$PERMISO = $_POST['PERMISO'];
$PATENTE = $_POST['PATENTE'];
$YEAR = $_POST['YEAR'];
$CONDICION = $_POST['CONDICION'];

$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("UPDATE  VEHICULO SET  V_PERMISO ='$PERMISO', V_YEAR='$YEAR', V_CONDICION ='$CONDICION', V_PATENTE ='$PATENTE' WHERE CODIGOPRODUCTO='$CODIGO'");
$cn->Desconectar();
?>