<?php
include '../Conexion.php';
$cn = new Conexion();
$cn2 = new Conexion();
$cn3 = new Conexion();
$CODIGOPRESTAMO = $_POST['CODIGOPRESTAMO'];
$CODIGOPRODUCTO = $_POST['CODIGOPRODUCTO'];
$CODIGOUNITARIO = $_POST['CODIGOUNITARIO'];
$IDENT=$_POST['IDENT'];
echo $CODIGOPRESTAMO;
echo $CODIGOPRODUCTO;
echo $CODIGOUNITARIO;

$cn->Conectar();
$res = $cn->Consulta("INSERT INTO DETALLE_PRESTAMO(CODIGOPRESTAMO,CODIGOPRODUCTO,CODIGOUNITARIO,DP_FECHADEVOLUCION,DP_USUARIO,DP_ESTADO) VALUES($CODIGOPRESTAMO,'$CODIGOPRODUCTO',$CODIGOUNITARIO,NULL,NULL,1)");

$cn2->Conectar();
if($IDENT=="R"){$res2 = $cn2->Consulta("UPDATE PRODUCTO_UNITARIO SET PU_ESTADO='3' WHERE CODIGOUNITARIO='$CODIGOUNITARIO' AND CODIGOPRODUCTO='$CODIGOPRODUCTO'");}
if($IDENT=="I"){$res2 = $cn2->Consulta("UPDATE PRODUCTO_UNITARIO SET PU_ESTADO='3' WHERE CODIGOUNITARIO='$CODIGOUNITARIO' AND CODIGOPRODUCTO='$CODIGOPRODUCTO'");}
if($IDENT=="H"){$res2 = $cn2->Consulta("UPDATE PRODUCTO_UNITARIO SET PU_ESTADO='2' WHERE CODIGOUNITARIO='$CODIGOUNITARIO' AND CODIGOPRODUCTO='$CODIGOPRODUCTO'");}
if($IDENT=="V"){$res2 = $cn2->Consulta("UPDATE PRODUCTO_UNITARIO SET PU_ESTADO='2' WHERE CODIGOUNITARIO='$CODIGOUNITARIO' AND CODIGOPRODUCTO='$CODIGOPRODUCTO'");}	

$cn3->Conectar();
if($IDENT=="R"){$res3 = $cn3->Consulta("UPDATE DETALLE_PRESTAMO SET DP_ESTADO='0' WHERE CODIGOUNITARIO='$CODIGOUNITARIO' AND CODIGOPRODUCTO='$CODIGOPRODUCTO' AND CODIGOPRESTAMO='$CODIGOPRESTAMO'");}	
if($IDENT=="I"){$res3 = $cn3->Consulta("UPDATE DETALLE_PRESTAMO SET DP_ESTADO='0' WHERE CODIGOUNITARIO='$CODIGOUNITARIO' AND CODIGOPRODUCTO='$CODIGOPRODUCTO' AND CODIGOPRESTAMO='$CODIGOPRESTAMO'");}

$cn3->Desconectar();
$cn2->Desconectar();
$cn->Desconectar();
?>