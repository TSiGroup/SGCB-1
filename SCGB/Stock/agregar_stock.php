<?php
include '../Conexion.php';
$cn2 = new Conexion();
$cn = new Conexion();
$CODIGO = $_POST['CODIGO'];
$DIFERENCIA = $_POST['DIFERENCIA'];
$cn->Conectar();
$res = $cn->Consulta("Select S_CANTIDAD from STOCK WHERE CODIGOPRODUCTO='$CODIGO'");

while ($row = $cn->getRespuesta($res)){
   $CANTIDADFINAL=$row['S_CANTIDAD'];
}
$CANTIDADFINAL=$CANTIDADFINAL + $DIFERENCIA;

//----------------------------------------------------------Actualiza Stock--------------------------------------//
$cn2->Conectar();
$res2 = $cn2->Consulta("UPDATE  STOCK SET S_CANTIDAD ='$CANTIDADFINAL' WHERE CODIGOPRODUCTO='$CODIGO'");
$cn2->Desconectar();
$cn->Desconectar();
?>