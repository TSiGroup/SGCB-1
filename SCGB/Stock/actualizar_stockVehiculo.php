<?php
include '../Conexion.php';
$cn = new Conexion();

$CODIGO = $_POST['CODIGO'];
$CANTIDADMINIMA = $_POST['CANTIDADMINIMA'];
$CANTIDAD = $_POST['CANTIDAD'];

$cn->Conectar();
$return_arr = array();

$res = $cn->Consulta("UPDATE  STOCK SET S_CANTIDADMINIMA ='$CANTIDADMINIMA', S_CANTIDAD='$CANTIDAD' WHERE CODIGOPRODUCTO='$CODIGO'");


$cn->Desconectar();
?>