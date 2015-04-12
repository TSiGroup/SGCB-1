<?php
include '../Conexion.php';
$cn = new Conexion();
$CODIGO = $_POST['CODIGO'];
$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("UPDATE  USUARIO SET U_ESTADO=0 WHERE U_LOGIN='$CODIGO'");
$cn->Desconectar();
?>