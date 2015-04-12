<?php
include '../Conexion.php';
$cn = new Conexion();
$LOGIN = $_GET['LOGIN'];
$cn->Conectar();
$res = $cn->Consulta("SELECT count(U_LOGIN) as CUENTA,U_ESTADO FROM USUARIO WHERE U_LOGIN='$LOGIN'");

while ($row = $cn->getRespuesta($res)){
    if( $row['CUENTA'] ==0){
		$RESPUESTA="1";
		} elseif( $row['U_ESTADO'] ==1){
				$RESPUESTA="2";
				}else{ $RESPUESTA="3";}
}

$cn->Desconectar();
echo json_encode($RESPUESTA);
?>