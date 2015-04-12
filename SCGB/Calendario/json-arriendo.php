<?php
include '../Conexion.php';
$cn = new Conexion();
$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("SELECT a.A_FECHAINICIO,a.A_FECHATERMINO,A_OBSERVACION,ip.IP_PRECIOUNITARIO,p.P_NOMBRE,pd.PD_NOMBRE,DATEDIFF(a.A_FECHATERMINO,NOW()) AS DIFERENCIA_FECHA FROM arriendo a,ingreso_producto ip,producto p,proveedor pd WHERE a.A_NUMEROFACTURA=ip.NUMEROFACTURA AND ip.CODIGOPRODUCTO=p.CODIGOPRODUCTO AND ip.RUT=pd.RUT ");

while ($row = $cn->getRespuesta($res)){
	if($row['DIFERENCIA_FECHA']>= 0){
    $array['id'] = "ARRIENDO";
	$array['title'] ="Finaliza el Arriendo de ". $row['P_NOMBRE'];
	$array['description'] = "Producto Arrendado en la fecha: ".$row['A_FECHAINICIO']." a la empresa: ".$row['PD_NOMBRE']." con un costo de $".$row['IP_PRECIOUNITARIO'].". Quedan ".$row['DIFERENCIA_FECHA']." dias para su devolución. Advertencia la fecha estipulada en el calendario corresponde a la fecha en la cual se debe devolver el producto (".$row['A_FECHATERMINO'].")";
    $array['start'] = $row['A_FECHATERMINO'];
	$array['end'] = $row['A_FECHATERMINO'];
	$array['className'] = "label label-warning";
    array_push($return_arr, $array);
	}
	  else {
		  $array['id'] = "ARRIENDO";
	      $array['title'] ="Finalizo el Arriendo de ". $row['P_NOMBRE'];
	      $array['description'] = "Producto Arrendado en la fecha: ".$row['A_FECHAINICIO']." a la empresa: ".$row['PD_NOMBRE']." con un costo de $".$row['IP_PRECIOUNITARIO'].". Este producto fue devuelto satifactoriamente el dia ".$row['A_FECHATERMINO'].", por lo cual ya no se encuentra en bodega";
          $array['start'] = $row['A_FECHATERMINO'];
	      $array['end'] = $row['A_FECHATERMINO'];
	      $array['className'] = "label label-warning";
		  array_push($return_arr, $array);
		  }
}

$cn->Desconectar();
echo json_encode($return_arr);
?>