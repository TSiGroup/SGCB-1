<?php
include '../Conexion.php';
$cn = new Conexion();
$cn2 = new Conexion();
$CODIGO = $_POST['CODIGO'];
$PERMISO = $_POST['PERMISO'];
$PATENTE = $_POST['PATENTE'];
$YEAR = $_POST['YEAR'];
$CONDICION = $_POST['CONDICION'];

$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("INSERT INTO VEHICULO(CODIGOPRODUCTO,V_PERMISO,V_YEAR,V_CONDICION,V_PATENTE) VALUES('$CODIGO','$PERMISO',$YEAR,'$CONDICION','$PATENTE')");

$cn2 = new Conexion();
$return_arr2 = array();
$res2 = $cn2->Consulta("Select count(CODIGOPRODUCTO)+1 AS ID from VEHICULO");
while ($row = $cn2->getRespuesta($res2)){
  echo $CODIGOProducto=$row['ID'];
    }
$cn2->Desconectar();
$cn->Desconectar();
?>