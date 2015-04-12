<?php
include '../Conexion.php';
$cn = new Conexion();

$CODIGO = $_POST['CODIGO'];
$CANTIDADMINIMA = $_POST['CANTIDADMINIMA'];

$cn->Conectar();
$return_arr = array();

$res = $cn->Consulta("UPDATE  STOCK SET S_CANTIDADMINIMA ='$CANTIDADMINIMA' WHERE CODIGOPRODUCTO='$CODIGO'");


$cn->Desconectar();
?>