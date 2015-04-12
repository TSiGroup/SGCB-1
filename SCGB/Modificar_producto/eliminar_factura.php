<?php
include '../Conexion.php';
$cn = new Conexion();
$NUMEROFACTURA = $_POST['NUMEROFACTURA'];
$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("DELETE FROM INGRESO_PRODUCTO WHERE NUMEROFACTURA='$NUMEROFACTURA' ");
$cn->Desconectar();
?>