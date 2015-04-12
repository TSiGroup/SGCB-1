<?php
include '../Conexion.php';
$cn = new Conexion();
$cn->Conectar();
$ESTADO="";
$return_arr = array();
$res = $cn->Consulta("SELECT t.T_NOMBRE,t.T_APELLIDO,t.T_ESTADO,ht.HT_CARGO,count(pt.CODIGOPRESTAMO) AS CUENTA_PRESTAMO,count(distinct pt.CODIGOOBRA) AS CUENTA_OBRA,ht.HT_FECHATERMINO FROM historico_trabajador ht,trabajador t LEFT OUTER JOIN prestamo pt ON t.RUN=pt.RUN WHERE ht.RUN=t.RUN GROUP BY ht.CODIGOHISTORICOTRABAJADOR");

while ($row = $cn->getRespuesta($res)){
	if($row['T_ESTADO']==1){$ESTADO="ACTIVO";}elseif($row['T_ESTADO']==2){$ESTADO="DESVINCULADO DE LA EMPRESA";}elseif($row['T_ESTADO']==0){$ESTADO="INACTIVO";}
	if($row['HT_FECHATERMINO']!=null){
    $array['id'] = "TRABAJADOR";
	$array['title'] = "Desvinculacion del Trabajador(a): ".$row['T_NOMBRE']." ".$row['T_APELLIDO'];
	$array['description'] = "El Trabajador(a) ".$row['T_NOMBRE']." ".$row['T_APELLIDO']." con cargo ".$row['HT_CARGO']." fue desvinculado de la empresa el ".$row['HT_FECHATERMINO'].", su estado actual es de ".$ESTADO.", a trabajado en ".$row['CUENTA_OBRA']." Obras, con un total de ".$row['CUENTA_PRESTAMO']." Prestamos";
    $array['start'] = $row['HT_FECHATERMINO'];
	$array['end'] = $row['HT_FECHATERMINO'];
	$array['className'] = "label label-info";
    array_push($return_arr, $array);
	}
}

$cn->Desconectar();
echo json_encode($return_arr);
?>