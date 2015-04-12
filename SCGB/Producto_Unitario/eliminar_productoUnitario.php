<?php
include '../Conexion.php';
$cn = new Conexion();
$cn2 = new Conexion();
$CODIGO = $_POST['CODIGO'];
$DIFERENCIA = $_POST['DIFERENCIA'];
$NUMEROFACTURA = $_POST['NUMEROFACTURA'];
$cn->Conectar();
$cn2->Conectar();

for ( $i = 0 ; $i < $DIFERENCIA ; $i ++) {
  $return_arr = array();
  $res = $cn->Consulta("Select MAX(CODIGOUNITARIO) AS ID from PRODUCTO_UNITARIO WHERE CODIGOPRODUCTO='$CODIGO' AND PU_NUMEROFACTURA='$NUMEROFACTURA'");
  while ($row = $cn->getRespuesta($res)){
  $CODIGOUNITARIO=$row['ID'];
    }//fin del while
   $return_arr2 = array();
   $res2 = $cn2->Consulta("DELETE FROM PRODUCTO_UNITARIO WHERE CODIGOUNITARIO='$CODIGOUNITARIO' AND CODIGOPRODUCTO='$CODIGO' AND PU_NUMEROFACTURA='$NUMEROFACTURA'");
 }//fin del for

$cn->Desconectar();
$cn2->Desconectar();
?>