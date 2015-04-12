<?php
include '../Conexion.php';
$cn = new Conexion();
$TITULO = $_POST['TITULO'];
$DESCRIPCION = $_POST['DESCRIPCION'];
$FECHA = $_POST['FECHA'];
$LABEL = $_POST['LABEL'];
$USUARIO = $_POST['USUARIO'];

$cn->Conectar();
$res = $cn->Consulta("INSERT INTO calendario(ID_CALENDARIO,CL_TITULO,CL_DESCRIPCION,CL_FECHA,CL_CLASS,CL_USUARIO) VALUES(NULL,'$TITULO','$DESCRIPCION','$FECHA','$LABEL','$USUARIO')");
$cn->Desconectar();
?>