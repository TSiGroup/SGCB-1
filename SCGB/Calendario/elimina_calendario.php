<?php
include '../Conexion.php';
$cn = new Conexion();
$ID = $_POST['id'];

$cn->Conectar();
$res = $cn->Consulta("DELETE FROM calendario WHERE ID_CALENDARIO='$ID'");
$cn->Desconectar();
?>