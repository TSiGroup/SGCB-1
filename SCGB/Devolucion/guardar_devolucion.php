<?php
include '../Conexion.php';
$cn = new Conexion();
$cn2 = new Conexion();
$cn3 = new Conexion();
$cn4 = new Conexion();
$cn5 = new Conexion();
$PRODUCTO = $_POST['PRODUCTO'];
$UNITARIO = $_POST['UNITARIO'];
$PRESTAMO = $_POST['PRESTAMO'];

$cn->Conectar();
$res = $cn->Consulta("UPDATE  DETALLE_PRESTAMO SET DP_ESTADO ='0' WHERE CODIGOPRODUCTO='$PRODUCTO' AND CODIGOUNITARIO='$UNITARIO' AND CODIGOPRESTAMO='$PRESTAMO'");
$cn2->Conectar();
$res2 = $cn2->Consulta("UPDATE  PRODUCTO_UNITARIO SET PU_ESTADO ='1' WHERE CODIGOPRODUCTO='$PRODUCTO' AND CODIGOUNITARIO='$UNITARIO'");
$cn3->Conectar();
$res3 = $cn3->Consulta("select count(*) as CUENTA from detalle_prestamo where codigoprestamo='$PRESTAMO' and dp_estado=1");
while($row = $cn->getRespuesta($res3)){
	$CUENTA = $row['CUENTA'];
	}
$cn4->Conectar();
if($CUENTA==0){$res4 = $cn4->Consulta("UPDATE  PRESTAMO SET PT_ESTADO ='0' WHERE CODIGOPRESTAMO='$PRESTAMO'");}

$cn5->Conectar();
$res5 = $cn5->Consulta("UPDATE STOCK SET S_CANTIDAD=S_CANTIDAD + 1 WHERE CODIGOPRODUCTO='$PRODUCTO'");

$cn->Desconectar();
$cn2->Desconectar();
$cn3->Desconectar();
$cn4->Desconectar();
$cn5->Desconectar();
?>