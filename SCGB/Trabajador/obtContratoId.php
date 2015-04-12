<?php
include '../Conexion.php';
$cn = new Conexion();
$id_trabajador = $_GET['id_trabajador'];
$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("SELECT MAX(ht.CODIGOHISTORICOTRABAJADOR)AS CODIGO,t.RUN FROM TRABAJADOR t,HISTORICO_TRABAJADOR ht WHERE t.RUN=ht.RUN AND t.RUN='$id_trabajador'");

while ($row = $cn->getRespuesta($res)){
    $array['RUN'] = $row['RUN'];
	$array['CODIGO'] = $row['CODIGO'];
    array_push($return_arr, $array);
}

$cn->Desconectar();
echo json_encode($return_arr);
?>