<?php
include '../Conexion.php';
$cn = new Conexion();
$CODIGO = $_POST['CODIGO'];
$TALLA = $_POST['TALLA'];
$COLOR = $_POST['COLOR'];
$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("UPDATE  ROPA SET R_TALLA='$TALLA',R_COLOR='$COLOR' WHERE CODIGOPRODUCTO='$CODIGO'");
$cn->Desconectar();
?>