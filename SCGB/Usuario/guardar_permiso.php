<?php
include '../Conexion.php';
$cn = new Conexion();

$PROVEEDOR = $_POST['PROVEEDOR'];
$PRODUCTO = $_POST['PRODUCTO'];
$PERSONAL = $_POST['PERSONAL'];
$OBRA = $_POST['OBRA'];
$BODEGA=$_POST['BODEGA'];
$INFORME= $_POST['INFORME'];
$ADMINISTRACION = $_POST['ADMINISTRACION'];


$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("INSERT INTO PERMISO(CODIGOPERMISO,PROVEEDOR,PRODUCTO,PERSONAL,OBRA,BODEGA,INFORMEYGRAFICO,ADMINISTRACION) VALUES(NULL,$PROVEEDOR,$PRODUCTO,$PERSONAL,$OBRA,$BODEGA,$INFORME,$ADMINISTRACION)");

$cn2 = new Conexion();
$return_arr2 = array();
$res2 = $cn2->Consulta("Select MAX(CODIGOPERMISO) AS id from PERMISO");
while ($row = $cn2->getRespuesta($res2)){
  echo $CODIGOPERMISO=$row['id'];
    }
$cn2->Desconectar();
$cn->Desconectar();
?>