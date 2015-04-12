<?php
include '../Conexion.php';
$cn = new Conexion();
$NOMBRE = $_GET['NOMBRE'];
$cn->Conectar();
$res = $cn->Consulta("SELECT count(C_NOMBRE) as CUENTA,C_ESTADO FROM CARGO WHERE C_NOMBRE='$NOMBRE'");

while ($row = $cn->getRespuesta($res)){
    if( $row['CUENTA'] ==0){
		$RESPUESTA="1";
		} elseif( $row['C_ESTADO'] ==1){
				$RESPUESTA="2";
				}else{ $RESPUESTA="3";}
}

$cn->Desconectar();
echo json_encode($RESPUESTA);
?>