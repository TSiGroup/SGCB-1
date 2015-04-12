<?php
include '../Conexion.php';
$cn = new Conexion();
$CODIGO = $_POST['CODIGO'];
$TITULO = $_POST['TITULO'];
$DESCRIPCION = $_POST['DESCRIPCION'];
$LABEL = $_POST['LABEL'];
$USUARIO = $_POST['USUARIO'];

$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("UPDATE calendario SET CL_TITULO='$TITULO', CL_DESCRIPCION='$DESCRIPCION', CL_CLASS='$LABEL', CL_USUARIO='$USUARIO' WHERE ID_CALENDARIO='$CODIGO'");
$cn->Desconectar();
?>