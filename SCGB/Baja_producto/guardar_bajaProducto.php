<?php
include '../Conexion.php';
$cn = new Conexion();
$CODIGO = $_POST['CODIGO_FINAL'];
$CODIGOUNITARIO=$_POST['CODIGOUNITARIO_FINAL'];
$FECHA = $_POST['FECHA_FINAL'];
$COMENTARIO = $_POST['COMENTARIO_FINAL'];
$cn->Conectar();
$res = $cn->Consulta("INSERT INTO estado_producto(CODIGOPRODUCTO,CODIGOUNITARIO,EP_ESTADOPRODUCTO,EP_FECHA,EP_OBSERVACION) VALUES('$CODIGO',$CODIGOUNITARIO,'DE BAJA','$FECHA','$COMENTARIO')");
$cn->Desconectar();

$cn2 = new Conexion();
$cn2->Conectar();
$res2 = $cn2->Consulta("UPDATE  producto_unitario SET PU_ESTADO =4 WHERE CODIGOPRODUCTO='$CODIGO' AND CODIGOUNITARIO=$CODIGOUNITARIO");
$cn2->Desconectar();
?>
