<?php
include '../Conexion.php';
$cn = new Conexion();
$NUMEROFACTURA= $_POST['NUMEROFACTURA'];
$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("DELETE FROM PRODUCTO_UNITARIO WHERE PU_NUMEROFACTURA='$NUMEROFACTURA'");
$cn->Desconectar();
?>