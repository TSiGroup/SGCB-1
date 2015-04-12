<?php
include '../Conexion.php';
$cn = new Conexion();
$CODIGO = $_POST['CODIGO'];
$TALLA = $_POST['TALLA'];
$COLOR = $_POST['COLOR'];
$MATERIAL = $_POST['MATERIAL'];
$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("INSERT INTO ROPA(CODIGOPRODUCTO,R_TALLA,R_COLOR,R_MATERIAL) VALUES('$CODIGO','$TALLA','$COLOR','$MATERIAL')");

$cn2 = new Conexion();
$return_arr2 = array();
$res2 = $cn2->Consulta("Select count(CODIGOPRODUCTO)+1 AS ID from ROPA");
while ($row = $cn2->getRespuesta($res2)){
  echo $CODIGOProducto=$row['ID'];
    }
$cn2->Desconectar();
$cn->Desconectar();
?>