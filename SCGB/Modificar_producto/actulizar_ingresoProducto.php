<?php
include '../Conexion.php';
$cn = new Conexion();
$cn2 = new Conexion();
$CODIGO = $_POST['CODIGO'];
$RUT = $_POST['RUT'];
$NUMEROFACTURA = $_POST['NUMEROFACTURA'];
$CANTIDAD = $_POST['CANTIDAD'];
$PRECIO = $_POST['PRECIO'];
$TOTALFACTURA = $_POST['TOTALFACTURA'];
$FECHA = $_POST['FECHA'];
$USUARIO = $_POST['USUARIO'];
$cn->Conectar();
$res = $cn->Consulta("Select IP_CANTIDAD from INGRESO_PRODUCTO WHERE CODIGOPRODUCTO='$CODIGO' AND NUMEROFACTURA='$NUMEROFACTURA' AND RUT='$RUT'");

while ($row = $cn->getRespuesta($res)){
      $CANTIDADFINAL=$row['IP_CANTIDAD'];
}
if($CANTIDAD > $CANTIDADFINAL){echo $CANTIDADTOTAL=$CANTIDAD - $CANTIDADFINAL; echo",+";}
if($CANTIDADFINAL > $CANTIDAD ){echo $CANTIDADTOTAL=$CANTIDADFINAL-$CANTIDAD; echo ",-";}
if($CANTIDADFINAL == $CANTIDAD ){echo $CANTIDADTOTAL=$CANTIDADFINAL-$CANTIDAD; echo ",CERO";}

$cn2->Conectar();
$return_arr2 = array();
$res2 = $cn2->Consulta("UPDATE  INGRESO_PRODUCTO SET RUT='$RUT',IP_CANTIDAD='$CANTIDAD',IP_PRECIOUNITARIO='$PRECIO',IP_TOTALFACTURA='$TOTALFACTURA',IP_FECHA='$FECHA',IP_USUARIO='$USUARIO' WHERE NUMEROFACTURA='$NUMEROFACTURA' AND CODIGOPRODUCTO='$CODIGO'");
$cn->Desconectar();
$cn2->Desconectar();
?>