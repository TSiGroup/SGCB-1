<?php
include '../Conexion.php';
$cn = new Conexion();
$CODIGO = $_POST['CODIGO'];
$CANTIDADMINIMA = $_POST['CANTIDADMINIMA'];
$CANTIDAD = $_POST['CANTIDAD'];
$cn->Conectar();
$return_arr = array();

$res = $cn->Consulta("INSERT INTO STOCK(CODIGOPRODUCTO,S_CANTIDAD,S_CANTIDADMINIMA) VALUES('$CODIGO',$CANTIDAD,$CANTIDADMINIMA)");

$cn->Desconectar();
?>
