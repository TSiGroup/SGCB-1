<?php
include '../Conexion.php';
$cn = new Conexion();
$rut = $_GET['rut'];
$cn->Conectar();
$res = $cn->Consulta("SELECT count(RUT) as CUENTA,PD_ESTADO FROM proveedor  WHERE RUT='$rut'");

while ($row = $cn->getRespuesta($res)){
    if( $row['CUENTA'] ==0){
		$RESPUESTA="1";
		} elseif( $row['PD_ESTADO'] ==1){
				$RESPUESTA="2";
				}else{ $RESPUESTA="3";}
}

$cn->Desconectar();
echo json_encode($RESPUESTA);
?>