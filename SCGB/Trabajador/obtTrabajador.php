<?php
include '../Conexion.php';
$cn = new Conexion();
$id_trabajador = $_GET['id_trabajador'];
$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("SELECT MAX(ht.CODIGOHISTORICOTRABAJADOR) AS CODIGO,t.RUN,c.C_NOMBRE,t.T_NOMBRE,t.T_APELLIDO,t.T_SEXO,t.T_DIRECCION,t.T_TELEFONO,MAX(ht.HT_FECHAINICIO) AS FECHA FROM CARGO c, TRABAJADOR t,HISTORICO_TRABAJADOR ht WHERE c.CODIGOCARGO=t.CODIGOCARGO AND t.RUN=ht.RUN AND t.RUN='$id_trabajador'");

while ($row = $cn->getRespuesta($res)){
    $array['RUT'] = $row['RUN'];
	$array['CARGO'] = $row['C_NOMBRE'];
	$array['NOMBRE'] = $row['T_NOMBRE'];
    $array['APELLIDO'] = $row['T_APELLIDO'];
	$array['SEXO'] = $row['T_SEXO'];
    $array['DIRECCION'] = $row['T_DIRECCION'];
	$array['TELEFONO'] = $row['T_TELEFONO'];
	$array['FECHA'] = $row['FECHA'];
	$array['CODIGO'] = $row['CODIGO'];
    array_push($return_arr, $array);
}

$cn->Desconectar();
echo json_encode($return_arr);
?>