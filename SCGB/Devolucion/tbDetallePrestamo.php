<?php
include '../Conexion.php';
$cn = new Conexion();
$cn2 = new Conexion();
$cn3 = new Conexion();
$cn->Conectar();
$cn2->Conectar();
$cn3->Conectar();
$obtiene = array();
$guarda1 = array();
$res = $cn->Consulta("SELECT dp.CODIGOPRODUCTO,dp.CODIGOUNITARIO,dp.CODIGOPRESTAMO FROM DETALLE_PRESTAMO dp,PRODUCTO_UNITARIO pu WHERE dp.CODIGOUNITARIO=pu.CODIGOUNITARIO AND CODIGOPRESTAMO=1 AND pu.PU_ESTADO=3 AND dp.CODIGOPRODUCTO=pu.CODIGOPRODUCTO AND dp.DP_ESTADO=1");
while($row = $cn->getRespuesta($res)){
	
	array_push($obtiene, $row['CODIGOPRODUCTO']);
	array_push($obtiene, $row['CODIGOUNITARIO']);
	array_push($obtiene, $row['CODIGOPRESTAMO']);
	}
$i = 0;
while ($i < count($obtiene)) {
    $consulta=$obtiene[$i];
	$i++;
    $consulta2=$obtiene[$i];
	$i++;
    $consulta3=$obtiene[$i];
	$res2 = $cn2->Consulta("SELECT P_IDENTIFICADOR FROM PRODUCTO WHERE CODIGOPRODUCTO='$consulta'");
	while($row2 = $cn2->getRespuesta($res2)){
    $IDENTIFICADOR=$row2['P_IDENTIFICADOR'];
	
	if($IDENTIFICADOR=="H"){
		 $res3 = $cn3->Consulta("
SELECT p.CODIGOPRODUCTO,pu.CODIGOUNITARIO,p.P_NOMBRE,p.P_MARCA,p.P_MODELO,p.P_OBSERVACION,h.H_TIPOHERRAMIENTA,h.H_FRECUENCIA,h.H_POTENCIAMAXIMA FROM PRODUCTO p,PRODUCTO_UNITARIO pu,HERRAMIENTA h WHERE p.CODIGOPRODUCTO=pu.CODIGOPRODUCTO AND p.CODIGOPRODUCTO=h.CODIGOPRODUCTO AND p.CODIGOPRODUCTO='$consulta' AND pu.CODIGOUNITARIO='$consulta2'"); 
		 while($row3 = $cn3->getRespuesta($res3)){
			   array_push($guarda1, $row3['CODIGOPRODUCTO']);
			   array_push($guarda1, $row3['CODIGOUNITARIO']);
			   array_push($guarda1, $row3['P_NOMBRE']);
			   array_push($guarda1, $row3['P_MARCA']);
			   array_push($guarda1, $row3['P_MODELO']);
			   array_push($guarda1, $row3['P_OBSERVACION']);
			   array_push($guarda1, "Tipo:".$row3['H_TIPOHERRAMIENTA']." Frecuencia:".$row3['H_FRECUENCIA']." PotenciaMAx:".$row3['H_POTENCIAMAXIMA']);
			   array_push($guarda1, $row3['CODIGOPRODUCTO']);
			   array_push($guarda1, $row3['CODIGOUNITARIO']);
			   array_push($guarda1, $consulta3);
			   
			 } 
		}
	   else{
		     $res3 = $cn3->Consulta("SELECT p.CODIGOPRODUCTO,p.P_NOMBRE,p.P_MARCA,p.P_MODELO,p.P_OBSERVACION,p.P_IDENTIFICADOR,v.V_PERMISO,v.V_YEAR,v.V_CONDICION,v.V_PATENTE,pu.CODIGOUNITARIO FROM VEHICULO v,PRODUCTO p,PRODUCTO_UNITARIO pu WHERE p.CODIGOPRODUCTO=v.CODIGOPRODUCTO AND p.CODIGOPRODUCTO=pu.CODIGOPRODUCTO AND p.CODIGOPRODUCTO='$consulta' AND pu.CODIGOUNITARIO='$consulta2'"); 
		      while($row3 = $cn3->getRespuesta($res3)){
			   array_push($guarda1, $row3['CODIGOPRODUCTO']);
			   array_push($guarda1, $row3['V_PATENTE']);
			   array_push($guarda1, $row3['P_NOMBRE']);
			   array_push($guarda1, $row3['P_MARCA']);
			   array_push($guarda1, $row3['P_MODELO']);
			   array_push($guarda1, $row3['P_OBSERVACION']);
			   array_push($guarda1, "Condición:".$row3['V_CONDICION']." FechaPermisoCirculación:".$row3['V_PERMISO']." Año:".$row3['V_YEAR']);
			   array_push($guarda1, $row3['CODIGOPRODUCTO']);
			   array_push($guarda1, $row3['CODIGOUNITARIO']);
			   array_push($guarda1, $consulta3);
			 } 
		}
	
	
	}
	$i++; 
}
?>

<script>
    $("#tablaDetallePrestamo").dataTable({
            "oLanguage": {
                
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    }
				}
        });
		
</script>



<table id='tablaDetallePrestamo' class="table table-striped table-bordered table-hover" >
    <thead>
        <tr >
            <th>Codigo Producto</th>
            <th>Codigo Producto Unitario</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Observación</th>
            <th>Descripción</th>
            <th>Seleccionar</th>
           
        </tr>
    </thead>
    <tbody>
          <?php $j=0; while($j < count($guarda1)){ ?>
        <tr>
            <td><?php echo $guarda1[$j]; $j++; ?></td>
            <td><?php echo $guarda1[$j]; $j++; ?></td>
            <td><?php echo $guarda1[$j]; $j++; ?></td>
            <td><?php echo $guarda1[$j]; $j++; ?></td>
            <td><?php echo $guarda1[$j]; $j++; ?></td>
            <td><?php echo $guarda1[$j]; $j++; ?></td>
            <td><?php echo $guarda1[$j]; $j++; ?></td>
             
            <td style="width:100px;"><input name="CheckHerramienta" value="<?php echo $guarda1[$j]; $j++;?>***&&***<?php echo $guarda1[$j]; $j++; ?>***&&***<?php echo $guarda1[$j]; $j++; ?>" type="checkbox" /></td>
            <?php } ?>
        </tr>
       
    </tbody>
</table>
