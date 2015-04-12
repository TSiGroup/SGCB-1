<?php
include '../Conexion.php';
$cn = new Conexion();
$cn->Conectar();
$return_arr = array();
date_default_timezone_set("Chile/Continental");
$year = date('Y-m-d');
$res = $cn->Consulta("SELECT o.O_NOMBRE,o.O_FECHAINICIO,o.O_FECHATERMINO,o.O_ESTADO,count(p.CODIGOPRESTAMO) AS CUENTA_PRESTAMO,sum(p.PT_TOTALPRODUCTO) AS TOTAL_PRODUCTO,DATEDIFF(NOW(),o.O_FECHAINICIO) AS DIFERENCIA_FECHA,count(distinct p.RUN) AS CUENTA_TRABAJADORES,DATEDIFF(o.O_FECHATERMINO,o.O_FECHAINICIO) AS DIFERENCIA_FECHAS  FROM obra o,prestamo p WHERE o.CODIGOOBRA=p.CODIGOOBRA GROUP BY o.CODIGOOBRA");
while ($row = $cn->getRespuesta($res)){
	if($row['O_ESTADO']==1){
    $array['id'] = "OBRA";
	$array['title'] ="Obra ".$row['O_NOMBRE'];
	$array['description'] = "La Obra ".$row['O_NOMBRE']." se encuentra Activa, con un total de ".$row['CUENTA_PRESTAMO']." prestamos, Total de productos prestados: ".$row['TOTAL_PRODUCTO']." ,cantidad de trabajadores :".$row['CUENTA_TRABAJADORES']." ,dias transcurridos desde el inicio de la obra: ".$row['DIFERENCIA_FECHA'];
    $array['start'] = $row['O_FECHAINICIO'];
	$array['end'] = "$year";
	$array['className'] = "label label-success";
    array_push($return_arr, $array);
	}
	elseif($row['O_ESTADO']==2){
		$array['id'] = "OBRA";
	    $array['title'] ="Obra ".$row['O_NOMBRE'];
	    $array['description'] =  "La Obra ".$row['O_NOMBRE']." se encuentra Terminada, con un total de ".$row['CUENTA_PRESTAMO']." prestamos, Total de productos prestados: ".$row['TOTAL_PRODUCTO']." ,cantidad de trabajadores :".$row['CUENTA_TRABAJADORES']." ,dias transcurridos desde el inicio de la obra al finalizar: ".$row['DIFERENCIA_FECHAS'];
        $array['start'] = $row['O_FECHAINICIO'];
	    $array['end'] = $row['O_FECHATERMINO'];
	    $array['className'] = "label label-success";
        array_push($return_arr, $array);
		}
}


$cn->Desconectar();
echo json_encode($return_arr);
?>