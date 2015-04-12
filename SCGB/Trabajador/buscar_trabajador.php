<?php
include '../Conexion.php';
$cn = new Conexion();
$rut = $_GET['rut'];
$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("SELECT count(RUN) as CUENTA,T_ESTADO FROM TRABAJADOR  WHERE RUN='$rut'");

while ($row = $cn->getRespuesta($res)){
    if( $row['CUENTA'] ==0){
		$RESPUESTA="1";
		} elseif( $row['T_ESTADO'] ==1){
				$RESPUESTA="2";
				   }elseif( $row['T_ESTADO'] ==2){
				     $RESPUESTA="3";
				    }else{$RESPUESTA="4";}
}

$cn->Desconectar();

echo json_encode($RESPUESTA);
?>